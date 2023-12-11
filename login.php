<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('sun.png'); 
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
</head>

<body>
    <div class="container">
        <h2><b><u>Login</h2></b></u>
        <form method ="GET">
            <div class="form-group">
                <label for="username"><h3>Username:</label></h3>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password"><h3>Password:</h3></label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <button type="submit">Login</button>
            <p>Don't have an account?</p><a href="regwt.php">SignUp</a>
            <br><br>
        </form>
    </div>
</body>

</html>
<?php
session_start(); 

if (isset($_GET['username']) && isset($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];

    
    $conn = mysqli_connect("localhost", "root", "", "umllogin");

  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $sql = "SELECT * FROM regs1 WHERE username=? and Password=?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['Login'] = true;
            echo '<script type="text/javascript">
                    alert("Logged in successfully");
                    window.location.href = "billgen.php";
                  </script>';
        } else {
            echo '<script type="text/javascript">
                    alert("Invalid details or create an account before logging in");
                  </script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Missing username and password parameters.";
}
?>
