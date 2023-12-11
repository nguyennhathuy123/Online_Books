<?php 
include "connect.php";
# Get All books function
function get_all_books($conn){
   $sqlCount  = "SELECT COUNT(id) as count FROM books";
   $sql  = "SELECT * FROM books";
   $resultCount = mysqli_query($conn, $sqlCount);
   $rowCount = mysqli_fetch_assoc($resultCount);
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
   if ($rowCount['count'] > 0) {
      $books = $row;
   }else {
      $books = 0;
   }

   return $books;
}

# Get book by ID function
function get_book($conn, $id){
   $sqlCount  = "SELECT COUNT(id) as count FROM books";
   $sql  = "SELECT * FROM books WHERE id = $id";
   $result = mysqli_query($conn, $sql);
   $resultCount = mysqli_query($conn, $sqlCount);
   $rowCount = mysqli_fetch_assoc($resultCount);
   $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
   if ($rowCount['count'] > 0) {
      $book = $row;
   }else {
      $book = 0;
   }
   return $book;
}


# Search books function
function search_books($conn, $key){
   # creating simple search algorithm :)
   $key = "%{$key}%";

   $sql  = "SELECT * FROM books 
            WHERE title LIKE ?
            OR description LIKE ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$key, $key]);

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}

# get books by category
function get_books_by_category($con, $id){
   $sql  = "SELECT * FROM books WHERE category_id=?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}


# get books by author
function get_books_by_author($con, $id){
   $sql  = "SELECT * FROM books WHERE author_id=?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}