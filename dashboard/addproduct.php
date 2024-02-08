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
                        <form class="forms-sample" action="../backend/record.php" method="POST" enctype="multipart/form-data">
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
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Item</label>
                                <div class="col-sm-9">
                                    <select name="item" id="" class="form-control">
                                        <?php
                                        $stm = $db->prepare("SELECT * FROM item ");
                                        $stm->execute();
                                        foreach ($stm->fetchAll() as $item) { ?>
                                            <option value="<?php echo $item['item'] ?>"><?php echo $item['item'] ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" name="model" placeholder="hp-EliteBook 840 G2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Serial Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputUsername2" name="sn" placeholder="SN-23923">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputEmail2" name="product" placeholder="Enter product">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <select name="for" id="" class="form-control" onchange="departmentHandler(event)">
                                        <?php
                                        $stm = $db->prepare("SELECT * FROM employee");
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
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control dep" id="exampleInputMobile" name="dep" id="dep" placeholder="please enter Location">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" name="location" placeholder="please enter Location">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" name="price" placeholder="200 Birr">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="exampleInputMobile" name="date" placeholder="please enter Location">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- main-panel ends -->

<script>

    const departmentHandler=(e)=>{
        console.log(e.target.value)
       const al=document.querySelector('.dep')
       $.ajax({

        url:'../backend/fetchEmployee.php',
        method:'POST',
        data:{name:e.target.value},
        success:(data)=>{
            console.log(data)
            al.value=data
        }
       })
    }
</script>

<?php
include_once "footer.PHP";
?>