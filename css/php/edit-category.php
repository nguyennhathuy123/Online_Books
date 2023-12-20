<?php
session_start();

# If the admin is logged in
if (isset($_SESSION['user'])) {

    # Database Connection File
    include "../connect.php";

    /** 
     * Check if category name and ID are submitted
     **/
    if (isset($_POST['category_name']) && isset($_POST['category_id'])) {
        /** 
         * Get data from POST request 
         * and store them in variables
         **/
        $name = $_POST['category_name'];
        $id = $_POST['category_id'];

        # Simple form validation
        if (empty($name)) {
            $em = "The category name is required";
            header("Location: ../edit-category.php?error=$em&id=$id");
            exit;
        } else {
            try {
                # UPDATE the Database
                $sql = "UPDATE categories SET name=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $res = $stmt->execute([$name, $id]);

                /**
                 * If there is no error while 
                 * updating the data
                 **/
                if ($res) {
                    # Success message
                    $sm = "Successfully updated!";
                    header("Location: ../edit-category.php?success=$sm&id=$id");
                    exit;
                } else {
                    # Error message
                    $em = "Unknown Error Occurred!";
                    header("Location: ../edit-category.php?error=$em&id=$id");
                    exit;
                }
            } catch (PDOException $e) {
                # Handle database errors
                $em = "Database Error Occurred!";
                header("Location: ../edit-category.php?error=$em&id=$id");
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
