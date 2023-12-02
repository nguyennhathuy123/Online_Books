<?php 
include "connect.php";
# Get all Categories function
function get_all_categories($conn){
   $sqlCount  = "SELECT COUNT(id) as count FROM categories ORDER BY id DESC";
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
function get_category($con, $id){
   $sql  = "SELECT * FROM categories WHERE id=?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
   	  $category = $stmt->fetch();
   }else {
      $category = 0;
   }

   return $category;
}