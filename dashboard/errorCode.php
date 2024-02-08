<?php
include_once "header.PHP";
?>
<link rel="stylesheet" href="../assets/css/u.css">
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-5 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo isset($_GET['id']) ? "Update Employee Record" : "Record  Employee" ?></h4>
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


                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $stm = $db->prepare("SELECT * FROM employee WHERE id = $id");
                            $stm->execute();
                            $employeeData = $stm->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form class="forms-sample" action="../backend/recordError.php" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Error Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" name="ecode" placeholder="NT-IT-Error-01" value="<?php echo isset($_GET['id']) ? $employeeData['name'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Error</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" name="error" placeholder="Software installation" value="<?php echo isset($_GET['id']) ? $employeeData['email'] : '' ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2"><?php echo isset($_GET['id']) ? "Update Record" : "Record" ?></button>
                        </form>
                    </div>
                </div>
            </div>
         

        <div class="col-lg-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Item Table</h4>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Error Code</th>
                                    <th>Error Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stm = $db->prepare("SELECT * FROM error");
                                $stm->execute();
                                foreach ($stm->fetchAll() as $i => $row) {
                                ?>
                                    <tr>
                                        <td><?php echo ++$i ?></td>
                                        <td><?php echo $row['error_code'] ?></td>
                                        <td><?php echo $row['error_type'] ?></td>

                                        <td>
                                            <!-- <a href="employee.php?id=<?php echo $row['id'] ?>">
                                                <label class="badge badge-warning pointer"><i class="mdi mdi-pen"></i></label>
                                            </a> -->
                                            <a href="../backend/removeError.php?id=<?php echo $row['error_code'] ?>">
                                                <label class="badge badge-danger pointer"><i class="mdi mdi-delete-forever"></i></label></a>
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


<!-- main-panel ends -->

<?php
include_once "footer.PHP";
?>