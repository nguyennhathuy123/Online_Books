<?php
session_start();

# If the admin is logged in
if (isset($_SESSION['user'])) {

    # Database Connection File
    include "../connect.php";

    /**
     * Check if the book id is set
     **/
    if (isset($_GET['id'])) {
        /**
         * Get data from GET request
         * and store it in a variable
         **/
        $id = $_GET['id'];

        # Simple form Validation
        if (empty($id)) {
            $em = "Error Occurred!";
            header("Location: ../admin.php?error=$em");
            exit;
        } else {
            # GET book from Database
            $sqlCount = "SELECT COUNT(id) as count FROM books WHERE id = $id";
            $sql = "SELECT * FROM books WHERE id = $id";
            $resultCount = mysqli_query($conn, $sqlCount);
            $rowCount = mysqli_fetch_assoc($resultCount);

            if ($rowCount['count'] > 0) {
                # Retrieve the book data
                $result = mysqli_query($conn, $sql);
                $the_book = mysqli_fetch_assoc($result);

                # DELETE the book from Database
                $sqlDelete = "DELETE FROM books WHERE id = $id";
                $resultDelete = mysqli_query($conn, $sqlDelete);

                /**
                 * If there is no error while
                 * Deleting the data
                 **/
                if ($resultDelete) {
                    # delete the current book_cover and the file
                    $cover = $the_book['cover'];
                    $file = $the_book['file'];
                    $c_b_c = "../uploads/cover/$cover";
                    $c_f = "../uploads/files/$file";  // Corrected variable name

                    unlink($c_b_c);
                    unlink($c_f);

                    # success message
                    $sm = "Successfully removed!";
                    header("Location: ../admin.php?success=$sm");
                    exit;
                } else {
                    # Error message
                    $em = "Unknown Error Occurred!";
                    header("Location: ../admin.php?error=$em");
                    exit;
                }
            } else {
                $em = "Error Occurred!";
                header("Location: ../admin.php?error=$em");
                exit;
            }
        }
    } else {
        header("Location: ../admin.php");
        exit;
    }
} else {
    header("Location: ../admin.php");
    exit;
}
?>
