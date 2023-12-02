<?php
// connect 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_books";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Không thể kết nối đến database");
// Select database
mysqli_select_db($conn, $dbname) or die("Không thể kết nối đến database");
// Set charset
mysqli_query($conn, "SET NAMES 'utf8'");