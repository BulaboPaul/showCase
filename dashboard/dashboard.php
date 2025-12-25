<?php include "../includes/conn.php" ?>
<?php include "../includes/indexHeader.php"; ?>

<body>
  <?php include "../includes/indexNavbar.php"; ?>

  <div class="dashboard-container">
    <?php include "./dashboardSidebar.php"; ?>
    <div class="dashboard-content-container">
      <?php if (($_SESSION['role_id']) == 1) : ?>
        <div class="container-box">
          <div class="icon">
            <i class="fa-solid fa-video"></i>
          </div>
          <h1>
            <?php
            $id_user = $_SESSION['id_user'];
            $sql  = "select * from applied_jobposts where id_user = '$id_user'";
            $query = $conn->query($sql);
            echo $query->num_rows;
            ?>
          </h1>
          <span>Applied Talents</span>
        </div>
        <div class="container-box">
          <div class="icon">
            <i class="fa-sharp fa-solid fa-heart"></i>
          </div>
          <h1>
            <?php
            $id_user = $_SESSION['id_user'];
            $sql  = "select * from saved_jobposts where id_user = '$id_user'";
            $query = $conn->query($sql);
            echo $query->num_rows;
            ?>

          </h1>
          <span>Saved Talents</span>
        </div>

      <?php endif; ?>
      <?php if (($_SESSION['role_id']) == 2) : ?>
        <div class="container-box">
          <div class="icon">
            <i class="fa-solid fa-video"></i>
          </div>
          <h1>
            <?php
            $id_company = $_SESSION['id_company'];
            $sql = "SELECT * FROM job_post WHERE id_company = '$id_company'";
            $query = $conn->query($sql);
            echo $query->num_rows;
            ?>
          </h1>
          <span>Talents Posted</span>
        </div>
        <div class="container-box">
          <div class="icon">
            <i class="fa-solid fa-star"></i>
          </div>
          <h1>
            <?php
            $id_company = $_SESSION['id_company'];
            $sql = "SELECT * FROM company_reviews JOIN company on company_reviews.company_id=company.id_company WHERE id_company = '$id_company'";
            $query = $conn->query($sql);
            echo $query->num_rows;
            ?>
          </h1>
          <span>Reviews</span>
        </div>
      <?php endif; ?>

      <?php if (($_SESSION['role_id']) == 3) : ?>
        <div class="container-box">
          <div class="icon">
            <i class="fa-solid fa-video"></i>
          </div>
          <h1>
            <?php
            $sql = "SELECT * FROM job_post";
            $query = $conn->query($sql);
            echo $query->num_rows;
            ?>
          </h1>
          <span>Talents</span>
        </div>
        <div class="container-box">
          <div class="icon">
            <i class="fa-solid fa-user"></i>
          </div>
          <h1>
            <?php
            $sql = "SELECT * FROM company";
            $query = $conn->query($sql);

            echo $query->num_rows;
            ?>
          </h1>
          <span>Artists</span>
        </div>
        <div class="container-box">
          <div class="icon">
            <i class="fa-solid fa-users"></i>
          </div>
          <h1>
            <?php
            $sql = "SELECT * FROM users";
            $query = $conn->query($sql);

            echo $query->num_rows;
            ?>
          </h1>
          <span>Talent Seekers</span>
        </div>
      <?php endif; ?>
    </div>
  </div>

</body>