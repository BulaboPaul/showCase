<?php include "../includes/conn.php"; ?>
<?php include "../includes/indexHeader.php"; ?>

<body>
  <?php include "../includes/indexNavbar.php"; ?>

  <div class="dashboard-container">
    <?php include "../dashboard/dashboardSidebar.php" ?>

    <div class="add-job-container">
      <div class="add-job-content-container">
        <div class="headline">
          <h3>Add New Talent</h3>
        </div>
        <form class="job-form-container" method="post" action="../process/newTalent.php" enctype="multipart/form-data">
  <div class="input-group item-a">
    <label for="job-title">Talent Title</label>
    <input type="text" placeholder="Talent Title" name="jobtitle" required>
  </div>

  <div class="input-group item-b">
    <label for="job-title">Talent Category</label>
    <div class="select-container">
      <select id="select-category" name="industry">
        <?php
        $jobCategorySql = "SELECT * from industry";
        $jobCategoryQuery = $conn->query($jobCategorySql);
        while ($jobCategory = $jobCategoryQuery->fetch_assoc()) { ?>
          <option value="<?php echo $jobCategory['id'] ?>"><?php echo $jobCategory['name'] ?></option>
        <?php } ?>
      </select>
      <span class="custom-arrow"></span>
    </div>
  </div>

  <div class="input-group item-d">
    <label for="job-title">Experience (Years)</label>
    <input type="number" placeholder="Experience" min="0" required name="experience">
  </div>

  <div class="input-group item-f">
    <label for="job-title">Division/State</label>
    <div class="select-container">
      <select id="select-category" name="division_or_state" required>
        <?php
        $divisionOrStateSql = "SELECT * from states";
        $divisionOrStateQuery = $conn->query($divisionOrStateSql);
        while ($divisionOrState = $divisionOrStateQuery->fetch_assoc()) { ?>
          <option value="<?php echo $divisionOrState['id'] ?>"><?php echo $divisionOrState['name'] ?></option>
        <?php } ?>
      </select>
      <span class="custom-arrow"></span>
    </div>
  </div>

  <div class="input-group item-c">
    <label for="job-title">District/City</label>
    <div class="select-container">
      <select id="select-category" name="district_or_city">
        <?php
        $districtOrCitySql = "SELECT * from districts_or_cities";
        $districtOrCityQuery = $conn->query($districtOrCitySql);
        while ($districtOrCity = $districtOrCityQuery->fetch_assoc()) { ?>
          <option value="<?php echo $districtOrCity['id'] ?>"><?php echo $districtOrCity['name'] ?></option>
        <?php } ?>
      </select>
      <span class="custom-arrow"></span>
    </div>
  </div>

  <div class="input-group item-e">
    <label for="job-title">Deadline</label>
    <input type="date" name="deadline" required>
  </div>

  <div class="input-group item-l">
    <label for="job-title">Skills</label>
    <textarea cols="20" rows="5" placeholder="Skills..." name="skills" required></textarea>
  </div>

  <div class="input-group item-m">
    <label for="job-title">Description</label>
    <textarea cols="20" rows="5" placeholder="Job Description..." required name="description"></textarea>
  </div>

  <!-- File Upload Field -->
  <div class="input-group item-o">
    <label for="media">Upload Image or Video</label>
    <input type="file" name="media" accept="image/*,video/*">
  </div>

  <div class="button-container item-n">
    <button type="submit" name="submitJob" class="btn btn-secondary">Submit Talent</button>
  </div>
</form>


      </div>

    </div>
  </div>
</body>