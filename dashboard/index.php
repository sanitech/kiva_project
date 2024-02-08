<?php
include_once "header.PHP";
require "timeAgo.php";
// date_default_timezone_set('UTC');
?>
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
<style>
  #modelPreview{
   
    height: 0;

  }

  .open-Model{
   
    background-color: #000000;
    position:absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 10000;
    width: 100%;
    transform: translate(-50%, -50%);
  }
</style>

    <div id="modelPreview" onclick="closeModel()">
      <img src="" id="screenshotView" alt="" onclick="event=>event.stopPropagation()">
    </div>

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
                    <th> screenshot </th>
                    <th> Department </th>
                    <th> Subject </th>
                    <th> created By </th>
                    <th> Created </th>
                    <th> Status </th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $stm = $db->prepare("SELECT * FROM helpdesk ORDER BY create_time DESC");
                  $stm->execute();
                  foreach ($stm->fetchAll() as $help) :
                    $type=$help['error_type'];
                    $stm=$db->prepare("SELECT * FROM error WHERE error_type = '$type'");
                    $stm->execute();
                    $error=$stm->fetch(PDO::FETCH_ASSOC);

                  ?>
                    <tr>
                     
                      <td> <?php echo $error['error_code']?$error['error_code']:'' ?> </td>
                      <!-- <td>
                        <?php if ($help['screenshot']) { ?>
                          <img src="<?php echo $help['screenshot'] ?>" alt="image" id="screenshot" onclick="viewScreenSot('<?php echo $help['screenshot'] ?>')" />
                        <?php } else {
                        ?>
                          <div class="badge badge-outline-warning">No screenshot</div>

                        <?php
                        } ?>
                      </td> -->
                      <td>
                        <?php  echo $help['error_type'] ?>
                          
                      </td>
                      <td> <?php echo $help['dep'] ?> </td>
                      <td> <?php echo $help['subject'] ?> </td>
                      <td> <?php echo $help['fname'] ?> </td>
                      <td> <?php echo timeago($help['create_time']) ?> </td>
                      <td>

                        <?php if ($help['status'] === 'send') { ?>
                          <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Status </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                              <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=done">Done</a>
                              <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=waiting">waiting</a>
                              <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=out source">out source</a>
                              <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=open">Open</a>
                            </div>
                          </div>
                        <?php
                        } elseif ($help['status'] === 'done') {
                        ?>
                          <div class="badge badge-outline-success">Done</div>
                        <?php
                        } elseif ($help['status'] === 'waiting') {
                        ?>
                          <div class="" style="display: flex; gap:10px">

                            <div class="badge badge-outline-info">waiting</div>
                            <div class="dropdown">
                              <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Status </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=done">Done</a>
                                <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=out source">out source</a>
                                <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=open">Open</a>
                              </div>
                            </div>
                          </div>
                        <?php

                        } elseif ($help['status'] === 'out source') {
                        ?>
                          <div class="" style="display: flex; gap:10px">

                            <div class="badge badge-outline-danger">out source</div>
                            <div class="dropdown">
                              <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Status </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=done">Done</a>
                                <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=waiting">waiting</a>
                                <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=open">Open</a>
                              </div>
                            </div>
                          </div>
                        <?php
                        } elseif ($help['status'] === 'open') {
                        ?>
                          <div class="" style="display: flex; gap:10px">

                            <div class="badge badge-outline-warning">Open</div>
                            <div class="dropdown">
                              <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuOutlineButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Status </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=done">Done</a>
                                <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=waiting">waiting</a>
                                <a class="dropdown-item" href="../backend/responeHelpDesk.php?id=<?php echo $help['issue_id'] ?>&status=out source">out source</a>
                              </div>
                            </div>
                          </div>
                        <?php
                        }

                        ?>

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


</script>

<?php
include_once "footer.PHP";
?>