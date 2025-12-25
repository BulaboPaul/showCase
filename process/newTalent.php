<?php
include "../includes/session.php";
if (isset($_POST['submitJob'])) {
  $id_company = $_SESSION['id_company'];
  $jobtitle = $_POST['jobtitle'];
  $industry = $_POST['industry'];
  $experience = $_POST['experience'];
  $division_or_state_id = $_POST['division_or_state'];
  $district_or_city_id = $_POST['district_or_city'];
  $deadline = $_POST['deadline'];
  $skills_ability = $_POST['skills'];
  $description = $_POST['description']; 
  $media_file = $_FILES['media']['name'];

  // Hash the job title for uniqueness
  $hash = md5($jobtitle);
  $file_ext = pathinfo($media_file, PATHINFO_EXTENSION);
  $fil_ename = $hash . '.' . $file_ext;
  
  // File Upload Handling
  $target_dir = "../assets/images/"; // Correct directory
  $media_path = NULL; // Default value if no file is uploaded
  $media_type = NULL;
  
  // Ensure the directory exists
  if (!is_dir($target_dir)) {
      mkdir($target_dir, 0777, true);
  }
  
  if (!empty($_FILES["media"]["name"])) {
      $file_name = basename($_FILES["media"]["name"]);
      $target_file = $target_dir . $fil_ename;
      $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  
      // Allowed file types
      $allowed_images = ["jpg", "jpeg", "png", "gif"];
      $allowed_videos = ["mp4", "avi", "mov", "mkv"];
  
      if (in_array($file_type, $allowed_images)) {
          $media_type = "image";
      } elseif (in_array($file_type, $allowed_videos)) {
          $media_type = "video";
      } else {
          die("Error: Only image and video files are allowed.");
      }
  
      // Move file to server directory
      if (move_uploaded_file($_FILES["media"]["tmp_name"], $target_file)) {
          $media_path = $target_file;
      } else {
          die("Error uploading file.");
      }
  }
  
  // Insert into database
  $sql = "INSERT INTO job_post (id_company, jobtitle, industry_id, description, state_id, city_id, experience, skills_ability, deadline, media_path, media_type) 
          VALUES ('$id_company', '$jobtitle', '$industry', '$description', '$division_or_state_id', '$district_or_city_id', '$experience', '$skills_ability', '$deadline', '$media_path', '$media_type')";

  if (mysqli_query($conn, $sql)) {
      echo "Job posted successfully!";
  } else {
      echo "Error: " . mysqli_error($conn);
  }
}



header('Location: ../dashboard/addTalent.php');
exit();
