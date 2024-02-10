<?php
session_start();
if (isset($_SESSION['isLogin'])) {
  header('Location:dashboard/');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="container-scroller ">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">

        <section class="vh-100">
          <div class="container-fluid h-custom auth login-bg" style="height:100vh">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="assets/images/National-Bi-Lingual.png " class="img-fluid" alt="Sample image">
              </div>
              <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <?php

                if (isset($_GET['error'])) {
                  $errorMessage = $_GET['error']; ?>

                  <div class="alert alert-danger"><?php echo $errorMessage ?></div>

                <?php

                }

                ?>
                <form action="backend/loginController.php" method="POST" enctype="multipart/form-data">
                  <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    <p class="lead fw-normal mb-0 me-3">Contact us</p>
                    <a href="https://www.facebook.com/Nationaltransportsplc/" class="btn btn-primary btn-floating mx-1">
                      <i class="fab fa-facebook-f"></i>
                      </button>

                      <a href="Info@nationaltransportplc.com" class="btn btn-primary btn-floating mx-1">
                        <i class="fa-solid fa-envelope"></i>
                      </a>

                      <a href="https://www.linkedin.com/company/national-transport-plc/mycompany/" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-linkedin-in"></i>
                      </a>
                  </div>

                  <div class="divider d-flex align-items-center my-4">

                  </div>

                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example3" class="form-control form-control-lg p_input" placeholder="Enter username" name="username" />
                    <label class="form-label" for="form3Example3">Username</label>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-3">
                    <input type="password" id="form3Example4" class="form-control form-control-lg p_input" placeholder="Enter password" name="password" />
                    <label class="form-label" for="form3Example4">Password</label>
                  </div>


                  <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

                  </div>

                </form>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
              Copyright © 2020. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
              <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
              </a>
              <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            <!-- Right -->
          </div>
      </div>
    </div>
  </div>
  </section>
</body>

</html>