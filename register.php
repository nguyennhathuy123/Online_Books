<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="../../../../Images/Icon-Logo/Logo-team.png" type="image/x-icon">
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

h2 {
    margin-bottom: 20px;
    color: #333;
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

.agree-description {
    margin-bottom: 20px;
}

.agree-description label {
    color: #777;
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

.user-link {
    color: #3498db;
    text-decoration: none;
}

.user-link:hover {
    text-decoration: underline;
}

   </style>

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