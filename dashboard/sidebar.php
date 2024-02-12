   <nav class="sidebar sidebar-offcanvas" id="sidebar">
       <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
           NT-IT-EMS
       </div>
       <ul class="nav">

           <li class="nav-item nav-category">
               <span class="nav-link">Navigation</span>
           </li>

           <li class="nav-item menu-items">
                   <a class="nav-link" href="index.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-speedometer"></i>
                       </span>
                       <span class="menu-title">Dashboard</span>
                   </a>
               </li>

           <?php

            if ($userType === 'ICT') { ?>

               <li class="nav-item menu-items">
                   <a class="nav-link" href="addItem.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-laptop"></i>
                       </span>
                       <span class="menu-title">Record item</span>
                   </a>
               </li>


           <?php
            }
            if ($userType == 'super') { ?>

               <li class="nav-item menu-items">
                   <a class="nav-link" href="department.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-briefcase"></i>
                       </span>
                       <span class="menu-title">Department</span>
                   </a>
               </li>
               <li class="nav-item menu-items">
                   <a class="nav-link" href="users.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-account-multiple"></i>
                       </span>
                       <span class="menu-title">User Management</span>
                   </a>
               </li>
               <li class="nav-item menu-items">
                   <a class="nav-link" href="employee.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-account-multiple-plus"></i>
                       </span>
                       <span class="menu-title">Employee</span>
                   </a>
               </li>
               <li class="nav-item menu-items">
                   <a class="nav-link" href="errorCode.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-settings"></i>
                       </span>
                       <span class="menu-title">Error code</span>
                   </a>
               </li>
           <?php
            }
            ?>


           <?php

            if ($userType === 'ICT') { ?>


               <li class="nav-item menu-items">
                   <a class="nav-link" href="addproduct.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-laptop"></i>
                       </span>
                       <span class="menu-title">Record Product</span>
                   </a>
               </li>
               <li class="nav-item menu-items">
                   <a class="nav-link" href="product.php">
                       <span class="menu-icon">
                           <i class="mdi mdi-table"></i>
                       </span>
                       <span class="menu-title"> Products</span>
                   </a>
               </li>
              
           <?php
            }
            ?>
           <li class="nav-item menu-items">
               <a class="nav-link" href="setting.php">
                   <span class="menu-icon">
                       <i class="mdi mdi-settings"></i>
                   </span>
                   <span class="menu-title">Setting</span>
               </a>
           </li>
           <li class="nav-item menu-items">
               <a class="nav-link" href="report.php">
                   <span class="menu-icon">
                       <i class="mdi mdi-settings"></i>
                   </span>
                   <span class="menu-title">Report</span>
               </a>
           </li>
           <li class="nav-item menu-items">
               <a class="nav-link" href="../backend/logout.php?to=admin">
                   <span class="menu-icon">
                       <i class="mdi mdi-logout"></i>
                   </span>
                   <span class="menu-title">Sign out</span>
               </a>
           </li>

           <!-- <li class="nav-item menu-items">
               <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                   <span class="menu-icon">
                       <i class="mdi mdi-laptop"></i>
                   </span>
                   <span class="menu-title">Basic UI Elements</span>
                   <i class="menu-arrow"></i>
               </a>

               <div class="collapse" id="ui-basic">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                       <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                   </ul>
               </div>
           </li> -->

       </ul>
   </nav>