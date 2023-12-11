<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Cost Estimation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('bill.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            color: #5f5353;
        }

        h1, h2 {
            text-align: center;
            color: #2b2323;
            background-color: #6ebcca;
            padding: 10px;
            margin-bottom: 10px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.676);
            padding: 20px;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #0d91a8;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        #costPerWatt, #wattsNeeded {
            font-weight: bold;
            text-align: center;
            box: size 30px;
        }

        p {
            color: #2b2323;
            background-color: #ccc;
        }

        #nextButtonContainer {
            position: absolute;
            top: 30px;
            right: 20px;
        }
        #logoutButtonContainer {
            position: absolute;
            top: 30px;
            left: 20px;
        }

        #nextButton {
            background-color: #0f0905;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        #logoutbutton {
            background-color: #0f0905;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Electricity Cost Estimation</h1>
    <div id="nextButtonContainer">
        <button id="nextButton" onclick="goToNextPage()">Next</button>
    </div>
    <div id="logoutButtonContainer">
        <button id="logoutbutton" onclick="goTologoutPage()">Logout</button>
    </div>
    <form id="electricityForm" method="POST" >
        <label for="prevWattsUsed">Watts Used in Previous Month:</label>
        <input type="number" id="prevWattsUsed" name="prevWattsUsed" required><br><br>

        <label for="prevMonthCost">Cost of Electricity in Previous Month:</label>
        <input type="number"  name="prevMonthCost" id="prevMonthCost" required><br><br>
        <input type="hidden"  value="1">
        <button type="submit" onclick="calculateCostPerWatt()" id="calculateCost" name="calculateCost">Calculate Cost per 1 Watt</button>
        

    </form>

    <h2>Cost per 1 Watt:</h2>
    <p id="costPerWatt">Fill in the above details and click "Calculate Cost per 1 Watt" to calculate.</p>
    <form id="desiredCostForm" >
        <label for="DesiredCost">Desired Cost for This Month:</label>
        <input type="number" id="DesiredCost" name="DesiredCost" required><br><br>
        <button type="button"  onclick="calculateWattsNeeded()">Calculate Watts Needed</button>
    </form>

    <h2>Watts Needed to Achieve Desired Cost:</h2>
    <p id="wattsNeeded">Fill in the desired cost and click "Calculate Watts Needed" to calculate.</p>

    <script>
        
        let costPerWatt = 0; 
        document.getElementById("calculateCost").addEventListener("click", function(event){
            event.preventDefault()
            calculateCostPerWatt()
        });
        function calculateCostPerWatt() {
            const prevWattsUsed = parseFloat(document.getElementById("prevWattsUsed").value);
            const prevMonthCost = parseFloat(document.getElementById("prevMonthCost").value);

            if (!isNaN(prevWattsUsed) && !isNaN(prevMonthCost) && prevWattsUsed > 0) {
                costPerWatt = prevMonthCost / prevWattsUsed; 
                document.getElementById("costPerWatt").innerHTML = `Cost per 1 Watt: ₹${costPerWatt.toFixed(2)}`;
            } else {
                document.getElementById("costPerWatt").innerHTML = "Please fill in valid values.";
            }
        }

        function calculateWattsNeeded() {
            const desiredCost = parseFloat(document.getElementById("DesiredCost").value);

            if (!isNaN(desiredCost) && costPerWatt > 0) {
                const wattsNeeded = desiredCost / costPerWatt;
                document.getElementById("wattsNeeded").innerHTML = `Watts Needed to Achieve Desired Cost: ${wattsNeeded.toFixed(2)} Watts`;
            } else {
                document.getElementById("wattsNeeded").innerHTML = "Please fill in valid values and calculate the cost per 1 Watt first.";
            }
        }

        function goToNextPage() {
        
            window.location.href = "carts.html";
        }
        function goTologoutPage() {
        
            window.location.href = "login.php";
        }
    </script>
</body>

</html>

<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "umllogin";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    if(isset($_POST['calculateCost'])) {
    
    $prevWattsUsed = $_POST['prevWattsUsed'];
    echo  $prevWattsUsed;
    $prevMonthCost = $_POST['prevMonthCost'];
    $costPerWatt = $prevMonthCost / $prevWattsUsed;

    
    $st = "INSERT INTO userdata ('prev_watts_used','prev_month_cost','cost_per_watt') VALUES ('$prevWattsUsed', '$prevMonthCost', '$costPerWatt')";
    $conn->query($st);
}
}


$conn->close();
?>

