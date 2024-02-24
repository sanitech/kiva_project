<?php
include_once "header.PHP";
?>
<link rel="stylesheet" href="../assets/css/u.css">
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
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
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">For Department</h4>
                        <form class="forms-sample" action="../backend/createUserDep.php" method="POST" enctype="multipart/form-data">


                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <select name="dep" id="" class="form-control">
                                        <?php
                                        $stm = $db->prepare("SELECT * FROM department");
                                        $stm->execute();
                                        foreach ($stm->fetchAll() as $item) { 
                                            if($item['dep']==='ICT')continue;
                                            ?>
                                            <option value="<?php echo $item['dep'] ?>"><?php echo $item['dep'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="exampleInputMobile" name="password" placeholder="*********">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Record</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">For Users</h4>
                        <form class="forms-sample" action="../backend/createUser.php" method="POST" enctype="multipart/form-data">


                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">ICT Employee</label>
                                <div class="col-sm-9">
                                    <select name="username" id="" class="form-control">
                                        <?php
                                        $dep = 'ICT';
                                        $stm = $db->prepare("SELECT * FROM employee WHERE dep LIKE '%$dep%'");
                                        $stm->execute();
                                        foreach ($stm->fetchAll() as $item) { ?>
                                            <option value="<?php echo $item['name'] ?>"><?php echo $item['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="exampleInputMobile" name="password" placeholder="*********">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-outline-warning me-2">Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Department Table</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stm = $db->prepare("SELECT * FROM users");
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $i => $row) {
                                        $id = $_SESSION['userinfo'];
                                        if ($row['uid'] === $id || $row['dep']==='ICT') continue;

                                    ?>

                                        <tr>
                                            <td><?php echo ++$i ?></td>
                                            <td><?php echo $row['dep'] ?></td>
                                            <td><a href="../backend/deleteUser.php?uid=<?php echo $row['uid'] ?>">
                                                    <div class="badge badge-outline-danger">Create New Password</div>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php  }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users Table</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Reset</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stm = $db->prepare("SELECT * FROM users WHERE dep='ICT' ORDER BY last_login desc");
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $i => $row) {
                                        $id = $_SESSION['userinfo'];
                                        if ($row['uid'] === $id) continue;
                                    ?>

                                        <tr>
                                            <td><?php echo ++$i ?></td>
                                            <td><?php echo $row['username'] ?></td>
                                            <td><a href="../backend/resetUserAccount.php?id=<?php echo $row['uid'] ?>&who=password">
                                                    <div class="badge badge-outline-warning">Reset Account</div>
                                                </a>
                                            </td>
                                            <td> <a href="../backend/statusUpdater.php?id=<?php echo $row['uid'] ?>&from=users">
                                                <div class="status badge badge-outline-<?php echo $row['status'] ? 'success' : 'danger' ?>"><?php echo $row['status'] ? 'Enabled' : 'Disable' ?></div>
                                                </a>
                                            
                                                
                                            </td>

                                        </tr>
                                    <?php  }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



</div>
<!-- main-panel ends -->

<?php
include_once "footer.PHP";
?>