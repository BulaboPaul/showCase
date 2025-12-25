<?php include "./includes/conn.php" ?>
<?php include "./includes/indexHeader.php"; ?>

<body>
  <?php include "./includes/indexNavbar.php" ?>
  <?php if (isset($_GET['key']) && isset($_GET['id'])) :
    $job_id = $_GET['id'];

    // talent details
    $sql = "SELECT * FROM job_post WHERE id_jobpost='$job_id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();


    // artist details
    $company_id = $row['id_company'];
    $sql1 = "SELECT * from company where id_company = '$company_id'";
    $query1 = $conn->query($sql1);
    $row1 = $query1->fetch_assoc();

    // state or region info

    $state_id = $row['state_id'];
    $sql2 =  "SELECT * FROM states WHERE id = '$state_id'";
    $query2 = $conn->query($sql2);
    $row2 = $query2->fetch_assoc();

    // district or  city info
    $city_id = $row['city_id'];
    $sql3 =  "SELECT * FROM districts_or_cities WHERE id = '$city_id'";
    $query3 = $conn->query($sql3);
    $row3 = $query3->fetch_assoc();
    $media_file = $row['media_path']; // Fetch media file name
    $media_path = "" . $media_file;
    // Determine media type
    $file_extension = strtolower(pathinfo($media_path, PATHINFO_EXTENSION));
    $allowed_images = ["jpg", "jpeg", "png", "gif"];
    $allowed_videos = ["mp4", "avi", "mov", "mkv"];

  ?>
    <div id="browse-job-details">
      <div class="intro-banner">
        <div class="intro-banner-overlay">
          <div class="intro-banner-content">
            <div class="container glassmorphism">
              <div class="banner-headline-text-part">
                <div class="profile-container">
                  <img src="../assets/images/<?php echo $row1['profile_pic'] ?>" alt="">
                </div>
                <div class="job-info-container">
                  <h3> <?php echo $row['jobtitle'] ?> </h3>
                  <div class="others-info">
                    <div class="company-name-info">
                      <i class="fa-solid fa-briefcase"></i>
                      <span> <?php echo $row1['companyname'] ?> </span>
                    </div>

                  </div>
                  <div class="location-info">
                    <i class="fa-solid fa-location-dot"></i>
                    <span><?php echo $row2['name'] . ", " . $row3['name'] ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="company-details-page-content">
        <div class="company-details-page-content-left-side">
          <div class="img-container">
          <?php
            if (!empty($media_file)) {
                if (in_array($file_extension, $allowed_images)) {
                    // Display image
                    echo '<img style="height: 500px;" src="' . $media_path . '" alt="Talent Image">';
                } elseif (in_array($file_extension, $allowed_videos)) {
                    // Display video
                    echo '<video width="100%" height="500px" controls>
                            <source src="' . $media_path . '" type="video/' . $file_extension . '">
                            Your browser does not support the video tag.
                          </video>';
                } else {
                    // Default placeholder
                    echo '<img src="../assets/images/default-placeholder.jpg" alt=" Image">';
                }
            } else {
                // If no media, show profile picture or placeholder
                echo '<img src="../assets/images/' . ($profile_pic ? $profile_pic : 'default-placeholder.jpg') . '" alt=" Image">';
            }
            ?>
          </div>
          <div class="job-details-jobs-description">
            <div class="headline">
              <span class="icon-container">
                <i class="fa-solid fa-file-contract"></i>
              </span>
              <h3>Talent Description</h3>
            </div>
            <div class="description-wrapper">
              <span><?php echo $row['description'] ?></span>
            </div>
          </div>
          <div class="job-details-jobs-skills">
            <div class="headline">
              <span class="icon-container">
                <i class="fa-solid fa-briefcase"></i>
              </span>
              <h3>Skills and Abilities</h3>
            </div>
            <div class="description-wrapper">
              <span><?php echo $row['skills_ability'] ?></span>
            </div>
          </div>
        </div>

        <div class="job-details-page-content-right-side">
          <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) : ?>
            <div class="information-wrapper">
              <div class="apply-save-box">
                <?php
                $id_user = "";
                if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) :  ?>
                  <?php
                  $id_user = $_SESSION['id_user'];
                  $applied = $conn->query("SELECT  * from applied_jobposts where id_user = '$id_user' and id_jobpost ='$job_id'");
                  if ($applied->num_rows > 0) :
                  ?>
                    <a href="#" class="btn btn-secondary-form">Already Applied<i class="utf-verified-badge"></i></a>
                    <?php else :
                    $deadline = date_create($row['deadline']);
                    $now = date_create(date("Y-m-d"));
                    if ($now > $deadline) :
                    ?>
                      <a href="#" class="btn btn-secondary-form">Out dated<i class="utf-verified-badge"></i></a>
                    <?php else : ?>
                      <a href="./process/applyTalent.php?key=<?php echo md5($job_id) . '&id=' . $job_id . '&cid=' . $company_id ?>" class="btn btn-secondary-form">Interested? Apply<i class="utf-verified-badge"></i></a>
                    <?php endif; ?>
                  <?php
                  endif; ?>
                  <?php
                  $saved = $conn->query("SELECT * from saved_jobposts where id_user ='$id_user' and id_jobpost ='$job_id' ");
                  if ($saved->num_rows > 0) :
                  ?>
                    <a href="#" class="btn btn-secondary-form">Saved<i class="utf-verified-badge"></i></a>
                  <?php else : ?>
                    <a href="./process/saveTalent.php?key=<?php echo md5($job_id)  . "&id=" . $job_id  ?>" class="btn btn-secondary-form">Save Talent<i class="utf-verified-badge"></i></a>
                <?php endif;
                endif; ?>
              </div>
            </div>
          <?php endif; ?>
          <div class="information-wrapper">
            <div class="information-container">
              <div class="headline">
                <h3>Talent Information</h3>
              </div>
              <ul class="information-list-container">
                <li class="information-list-item">
                  <div class=" icon-container">
                    <i class="fa-solid fa-briefcase"></i>
                  </div>
                  <div class="info-container">
                    <span>Talent:</span>
                    <span><?php echo $row['jobtitle'] ?></span>
                  </div>
                </li>
                <li class="information-list-item">
                  <div class=" icon-container">
                    <i class="fa-solid fa-trophy"></i>
                  </div>
                  <div class="info-container">
                    <span>Experience:</span>
                    <span><?php echo $row['experience'] . " years" ?></span>
                  </div>
                </li>
                <li class="information-list-item">
                  <div class=" icon-container">
                    <i class="fa-solid fa-location-dot"></i>
                  </div>
                  <div class="info-container">
                    <span>Location:</span>
                    <span><?php echo $row2['name'] . "-" . $row3['name'] ?></span>
                  </div>
                </li>

                <li class="information-list-item">
                  <div class=" icon-container">
                    <i class="fa-solid fa-clock"></i>
                  </div>
                  <div class="info-container">
                    <span>Date Posted:</span>
                    <span><?php echo $row['createdat'] ?></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>



  <?php endif; ?>
  <!-- Footer -->
  <div id="footer">
    <!-- Footer Widgets -->
    <?php include 'includes/indexFooterWidgets.php';
    ?>
    <!-- Footer Copyrights -->
    <?php include 'includes/footer.php'
    ?>
  </div>
</body>