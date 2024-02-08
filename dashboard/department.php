<?php
include_once "header.PHP";
?>
<link rel="stylesheet" href="../assets/css/u.css">
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin    ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Record Department</h4>
                        <form class="forms-sample" action="../backend/recordDepartment.php" method="POST" enctype="multipart/form-data">
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
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" name="dep" placeholder="CEO">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary me-2">Record</button>
                        </form>
                    </div>
                </div>
            </div>

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
                                    $stm = $db->prepare("SELECT * FROM department");
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $i => $row) {

                                    ?>
                                        <tr>
                                            <td><?php echo ++$i ?></td>
                                            <td><?php echo $row['dep'] ?></td>

                                            <td>
                                                <a href="../backend/removeDepartment.php?id=<?php echo $row['id'] ?>">
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

</div>
<!-- main-panel ends -->

<?php
include_once "footer.PHP";
?>