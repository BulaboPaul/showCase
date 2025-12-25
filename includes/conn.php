<?php
$conn = mysqli_connect("localhost", "root", "", "talentshowcase", 3307);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());}
