<?php
session_start();

# If the admin is logged in
if (isset($_SESSION['user'])) {

    # Database Connection File
    include "../connect.php";

    /** 
     * Check if author name and ID are submitted
     **/
    if (isset($_POST['author_name']) && isset($_POST['author_id'])) {
        /** 
         * Get data from POST request 
         * and store them in variables
         **/
        $name = $_POST['author_name'];
        $id = $_POST['author_id'];

        # Simple form validation
        if (empty($name)) {
            $em = "The author name is required";
            header("Location: ../edit-author.php?error=$em&id=$id");
            exit;
        } else {
            try {
                # UPDATE the Database
                $sql = "UPDATE authors SET name=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $res = $stmt->execute([$name, $id]);

                /**
                 * If there is no error while 
                 * updating the data
                 **/
                if ($res) {
                    # Success message
                    $sm = "Successfully updated!";
                    header("Location: ../edit-author.php?success=$sm&id=$id");
                    exit;
                } else {
                    # Error message
                    $em = "Unknown Error Occurred!";
                    header("Location: ../edit-author.php?error=$em&id=$id");
                    exit;
                }
            } catch (PDOException $e) {
                # Handle database errors
                $em = "Database Error Occurred!";
                header("Location: ../edit-author.php?error=$em&id=$id");
                exit;
            }
        }
    } else {
        header("Location: ../admin.php");
        exit;
    }

} else {
    header("Location: ../login.php");
    exit;
}
?>
