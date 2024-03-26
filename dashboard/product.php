<?php
include_once "header.PHP";
?>
<link rel="stylesheet" href="../assets/css/u.css">
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="mt-3">
                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           
                            <form action="../backend/causeRecord.php" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <input type="hidden" name="issue_id" id="issue_id">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Product Image</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-center">
                                        <img scr="" alt="" id="previewProductImage" width="300"/>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Table</h4>
                        <div class="d-flex justify-content-between mb-2 align-items-center">
                            <a href="addproduct.php"> <button class="btn btn-success"><i class="mdi mdi-plus"></i> Add New Products</button></a>
                            <div class="d-flex gap-2">
                               <select name="item" id="" class="form-control" onchange="filterItem(this.value, 'items')">
                                        <?php
                                        $stm = $db->prepare("SELECT * FROM item ");
                                        $stm->execute();
                                        foreach ($stm->fetchAll() as $item) { ?>
                                            <option value="<?php echo $item['item'] ?>"><?php echo $item['item'] ?></option>
                                        <?php
                                        }
                                        ?>
                               </select>
                                <input type="text" class="form-control" id="search" placeholder="Search" oninput="filterItem(this.value, 'search')">
                            </div>
                        </div>
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
                                        <th>Status</th>
                                        <th>P_Image</th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody id="productTable">
                                    <?php
                                    $stm = $db->prepare("SELECT * FROM product ORDER BY date desc");
                                    $stm->execute();
                                    foreach ($stm->fetchAll() as $row) {
                                        $pimage = $row['p_image'];

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
                                            <td><?php echo $row['status'] ?></td>
                                            <td>
                                                <button type="button"  class="btn btn-danger cause" style="display: <?php echo $users['cause'] === '' ? 'block' : 'none' ?> ;" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="viewProductImage('<?php echo $pimage ?>')" style="background: transparent;">
                                                    <img src="<?php echo $row['p_image'] ?>" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                                                </button>
                                            </td>
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

<script type="text/javascript">
    const viewProductImage = (viewProductImage) => {
        console.log(viewProductImage)
        document.getElementById('previewProductImage').src = viewProductImage
    }


    const filterItem = (value, status) => {
        console.log(value)
        const al = document.getElementById('productTable')
        $.ajax({

            url: '../backend/fetchProduct.php',
            method: 'POST',
            data: {
                key: value,
                status
            },
            success: (data) => {
                console.log(data)
                // al.value = data
                $('#productTable').html(data)
            }
        })
    }
</script>
<!-- main-panel ends -->

<?php
include_once "footer.PHP";
?>