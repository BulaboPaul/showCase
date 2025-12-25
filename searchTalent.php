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
              <div class="keywords">
                <p>Trending Talents Keywords:</p>
                <span> Nurse, Architect, Graphic Designer, Teller, Electrical Engineer, Android Developer</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="page-content">
      <div class="page-content-left-side">
        <?php include "./includes/searchSidebarFindTalents.php"; ?>
      </div>
      <div class="page-content-right-side">
        <div class="headline">
          <span class="icon-container">
            <i class="fa-solid fa-magnifying-glass"></i>
          </span>
          <h3>Showing Talents Results</h3>
        </div>
        <div class="talent-list-container">
        <?php
        if (isset($_POST['submitSearch'])) {
          $sqlStatement = '';
          if (isset($_POST['searchKeyword']) && $_POST['searchKeyword'] != '') {
            $searchKeyword = $_POST['searchKeyword'];
            $sqlStatement .= "jobtitle LIKE '%$searchKeyword%'";
          }

          if (isset($_POST['location-search']) && $_POST['location-search'] != '') {
            $district_or_city_id = $_POST['location-search'];;
            $sqlStatement = "city_id = '$district_or_city_id'";
          }

          if (isset($_POST['category-search']) && $_POST['category-search'] != '') {
            $industry_id = $_POST['category-search'];
            $sqlStatement = "industry_id = '$industry_id'";
          }



          if ($sqlStatement == '') {
            $sql = "SELECT * FROM job_post ORDER BY createdat DESC";
          } else {
            $sql = "SELECT * FROM job_post WHERE " . $sqlStatement . " ORDER BY createdat DESC";
          }

          $query = $conn->query($sql);

          if ($query->num_rows < 1) {
            echo '<div class="no-job-results">
                <p>No results found...</p> 
              </div>';
          } else {
            while ($row = $query->fetch_assoc()) {
              $id_company = $row['id_company'];
              $jobtitle = $row['jobtitle'];
              $city_id = $row['city_id'];
              $industry_id = $row['industry_id'];
              $media_file = $row['media_path']; // Fetch media file name

              $media_path = "" . $media_file;
              // Determine media type
              $file_extension = strtolower(pathinfo($media_path, PATHINFO_EXTENSION));
              $allowed_images = ["jpg", "jpeg", "png", "gif"];
              $allowed_videos = ["mp4", "avi", "mov", "mkv"];
              $create_date = $row['createdat'];
              $location = $conn->query("SELECT name FROM districts_or_cities WHERE id = '$city_id'")->fetch_assoc();
              $job_category = $conn->query("SELECT name FROM industry WHERE id = '$industry_id'")->fetch_assoc();
              $profile_pic = $conn->query("SELECT profile_pic FROM company WHERE id_company = '$id_company'")->fetch_assoc();
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
        <?php
        
            }
          }
        }
        ?>
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