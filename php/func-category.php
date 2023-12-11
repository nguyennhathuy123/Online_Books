<?php 
include "connect.php";
# Get all Categories function
function get_all_categories($conn){
   $sqlCount  = "SELECT COUNT(id) as count FROM categories";
   $sql  = "SELECT * FROM categories";
   $resultCount = mysqli_query($conn, $sqlCount);
   $rowCount = mysqli_fetch_assoc($resultCount);
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
   if ($rowCount['count'] > 0) {
      $categories = $row;
   }else {
      $categories = 0;
   }

   return $categories;
}


# Get category by ID
function get_category($conn, $id){
   $sqlCount  = "SELECT COUNT(id) as count FROM categories";
   $sql  = "SELECT * FROM categories WHERE id = $id";
   $resultCount = mysqli_query($conn, $sqlCount);
   $rowCount = mysqli_fetch_assoc($resultCount);
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
   if ($rowCount['count'] > 0) {
      $category = $row;
   }else {
      $category = 0;
   }

   return $category;
}