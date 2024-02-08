<?php
include_once "header.PHP";
?>
<link rel="stylesheet" href="../assets/css/u.css">
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Table</h4>
                        <a href="addproduct.php"> <button class="btn btn-success"><i class="mdi mdi-plus"></i> Add New Products</button></a>
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Model</th>
                                        <th>Serial No</th>
                                        <th>Product</th>
                                        <th>Department</th>
                                        <th>Price</th>
                                        <th>Employee</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stm = $db->prepare("SELECT * FROM product ORDER BY date desc");
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $row) {
                                        
                                    ?>
                                        <tr>
                                            <td><?php echo $row['item'] ?></td>
                                            <td><?php echo $row['model'] ?></td>
                                            <td><?php echo $row['sn'] ?></td>
                                            <td><?php echo $row['product'] ?></td>
                                            <td><?php echo $row['dep'] ?></td>
                                            <td><?php echo $row['price'] ?></td>
                                            <td><?php echo $row['employee'] ?></td>
                                            <td><?php echo $row['location'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><a href="editProduct.php?sn=<?php echo $row['sn'] ?>">
                                                    <label class="badge badge-warning pointer"><i class="mdi mdi-pen"></i></label></a>
                                                <a href="../backend/removeProduct.php?sn=<?php echo $row['sn'] ?>">
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