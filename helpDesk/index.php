<?php
include_once "header.PHP";

$id = $_SESSION['helpSession'];

$stm = $db->prepare("SELECT * FROM users WHERE uid='$id'");

$stm->execute();

$userInfo = $stm->fetch(PDO::FETCH_ASSOC);

?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <div class="card">
            <div class="row">
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Please tell us your problem</h4>
                            </p>
                            <?php
                            if (isset($_GET['error'])) {
                                $errMessage = $_GET['error'];
                            ?>
                                <div class="alert alert-danger"><?php echo $errMessage ?></div>

                            <?php
                            }
                            if (isset($_GET['success'])) {
                                $errMessage = $_GET['success'];
                            ?>
                                <div class="alert alert-success"><?php echo $errMessage ?></div>

                            <?php
                            }
                            ?>
                            <form action="../backend/helpMessage.php" method="post" enctype="multipart/form-data">
                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Full Name</label>
                                                <select name="fname" id="" class="form-control">
                                                    <?php
                                                    $dep = $userInfo['dep'];
                                                    $stm = $db->prepare("SELECT * FROM employee WHERE dep='$dep'");
                                                    $stm->execute();
                                                    foreach ($stm->fetchAll() as $item) { ?>
                                                        <option value="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Department</label>
                                                <input type="hidden" class="form-control" id="exampleInputEmail1" name="dep" placeholder="<?php echo $userInfo['dep'] ?>" value="<?php echo $userInfo['dep'] ?>">
                                                <input type="text" class="form-control" id="exampleInputEmail1" disabled placeholder="<?php echo $userInfo['dep'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Select Error </label>
                                                <select name="error" id="" class="form-control">
                                                    <?php
                                                    $stm = $db->prepare("SELECT * FROM error");
                                                    $stm->execute();
                                                    foreach ($stm->fetchAll() as $item) { ?>
                                                        <option value="<?php echo $item['error_type'] ?>"><?php echo $item['error_type'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Subject</label>
                                            <textarea name="subject" id="" class="form-control" cols="30" rows="10"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <a href="../backend/logout.php?to=index" class="btn btn-outline-danger me-2">Exit</a>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- main-panel ends -->

</div>
<?php
include_once "footer.PHP";
?>