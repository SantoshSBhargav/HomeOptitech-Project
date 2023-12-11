<!DOCTYPE html>
<html>

<head>
    <title>REGISTRATION FORM</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('lh.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(239, 230, 230, 0.936);
            border-radius: 5px;
            text-align: left; /* Adjust to align the form elements to the left */
            margin-top: 100px; /* Adjust to position the form vertically */
        }

        h1 {
            text-align: center;
            color: #fff;
            background-color: #0d91a8;
            padding: 20px;
            margin-bottom: 20px;
        }

        h2 {
            text-align: center;
            color: #030909;
            margin-bottom: 20px;
        }

        h3 {
            color: #020d0f;
        }

        label {
            color: #0d99a8;
            display: inline-block; /* Align labels inline with form fields */
            width: 150px; /* Adjust label width as needed */
        }

        input[type="text"]{
            row-gap: auto;
        },
        input[type="date"],
        select,
        
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="button"] {
            background-color: #0d99a8;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="radio"] {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }

        /* Adjust alignment for the Gender labels */
        .gender-label {
            vertical-align: middle;
            margin-left: 5px; /* Add some spacing between radio buttons and labels */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><i><u>HOME OPTITECH</u></i></h1>
        <form method="POST">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" />
        
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" />
            </div>
            <div class="form-group">
                <label for="dob">Dob:</label>
                <input type="date" id="dob" name="dob" />
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <input type="radio" id="male" name="gender" value="male" />
                <label for="male" class="gender-label">Male</label>
                <input type="radio" id="female" name="gender" value="female" />
                <label for="female" class="gender-label">Female</label>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" />
            </div>
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" id="street" name="street" />
            </div>
            <div class="form-group">
                <label for="pincode">Pincode:</label>
                <input type="text" id="pincode" name="pincode" />
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="country" id="country" name="country" />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" />
            </div>
            <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" id="username" name="username" />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" />
            </div>
            <div class="form-group">
                <label for="mobileNo">Mobileno:</label>
                <input type="num" id="mobileno" name="mobileno" />
            </div>
            <div class="form-group">
                <label for="accountType">TYPE :</label>
                <select name="Type" id="Type">
                    <option value="TEMPORARY">TEMP</option>
                    <option value="PERMANENT">PER</option>
                </select>
            </div>
            <button id="register" name="register" type="submit">Register</button>
        </form>
    </div>
</body>


</html>
<?php

if(isset($_POST['register'])){
$FirstName = $_POST['firstName'];
$LastName = $_POST['lastName'];
$dob = $_POST['dob'];
$Gender = $_POST['gender'];
$Address = $_POST['address'];
$Street = $_POST['street'];
$Pincode = $_POST['pincode'];
$Country = $_POST['country'];
$Email = $_POST['email'];
$Username = $_POST['username'];
$Password = $_POST['password'];
$Mobileno=$_POST['mobileno'];
$Type=$_POST['Type'];


$conn=mysqli_connect("localhost","root","","umllogin");
$sql = "INSERT INTO regs1 values ('$FirstName','$LastName','$dob','$Gender','$Address','$Street','$Pincode','$Country','$Email','$Username','$Password','$Mobileno','$Type');";
echo $sql;
$x=mysqli_query($conn,$sql);
if($x){
    echo '<script type="text/javascript">

        window.onload = function () { alert("Registration successful"); }

    </script>';
    }
else{
        echo '<script type="text/javascript">
    
            window.onload = function () { alert("Registration unsuccessful"); }
    
        </script>';
}
}
?>