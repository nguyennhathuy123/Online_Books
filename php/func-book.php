<?php 
include "connect.php";
# Get All books function
function get_all_books($conn){
   $sqlCount  = "SELECT COUNT(id) as count FROM books ORDER BY id DESC";
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
   $sql  = "SELECT * FROM books WHERE id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
   	  $book = $stmt->fetch();
   }else {
      $book = 0;
   }

   return $book;
}


# Search books function
function search_books($conn, $key){
   # Tạo thuật toán tìm kiếm đơn giản :)
   $key = "%{$key}%";

   $sql  = "SELECT * FROM books 
            WHERE title LIKE :key
            OR description LIKE :key";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':key', $key, PDO::PARAM_STR);
   $stmt->execute();

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
   } else {
      $books = [];
   }

   return $books;
}

# get books by category
function get_books_by_category($conn, $id){
   $sql  = "SELECT * FROM books WHERE category_id=?";
   $stmt = $conn->prepare($sql);
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