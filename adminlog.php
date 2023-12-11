<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>

<body>
<style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('adml.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #333;
           
        }

        .container {
            max-width: 500px;
            max-height: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 5px;
            text-align: center;
            margin-top: 150px; 
            border: 1px solid #06a12a; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
        }

        h2 {
            color: #057676;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #07737f;
        }

        input[type="text"]{

        },
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #0d81a8;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #094551;
        }
    </style>

    <div class="container">
        <h2><b><u>Login</b></u></h2>
        <form method="POST">
            <div class="form-group">
                <label for="username"><h3>Username:</h3></label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password"><h3>Password:</h3></label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <button type="submit" name="login">Login</button>
            <p>Don't have an account?</p><a href="admin.php">SignUp</a>
            <br><br>
        </form>
    </div>
</body>

</html>

<?php
    session_start();

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $host = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "umllogin";

        $conn = mysqli_connect($host, $dbuser, $dbpassword, $dbname);

        $query = "SELECT * FROM admin_login WHERE username='$username' AND pwd='$password';";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0) {
            $_SESSION['Login'] = true;
            header("Location: dashboard.php"); // Redirect to the dashboard page
            exit();
        } else {
            echo '<script type="text/javascript">
                alert("Invalid username or password. Please try again.");
            </script>';
        }

        mysqli_close($conn);
    }
?>