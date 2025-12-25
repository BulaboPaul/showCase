<?php
include "../includes/session.php";

if (isset($_GET['id'])) {

    if (isset($_POST['updateJob'])) {
        $id_jobpost = $_GET['id'];
        $id_company = $_SESSION['id_company'];
        $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
        $industry = mysqli_real_escape_string($conn, $_POST['industry']);
        $experience = mysqli_real_escape_string($conn, $_POST['experience']);
        $division_or_state_id = mysqli_real_escape_string($conn, $_POST['division_or_state']);
        $district_or_city_id = mysqli_real_escape_string($conn, $_POST['district_or_city']);
        $deadline = mysqli_real_escape_string($conn, $_POST['deadline']);
        $skills_ability = mysqli_real_escape_string($conn, $_POST['skills']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        
        // File Upload Handling
        $file_path = ""; // Default empty
        if (!empty($_FILES["file"]["name"])) {
            $target_dir = "../assets/uploads/";  // Ensure this folder exists
            $file_name = basename($_FILES["file"]["name"]);
            $file_path = $target_dir . $file_name;

            // Move file to the uploads folder
            if (!move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)) {
                echo "Error uploading file.";
                exit;
            }
        }

        // Update SQL query
        $sql = "UPDATE job_post SET
            id_company = '$id_company',
            jobtitle = '$jobtitle',
            industry_id = '$industry',
            experience = '$experience',
            state_id = '$division_or_state_id',
            city_id = '$district_or_city_id',
            deadline = '$deadline',
            skills_ability = '$skills_ability',
            description = '$description'";

        // Append file update if a new file is uploaded
        if (!empty($file_path)) {
            $sql .= ", file_path = '$file_path'";
        }

        $sql .= " WHERE id_jobpost = '$id_jobpost'";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../dashboard/manageTalents.php');
            exit();
        } else {
            echo "Error updating job: " . $conn->error;
        }
    }
}
?>
