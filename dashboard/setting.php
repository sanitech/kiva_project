<?php
include_once "header.PHP";
?>
<link rel="stylesheet" href="../assets/css/u.css">
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <?php
        if (isset($_GET['error'])) { ?>

            <div class="alert alert-danger"><?php echo $_GET['error'] ?></div>
        <?php } elseif (isset($_GET['success'])) { ?>
            <div class="alert alert-success"><?php echo $_GET['success'] ?></div>

        <?php } ?>
        <div class="card mb-4">
            <h5 class="card-header">Account Settings</h5>
            <!-- Account -->

            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">

                    <?php
                    if ($userInfo['profile']) {
                        echo '<img class="d-block rounded" id="profileImg" src="' . $userInfo['profile'] . '" alt="">';
                    } else {
                        $words = explode(" ", $userInfo['username']);
                        $fullName = "";

                        foreach ($words as $w) {
                            $fullName .= mb_substr($w, 0, 1);
                        }

                    ?>
                        <div class="d-block rounded no-profile setting-profile"> <?php echo strtoupper($fullName); ?></div>
                    <?php
                    }

                    ?>

                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="profile" class="account-file-input" onchange="changeProfile()" hidden accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                          <a href="../backend/resetUserAccount.php?id=<?php echo $userInfo['uid'] ?>&what=profile">  <span class="d-none d-sm-block" style="color: #fff; text-decoration:none;">Reset</span></a>
                        </button>

                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG.</p>
                    </div>
                </div>

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


<script>
    
    const changeProfile = (e) => {
        const profiles = document.getElementById('upload');

        let formData = new FormData();
        formData.append("profile", profiles.files[0]);
        
        console.log(profiles.files[0]['name']);
        $.ajax({
            url: '../backend/updateProfilePic.php',
            type: 'POST',
            data:formData,
            contentType: false,
            processData: false,
            
            success: function(data) {
                console.log(data);
                $('#profileImg').attr('src', data);
            },
            error: function(error) {
                console.log(error);
            }
        })
    }
</script>







<?php
include_once "footer.PHP";
?>