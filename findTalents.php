<?php include "./includes/conn.php" ?>
<?php include "./includes/indexHeader.php"; ?>

<body>
  <?php include "./includes/indexNavbar.php" ?>

  <div id="find-jobs-page">
    <div class="intro-banner">
      <div class="intro-banner-overlay">
        <div class="intro-banner-content">
          <div class="container glassmorphism">
            <div class="banner-headline-text-part">
              <h3>Find Nearby Talents</h3>
              <div class="line line-dark"></div>
              <div class="keywords">
                <p>Trending Talents Keywords:</p>
                <span> Singer, Graphic Designer, Crafts, Dancer, Content Creator</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="page-content">
  <div class="page-content-left-side">
    <?php include "./includes/searchSidebarFindTalents.php" ?>
  </div>
  <div class="page-content-right-side">
    <div class="headline">
      <span class="icon-container">
        <i class="fa-solid fa-magnifying-glass"></i>
      </span>
      <h3>Talents Listing Results</h3>
    </div>
    <div class="talent-list-container">
      <?php

      $sql = "SELECT job_post.*, company.profile_pic FROM job_post 
              LEFT JOIN company ON job_post.id_company = company.id_company 
              ORDER BY job_post.createdat DESC";
      $result = $conn->query($sql);
 
      while ($row = $result->fetch_assoc()) {
        $hash = md5($row['id_jobpost']);
        $job_id = $row['id_jobpost'];
        $jobtitle = $row['jobtitle'];
        $create_date = $row['createdat'];
        $city_id = $row['city_id'];
        $industry_id = $row['industry_id'];
        $media_file = $row['media_path']; // Fetch media file name
        $profile_pic = $row['profile_pic']; // Company profile picture

        // Get location name
        $location_query = $conn->query("SELECT name FROM districts_or_cities WHERE id = '$city_id'");
        $location = $location_query->fetch_assoc();

        // Get job category
        $job_category_query = $conn->query("SELECT name FROM industry WHERE id = '$industry_id'");
        $job_category = $job_category_query->fetch_assoc();

        // Media file path
        $media_path = "" . $media_file;

        // Determine media type
        $file_extension = strtolower(pathinfo($media_path, PATHINFO_EXTENSION));
        $allowed_images = ["jpg", "jpeg", "png", "gif"];
        $allowed_videos = ["mp4", "avi", "mov", "mkv"];
      ?> 

      <a href="./talentDetails.php?key=<?php echo $hash . '&id=' . $job_id ?>">
        <div class="talent-item-container">
          <div class="prof-container">
            <?php
            if (!empty($media_file)) {
                if (in_array($file_extension, $allowed_images)) {
                    // Display image
                    echo '<img src="' . $media_path . '" alt="Talent Image">';
                } elseif (in_array($file_extension, $allowed_videos)) {
                    // Display video
                    echo '<video width="100%" height="150px" controls>
                            <source src="' . $media_path . '" type="video/' . $file_extension . '">
                            Your browser does not support the video tag.
                          </video>';
                } else {
                    // Default placeholder
                    echo '<img src="../assets/images/default-placeholder.jpg" alt="Default Image">';
                }
            } else {
                // If no media, show profile picture or placeholder
                echo '<img src="../assets/images/' . ($profile_pic ? $profile_pic : 'default-placeholder.jpg') . '" alt="Profile Image">';
            }
            ?>
          </div>

          <div class="talent-info-container">
            <div class="talent-info-left-side">
              <h3> <?php echo $jobtitle; ?> </h3>
              <div class="others-inform">
                <div class="job-category-info">
                  <i class="fa-solid fa-briefcase"></i>
                  <span><?php echo $job_category['name'] ?></span>
                </div>

                <div class="location-info">
                  <i class="fa-solid fa-location-dot"></i>
                  <span><?php echo $location['name'] ?></span>
                </div>
              </div>
              <div class="date-info">
                <i class="fa-solid fa-calendar-days"></i>
                <span><?php echo $create_date; ?></span>
              </div>
            </div>
            <div class="date-inform">
              <?php
              $deadline = date_create($row['deadline']);
              $now = date_create(date("y-m-d"));
              if ($now < $deadline) {
                echo "<span class='valid-active'>Active</span>";
              } else {
                echo "<span class='valid-expired'>Expired</span>";
              }
              ?>
            </div>
          </div>
        </div>
      </a>

      <?php } ?>
    </div>
  </div>
</section>


    <!-- Footer -->
    <div id="footer">
      <!-- Footer Widgets -->
      <?php include 'includes/indexFooterWidgets.php';
      ?>
      <!-- Footer Copyrights -->
      <?php include 'includes/footer.php' ?>
    </div>
  </div>
</body>