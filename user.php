<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../../Images/Icon-Logo/Logo-team.png" type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="Login.css">

<body>
    <div class="wrapper">
        <div class="form-box login">
            <h4>Hello! let's get started</h4>
            <h5>Login to continue</h5>
            <form action="#" method="post">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person-circle"></ion-icon>
                    </span>
                    <input class="email" type="email" name="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-box">
                    <span class="icon" id="lock">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input class="password" type="password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <div class="remember">
                    <label><input type="checkbox" name="remember-checkbox">Remember me</label>
                    <a href="reset-pass-main.php">Forgot Password</a>
                </div>
                <button type="submit" name="submit" class="btn-submit">Login</button>
                <div class="login-reg">
                    <p>Dont' have an account?
                        <a href="Register.php" class="reg-link">Register</a>
                    </p>
                </div>
                <div class="home-back">
                    <a href="index.php">Back to Home</a>
                </div>
            </form>
        </div>
    </div>
    <script src="Login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <?php
        session_start();
        require 'connect.php';
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // check user
            $query_user = "SELECT * FROM user WHERE user_email = '$email' AND user_pass = '$password'";
            $result = mysqli_query($conn, $query_user);
            $row = mysqli_fetch_assoc($result);
            if ($email == $row['user_email'] && $password == $row['user_pass']) {
                $_SESSION['user'] = $row['user_name'];
                echo "<script>alert('Login successfully')</script>";
                // back to the last page using history
                header('location: index.php');
                exit;
            } else {
                echo "<script>alert('Invalid email or password')</script>";
            }
        
            // check admin
            $query_admin = "SELECT * FROM admin WHERE admin_email = '$email'";
            $result = mysqli_query($conn, $query_admin);
            $row = mysqli_fetch_assoc($result);
            error_reporting(E_ERROR | E_PARSE);
            if ($email == $row['admin_email'] && $password == $row['admin_pass']) {
                $_SESSION['admin'] = $row['admin_name'];
        
                echo "<script>alert('Login successfully')</script>";
                header('location: admin.php');
            } else {
                echo "<script>alert('Invalid email or password')</script>";
            }
        }
        ?>
</body>

</html>