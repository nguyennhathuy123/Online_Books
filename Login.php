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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../../Images/Icon-Logo/Logo-team.png" type="image/x-icon">
    <title>Login</title>
    <style>
        /* Reset some default styles */
body, h1, h2, h3, p, figure, blockquote, dl, dd {
    margin: 0;
}

/* Set box-sizing to border-box for all elements */
*, *::before, *::after {
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.wrapper {
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 8px;
    width: 300px;
}

.form-box {
    text-align: center;
}

h4 {
    margin-bottom: 10px;
    color: #333;
}

h5 {
    margin-bottom: 20px;
    color: #777;
}

.input-box {
    position: relative;
    margin-bottom: 20px;
}

.icon {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #777;
    z-index: 1; /* Ensure icons are above the input */
}

input {
    width: calc(100% - 20px); /* Adjusted width to accommodate icons */
    padding: 10px;
    padding-left: 30px; /* Ensure space for icons */
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
}

label {
    position: absolute;
    top: 50%;
    left: 30px; /* Adjusted left position to align with input */
    transform: translateY(-50%);
    color: #777;
    pointer-events: none;
    transition: 0.3s;
}

input:focus + label,
input:valid + label {
    top: 0;
    font-size: 12px;
    color: #333;
}

.btn-submit {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.login-reg {
    margin-top: 10px;
}

.reg-link {
    color: #3498db;
    text-decoration: none;
}

.reg-link:hover {
    text-decoration: underline;
}

.home-back {
    margin-top: 10px;
}

.home-back a {
    color: #777;
    text-decoration: none;
}

.home-back a:hover {
    text-decoration: underline;
}

    </style>
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
                
                <button type="submit" name="submit" class="btn-submit">Login</button>
                <div class="login-reg">
                    
                        <a href="Register.php" class="reg-link">Register</a>
                    
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
  
</body>

</html>