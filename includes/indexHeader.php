<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Talent Showcase</title>

  <!-- css files -->
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/responsive.css">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bagel+Fat+One&family=Pacifico&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <style>

  .img-container{
    height: 500px;
    overflow: hidden;

    }
/* Job List Container */
.talent-list-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3 models per row */
  gap: 20px;
  padding: 20px;
}

/* Job Item Styling */
.talent-item-container {
  /* Maintain YouTube-like aspect ratio */
  background: #ffffff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease-in-out;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 10px;
  width: 300px;
  height: 300px;
}

.talent-item-container:hover {
  transform: translateY(-5px);
}

/* Profile Image */
.prof-container img {
  width: 100%; /* Full width */
  height: 150px; /* Rectangle shape */
  object-fit: cover; /* Ensures it looks good */
  border-radius: 8px;
  aspect-ratio: 16 / 9; 
}

/* Job Info */
.talent-info-container {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.talent-info-left-side h3 {
  font-size: 18px;
  margin: 5px 0;
  color: #333;
}

.others-inform {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  margin: 10px 0;
}

.others-inform i {
  color: #007bff;
}

/* Date and Validity */
.date-inform {
  font-size: 14px;
  color: #666;
}

.valid-active {
  color: green;
  font-weight: bold;
}

.valid-expired {
  color: red;
  font-weight: bold;
}

/* Responsive Design */
@media (max-width: 768px) {
  .talent-list-container {
    grid-template-columns: 1fr; /* Single column on small screens */
  }
}

  </style>

</head>