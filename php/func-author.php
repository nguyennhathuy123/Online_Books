<?php 
include "connect.php";
# Get all Author function
function get_all_author($conn){
   $sqlCount  = "SELECT COUNT(id) as count FROM authors";
   $sql  = "SELECT * FROM authors";
   $resultCount = mysqli_query($conn, $sqlCount);
   $rowCount = mysqli_fetch_assoc($resultCount);
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
   if ($rowCount['count'] > 0) {
      $authors = $row;
   }else {
      $authors = 0;
   }

   return $authors;
}


# Get Author by ID function
function get_author($conn, $id){
   $sqlCount  = "SELECT COUNT(id) as count FROM authors";
   $sql  = "SELECT * FROM authors WHERE id = $id";
   $resultCount = mysqli_query($conn, $sqlCount);
   $rowCount = mysqli_fetch_assoc($resultCount);
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
   if ($rowCount['count'] > 0) {
      $author = $row;
   }else {
      $author = 0;
   }

   return $author;
}