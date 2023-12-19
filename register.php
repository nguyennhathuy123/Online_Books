<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="../../../../Images/Icon-Logo/Logo-team.png" type="image/x-icon">
   <style></style>

<body>
    <div class="wrapper">
        <div class="form-box register">
            <h2>Register new account</h2>
            <form action="#" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-circle"></ion-icon>
                    </span>
                    <input class="username" type="text" name="username">
                    <label for="username">Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input class="email" type="email" name="email">
                    <label for="email">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input class="password" type="password" name="password">
                    <label for="password">Password</label>
                </div>
                <div class="agree-description">
                    <label>By register, you are accept with METAaov about the <a href="#">term</a> & <a
                            href="#">condition</a></label>
                </div>
                <button type="submit" name="submit" class="btn-submit" onclick="validate()">Register</button>
                <div class="login-reg">
                    <p>Already have an account?
                        <a href="user.php" class="user-link">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src="Reg.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <?php
    require 'connect.php';
    if (isset($_POST['submit'])) {
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!empty($username) && !empty($email) && !empty($password)) {
                $query = "SELECT user_name FROM user WHERE user_name = '$username'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    echo '<script type="text/javascript">alert("Username already exists")</script>';
                } else {
                    $query = "SELECT user_email FROM user WHERE user_email = '$email'";
                    $query_run = mysqli_query($conn, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        echo '<script type="text/javascript">alert("Email already exists")</script>';
                    } else {
                        $query = "INSERT INTO user (user_name, user_email, user_pass) VALUES ('$username', '$email', '$password')";
                        $query_run = mysqli_query($conn, $query);
                        if ($query_run) {
                            echo '<script type="text/javascript">alert("User Registered")</script>';
                        } else {
                            echo '<script type="text/javascript">alert("Error!")</script>';
                        }
                    }
                }
            }
        }
    }
    ?>
</body>

</html>