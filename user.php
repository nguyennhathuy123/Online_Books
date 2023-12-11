<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include "connect.php";
    if(isset($_POST["user"])){
        $uname = $_POST["email_user"];
        $password = $_POST["psw_user"];
        $query_user = "SELECT * FROM user WHERE email = '$email_user' AND password = '$psw_user'";
        $result = mysqli_query($conn, $query_user);
        $row = mysqli_fetch_assoc($result);
        if($uname == $row['email_user'] && $password == $row['psw_user'])
        {
            if($row['role'] == 0)
            {
                $_SESSION['user'] = $row['email_user'];
                $_SESSION['role'] = $row['role'];
                header('location: index.php');
            }
            else
            {
                header('location: user.php');
            }
        }
        else
        {
            $tb="tai khoan khong ton tai";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    form {
        border: 3px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    .boxcenter {
        width: 500px;
        margin: 0 auto;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <div class="boxcenter">
        <h2>Login Form</h2>

        <form action="Login.php" method="post">
            <div class="imgcontainer">
                <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname_user"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="email_user" required>

                <label for="psw_user"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw_user" required>
                <?php
        if(isset($tb)&&($tb!="")){
            echo "<h3 style='color:red'>".$tb."</h3>";
        }
        ?>
                <button type="submit" name="login">Login</button>
                <a href="register.php" class="register-link">register</a>
                <a href="index.php" class="index-link">Store</a>
            </div>
        </form>
    </div>
</body>

</html>