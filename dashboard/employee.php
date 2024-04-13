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


                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $stm = $db->prepare("SELECT * FROM employee WHERE id = $id");
                            $stm->execute();
                            $employeeData = $stm->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo isset($_GET['id']) ? "Update Employee Record" : "Record  Employee" ?></h4>
                        
                        <form class="forms-sample" action="<?php echo isset($_GET['id']) ? "../backend/employeeRecord.php" : "../backend/employeeRecord.php" ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Full name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" name="fname" placeholder="full name" value="<?php echo isset($_GET['id']) ? $employeeData['name'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="exampleInputUsername2" name="email" placeholder="exampl@gmail.com" value="<?php echo isset($_GET['id']) ? $employeeData['email'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <select name="dep" id="" class="form-control">
                                        <?php
                                        $stm = $db->prepare("SELECT * FROM department");
                                        $stm->execute();
                                        foreach ($stm->fetchAll() as $item) { ?>
                                            <option value="<?php echo $item['dep'] ?>" <?php if (isset($_GET['id'])) {
                                                                                            echo $employeeData['dep'] === $item['dep'] && 'selected';
                                                                                        }
                                                                                        ?>><?php echo $item['dep'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2"><?php echo isset($_GET['id']) ? "Update Record" : "Record" ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Import Employee Data from Excel</h4>

                        <form action="../backend/importEmployee.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>File Employee File</label>
                                <input type="file" name="empData" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-warning" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-warning me-2">Upload Excel</button>
                        </form>

                        <?php


                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $stm = $db->prepare("SELECT * FROM employee WHERE id = $id");
                            $stm->execute();
                            $employeeData = $stm->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Item Table</h4>


                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>Department</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stm = $db->prepare("SELECT * FROM employee LIMIT $starting_limit, $results_per_page");
                                $stm->execute();
                                foreach ($stm->fetchAll() as $i => $row) {
                                ?>
                                    <tr>
                                        <td><?php echo ++$i ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['dep'] ?></td>
                                        <td><?php echo $row['email'] ?></td>

                                        <td><a href="employee.php?id=<?php echo $row['id'] ?>">
                                                <label class="badge badge-warning pointer"><i class="mdi mdi-pen"></i></label></a>
                                            <a href="../backend/removeItemEmployee.php?id=<?php echo $row['id'] ?>">
                                                <label class="badge badge-danger pointer"><i class="mdi mdi-delete-forever"></i></label></a>
                                        </td>

                                    </tr>
                                <?php  }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                      $tableName = "employee";
                      require('pagination.php');
                      ?>
            </div>


        </div>
    </div>

</div>


<!-- main-panel ends -->

<?php
include_once "footer.PHP";
?>