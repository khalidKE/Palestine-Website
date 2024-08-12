<?php

include '../contact/connect.php'; 
if (isset($_POST['register'])) {
    $fname = isset($_POST['FirstName']) ? $_POST['FirstName'] : '';
    $lname = isset($_POST['LastName']) ? $_POST['LastName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';
    $stm = "INSERT INTO UsersData (FirstName, LastName, email, password) VALUES ('$fname', '$lname', '$email', '$pass')";
    $x = mysqli_query($conn, $stm);
    if ($x) {
        echo "<script>alert('New User Added Successfully');</script>";
    } else {
        echo "<script>alert('Not Completed');</script>";
    }
}
?>
<?php
session_start();
include '../contact/connect.php';
if (isset($_POST['login'])) {
    $fname = $_POST['email'];
    $pass = $_POST['password'];
    $stm = "select * from usersdata where email = '$fname' and password = '$pass' ";
    $result = mysqli_query($conn, $stm);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['email'] = $fname;
        $_SESSION['password'] = $pass;
        echo "accept";
    } else {
        echo "Uncompleted Login";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In & Sign Up</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Montserrat", sans-serif;
        }

        body {
            background-image: url(ph.jpg);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-attachment: scroll;
        }

        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .container p {
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3px;
            margin: 20px 0;
        }

        .container samp {
            font-size: 12px;
        }

        .container a {
            font-size: 17px;
            text-decoration: none;
            margin: 15px 0 10px;
        }

        .container button {
            background-color: black;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }

        .container button.hidden {
            background-color: transparent;
            border-color: #fff;
        }

        .container form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            height: 100%;
        }

        .container input {
            background-color: #eee;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .form-container .fp {
            font-size: 12px;
        }

        .sign-in {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.active .sign-in {
            transform: translateX(100%);
        }

        .sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: move 0.6s;
        }

        @keyframes move {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .social-icons {
            margin: 20px 0;
        }

        .social-icons a {
            border-radius: 20%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 3px;
            width: 40px;
            height: 40px;
            border: 1px solid #000;
        }

        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            z-index: 1000;
            border-radius: 150px 0 0 100px;
        }

        .container.active .toggle-container {
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }

        .toggle {
            background-color: black;
            height: 100%;
            background: linear-gradient(to right #5c6bc0, #512da8);
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle {
            transform: translateX(50%);
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            padding: 0 30px;
            text-align: center;
            top: 0;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .toggle-left {
            transform: translateX(-200%);
        }

        .container.active .toggle-left {
            transform: translateX(0);
        }

        .toggle-right {
            right: 0;
            transform: translateX(0);
        }

        .container.active .toggle-right {
            transform: translateX(200%);
        }

        span {
            color: yellow;
            font-size: 17px;
            text-transform: capitalize;
        }

        .fp:hover {
            color: red;
        }
    </style>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post" action="">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="icon"><i class='bx bxl-google'></i></a>
                    <a href="#" class="icon"><i class='bx bxl-linkedin'></i></a>
                    <a href="#" class="icon"><i class='bx bxl-github'></i></a>
                </div>
                <samp>or use your email for registration</samp>
                <input type="text" name="FirstName" placeholder="First Name" required>

                <input type="text" name="LastName" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="register">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="post" action="">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="https://www.facebook.com/login" target="_blank" class="icon"><i class='bx bxl-facebook'></i></a>
                    <a href="https://accounts.google.com/signin" target="_blank" class="icon"><i class='bx bxl-google'></i></a>
                    <a href="https://www.linkedin.com/login" target="_blank" class="icon"><i class='bx bxl-linkedin'></i></a>
                    <a href="https://github.com/login" target="_blank" class="icon"><i class='bx bxl-github'></i></a>
                </div>
                <samp>or use your email and password</samp>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <a href="#" class="fp">Forgot password?</a>
                <a href="/Home/p.html" class="fp">Back to home</a>
                <button type="submit" name="login">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of our site features. Always remember: <span>Free Palestine</span></p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of our site features. Always remember: <span>Free Palestine</span></p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./login (1).js"></script>
</body>

</html>