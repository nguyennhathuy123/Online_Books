<?php
// Kết nối đến cơ sở dữ liệu và thực hiện các thao tác tìm kiếm
// (Giả sử bạn đã có kết nối đến cơ sở dữ liệu ở file connect.php)

session_start();
require 'connect.php';

if (isset($_GET['searchTerm'])) {
    $searchTerm = $_GET['searchTerm'];

    // Thực hiện truy vấn tìm kiếm trong cơ sở dữ liệu
    $query = "SELECT * FROM books WHERE title LIKE N'%$searchTerm%'";
    $result = mysqli_query($conn, $query);

    // Hiển thị kết quả
    echo "<h2>Search Results</h2>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result))
         {
            $image = $row['cover'];
            $title = $row['title'];
            $description = $row['description'];
            echo '<p>'.$title.'</p>
            <img src = ../Oline_Books/uploads/cover/'.$image.'>
            <p>'.$description.'</p>';
        }
    } else {
        echo "<p>No results found.</p>";
    }
}
?>
