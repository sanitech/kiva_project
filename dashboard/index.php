<?php
include_once "header.PHP";
require "timeAgo.php";
require "timeAgoDef.php";
// date_default_timezone_set('UTC');



$status = ['open', 'done', 'waiting', 'out source'];
?>
<link rel="stylesheet" href="../assets/css/u.css">
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">

    <div class="row">
      <?php

      $stm = $db->prepare("SELECT * FROM item");
      $stm->execute();
      foreach ($stm->fetchAll() as $item) { ?>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">

                    <h3 class="mb-0"><?php
                                      $items = $item['item'];
                                      $stm = $db->prepare("SELECT * FROM product WHERE item ='$items'");
                                      $stm->execute();

                                      echo  $stm->rowCount() > 0 ?  $stm->rowCount() : 0;
                                      ?></h3>
                    <!-- <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p> -->
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success ">
                    <span class="mdi mdi-laptop icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal"><?php echo $item['item'] ?></h6>
            </div>
          </div>
        </div>

      <?php } ?>

    </div>
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
    <!-- Default Modal -->
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
                  <h5 class="modal-title" id="exampleModalLabel1">Cause Model</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameBasic" class="form-label">Cause</label>
                      <input type="text" id="nameBasic" name="cause" class="form-control" placeholder="Enter cause" />
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php

    if ($userType === 'ICT') { ?>

      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Help Desk </h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>

                      <th> id </th>
                      <th> Error Type </th>
                      <th> Department </th>
                      <th> Subject </th>
                      <th> created By </th>
                      <th> Created </th>
                      <th> Status </th>
                      <th> End Time </th>
                      <th> Cause </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $stm = $db->prepare("SELECT * FROM helpdesk ORDER BY create_time DESC");
                    $stm->execute();
                    foreach ($stm->fetchAll() as $users) :
                      $type = $users['error_type'];
                      $stm = $db->prepare("SELECT * FROM error WHERE error_type = '$type'");
                      $stm->execute();
                      $error = $stm->fetch(PDO::FETCH_ASSOC);

                    ?>
                      <tr>

                        <td> <?php echo $error['error_code'] ? $error['error_code'] : '' ?> </td>
                        <!-- <td>
                        <?php if ($users['screenshot']) { ?>
                          <img src="<?php echo $users['screenshot'] ?>" alt="image" id="screenshot" onclick="viewScreenSot('<?php echo $users['screenshot'] ?>')" />
                        <?php } else {
                        ?>
                          <div class="badge badge-outline-warning">No screenshot</div>

                        <?php
                        } ?>
                      </td> -->
                        <td>
                          <?php echo $users['error_type'] ?>

                        </td>
                        <td> <?php echo $users['dep'] ?> </td>
                        <td> <?php echo $users['subject'] ?> </td>
                        <td> <?php echo $users['fname'] ?> </td>
                        <td> <?php echo timeago($users['create_time']) ?> </td>
                        <td>
                          <?php
                          if ($users['cause'] === '') {

                          ?>
                            <style>
                              .status-container {
                                display: grid;
                                grid-template-columns: 1fr 1fr;
                                grid-template-rows: 1fr 1fr;
                                grid-template-areas: 'status selector'
                                  'cause cause';
                                gap: 10px;

                              }

                              .cause {
                                grid-area: cause;
                              }

                              .status {
                                grid-area: status;
                              }

                              .selector {
                                grid-area: selector;
                              }
                            </style>
                          <?php

                          } else {
                          ?>
                            <style>
                              .status-container {
                                display: flex;
                                gap: 5px;

                              }
                            </style>
                          <?php
                          } ?>


                          <?php

                          if ($users['status'] !== 'done') {
                            if ($users['status'] !== 'send') {
                          ?>
                              <div class="status-container">


                                <div class="status badge badge-outline-<?php if ($users['status'] === 'out source') echo 'danger';
                                                                        if ($users['status'] === 'waiting') echo 'warning';
                                                                        if ($users['status'] === 'open') echo 'info' ?>"><?php echo $users['status'] ?></div>


                                <button type="button" class="btn btn-danger cause" style="display: <?php echo $users['cause'] === '' ? 'block' : 'none' ?> ;" data-bs-toggle="modal" data-bs-target="#basicModal" onclick="setIssueID('<?php echo $users['issue_id'] ?>')">
                                  Insert cause
                                </button>


                              <?php
                            }
                              ?>
                              <div class="dropdown selector">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Status </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                  <?php
                                  foreach ($status as $key => $value) {
                                    if ($users['status'] === $value) continue;
                                  ?>
                                    <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $users['issue_id'] ?>&status=<?php echo $value ?>"><?php echo ucwords($value) ?></a>
                                  <?php
                                  }
                                  ?>
                                </div>

                              </div>

                            <?php
                          } else { ?>
                              <div class="badge badge-outline-success">Done</div>
                            <?php
                          }
                            ?>
                              </div>
                        </td>
                        <td>
                          <?php
                          if ($users['work_start'] && $users['work_end']) {
                            $start = $users['work_start'] ? $users['work_start'] : $users['create_time'];
                            echo time_ago_def($users['work_start'], $users['work_end']);
                          }
                          ?>
                        </td>

                        <td>
                        <td> <?php echo $users['cause'] ?> </td>

                        </td>
                      </tr>

                    <?php
                    endforeach;
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php
    } else if ($userType === 'super') {
    ?>

      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">User Management </h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>

                      <th> id </th>
                      <th> UserName </th>
                      <th> Department </th>
                      <th> Status </th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $stm = $db->prepare("SELECT * FROM users ORDER BY last_login DESC");
                    $stm->execute();
                    foreach ($stm->fetchAll() as $i => $users) :
                      if ($users['dep']==='super') continue;


                    ?>
                      <tr>
                        <td><?php echo ++$i ?></td>
                     
                        <td>
                          <?php echo ucwords($users['username']) ?>
                        </td>
                        <td>
                          <?php echo ucwords($users['dep']) ?>
                        </td>
                        <td>
                          <a href="../backend/statusUpdater.php?id=<?php echo $users['uid'] ?>">
                            <div class="status badge badge-outline-<?php echo $users['status']?'success':'danger' ?>"><?php echo $users['status']?'Enabled':'Disable' ?></div>
                          </a>
                        </td>
                      </tr>

                    <?php
                    endforeach;
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>






    <?php
    }

    ?>
  </div>

</div>



<!-- main-panel ends -->


<script>
  const viewScreenSot = (screenshot) => {
    let screenshotView = document.querySelector('#screenshotView');

    console.log(screenshot)
    screenshotView.classList.add('open-Model')
    screenshotView.src = screenshot
  }
  const closeModel = (e) => {
    let model = document.querySelector('#screenshotView');
    model.style.display = 'none'
    model.style.height = '0';
  }

  const setIssueID = (issueID) => {
    document.querySelector('#issue_id').value = issueID
  }
</script>

<?php
include_once "footer.PHP";
?>