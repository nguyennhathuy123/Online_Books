<?php
session_start();

# If the admin is logged in
if (isset($_SESSION['user']) && isset($_SESSION['role'])) {

    # Database Connection File
    include "../connect.php";

    /** 
     * Check if the category id is set
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
                # DELETE the category from Database
                $sql = "DELETE FROM categories WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id]);

                /**
                 * If there is no error while 
                 * Deleting the data
                 **/
                # Success message
                $sm = "Successfully removed!";
                header("Location: ../admin.php?success=$sm");
                exit;
            } catch (PDOException $e) {
                # Handle database errors
                $em = "Database Error Occurred!";
                header("Location: ../admin.php?error=$em");
                exit;
            }
        }
    } else {
        $em = "Category ID not set!";
        header("Location: ../admin.php?error=$em");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>
