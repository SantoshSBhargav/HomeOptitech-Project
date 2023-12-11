<?php
// Initialize a session
session_start();

// Check if the user is already logged in, redirect if they are
if (isset($_SESSION['username'])) {
    header("Location: welcome.php"); // Replace 'welcome.php' with the desired redirect page
    exit();
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simulate a valid username and password (you should use a database for real authentication)
    $valid_username = "your_username";
    $valid_password = "your_password";

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the provided username and password match the valid credentials
    if ($username === $valid_username && $password === $valid_password) {
        // Store the username in the session to indicate a successful login
        $_SESSION['username'] = $username;

        // Redirect the user to the desired page
        header("Location: welcome.php"); // Replace 'welcome.php' with the desired redirect page
        exit();
    } else {
        $error_message = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Your existing HTML head content -->
</head>

<body>
    <div class="container">
        <h2><b><u>Login</u></b></h2>
        <?php
        if (isset($error_message)) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="username"><h3>Username:</h3></label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password"><h3>Password:</h3></label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <button type="submit">Login</button>
            <p>Don't have an account?</p><a href="https://bhargav1429.000webhostapp.com/Uml/regwt.html">SignUp</a>
            <br><br>
        </form>
    </div>
</body>

</html>
