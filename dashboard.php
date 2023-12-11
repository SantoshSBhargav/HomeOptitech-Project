<!DOCTYPE html>
<html>
<head>
    <title>User Registration Report</title>
    <div class="button-container">
        <a href="adminlog.php" class="button">Logout</a>
        <a href="storeddata.php" class="button">Next</a>
    </div>
</head>
<body>
<style>

body {
            background-image: url('das.jpg'); 
            background-size: cover;
            
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            
            color: cyan;
            padding: 20px;
            text-align: center;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: left;
            background-color: #f2f2f2;
            
        }

        th {
            background-color: rgb(17, 177, 195);
            color: #FFF;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
            border-radius:2px;
            
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color:rgb(17, 177, 195) ;
            color: #FFF;
            text-decoration: none;
            margin: 0 10px;
            color: black;
    </style>
    <h1>User Registration Report</h1>
    <?php
   
    $conn = mysqli_connect("localhost", "root", "", "umllogin");
    
   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    
    $sql = "SELECT * FROM regs1";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        
        echo "<table border='1'>";
        echo "<tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Street</th>
                <th>Pincode</th>
                <th>Country</th>
                <th>Email</th>
                <th>Username</th>
                <th>Mobile No</th>
                <th>User Type</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['FirstName']."</td>
                    <td>".$row['LastName']."</td>
                    <td>".$row['dob']."</td>
                    <td>".$row['Gender']."</td>
                    <td>".$row['Address']."</td>
                    <td>".$row['Street']."</td>
                    <td>".$row['Pincode']."</td>
                    <td>".$row['Country']."</td>
                    <td>".$row['Email']."</td>
                    <td>".$row['Username']."</td>
                    <td>".$row['Mobileno']."</td>
                    <td>".$row['Type']."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
    
   
    mysqli_close($conn);
    ?>
    
</body>
</html>
