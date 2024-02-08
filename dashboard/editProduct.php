<?php
include_once "header.PHP";
?>
<link rel="stylesheet" href="../assets/css/u.css">
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Record Product</h4>
                        <form class="forms-sample" action="../backend/editProduct.php" method="POST" enctype="multipart/form-data">
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
                            $sn = $_GET['sn'];

                            $stm = $db->prepare("SELECT * FROM product WHERE sn='$sn'");
                            $stm->execute();
                            $info = $stm->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <input type="hidden" name="sn" id=" " value="<?php echo $info['sn'] ?>">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Item</label>
                                <div class="col-sm-9">
                                    <select name="item" id="" class="form-control">
                                        <?php
                                        $stm = $db->prepare("SELECT * FROM item ");
                                        $stm->execute();
                                        foreach ($stm->fetchAll() as $item) { ?>
                                            <option value="<?php echo $item['item'] ?>" <?php
                                                                                        if ($item['item'] == $info['item']) {
                                                                                            echo 'selected';
                                                                                        }
                                                                                        ?>><?php echo $item['item']
                                                                                            ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" name="model" placeholder="SN-23923" value="<?php echo $info['model'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Serial Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" name="newSn" placeholder="SN-23923" value="<?php echo $info['sn'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputEmail2" name="product" placeholder="Laptop" value="<?php echo $info['product'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputEmail2" name="dep" placeholder="Laptop" value="<?php echo $info['dep'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" name="for" placeholder="Kiva" value="<?php echo $info['employee'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" name="location" placeholder="Adama" value="<?php echo $info['location'] ?>">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">UPdate Record</button>
                        </form>
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