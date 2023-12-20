<?php
session_start();

# If the admin is logged in
if (isset($_SESSION['user'])) {

    # Database Connection File
    include "../connect.php";

    /**
     * Check if the author id is set
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
            try {
                # DELETE the author from Database
                $sql = "DELETE FROM authors WHERE id=?";
                $stmt = $conn->prepare($sql);
                $res = $stmt->execute([$id]);

                /**
                 * If there is no error while
                 * Deleting the data
                 **/
                if ($res) {
                    # success message
                    $sm = "Successfully removed!";
                    header("Location: ../admin.php?success=$sm");
                    exit;
                } else {
                    # Error message
                    $em = "Error Occurred!";
                    header("Location: ../admin.php?error=$em");
                    exit;
                }
            } catch (PDOException $e) {
                # Handle database errors
                $em = "Database Error Occurred!";
                header("Location: ../admin.php?error=$em");
                exit;
            }
        }
    } else {
        $em = "Author ID not set!";
        header("Location: ../admin.php?error=$em");
        exit;
    }
} else {
    header("Location: ../admin.php");
    exit;
}
?>
