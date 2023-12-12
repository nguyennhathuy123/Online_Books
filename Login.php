<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include "connect.php";
    if(isset($_POST["login"])){
        $uname = $_POST["uname"];
        $password = $_POST["psw"];
        $query_user = "SELECT * FROM admin WHERE username = '$uname' AND password = '$password'";
        $result = mysqli_query($conn, $query_user);
        $row = mysqli_fetch_assoc($result);
        if($uname == $row['username'] && $password == $row['password'])
        {
            if($row['role'] == 1)
            {
                $_SESSION['user'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                header('location: admin.php');
            }
            else
            {
                header('location: index.php');
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
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <?php
        if(isset($tb)&&($tb!="")){
            echo "<h3 style='color:red'>".$tb."</h3>";
        }
        ?>
                <button type="submit" name="login">Login</button>
                <a href="index.php" class="register-link">Store</a>

            </div>
        </form>
    </div>
</body>

</html>