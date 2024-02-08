<?php
include_once "header.PHP";
?>
<link rel="stylesheet" href="../assets/css/u.css">
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card mb-4">
            <h5 class="card-header">Student Account Settings</h5>
            <!-- Account -->
            <div class="card-body">
                <?php
                if (isset($_GET['error'])) { ?>

                    <div class="alert alert-danger"><?php echo $_GET['error'] ?></div>
                <?php } elseif (isset($_GET['success'])) { ?>
                    <div class="alert alert-success"><?php echo $_GET['success'] ?></div>

                <?php } ?>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <form id="formAccountSettings" action="../backend/changePassword.php" method="post">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">current password</label>
                            <input class="form-control" type="password" id="firstName" name="password" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">New Password</label>
                            <input class="form-control" type="password" name="newPass" id="lastName" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Repeat Password</label>
                            <input class="form-control" type="password" name="rePass" />
                        </div>
                        <input type="hidden" name="redirect" id="" value="student">





                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Change Password</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
<!-- main-panel ends -->








<?php
include_once "footer.PHP";
?>