<!DOCTYPE html>
<html>
<head>
    <title>Previous Bills Data </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            background-image:url('stor.jpg');
        }

        h1 {
            text-align: center;
            background-color: rgb(17, 177, 195);
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
        }

        th {
            background-color: rgb(17, 177, 195);
            color: #FFF;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>PREVIOUS BILLS DATA</h1>
    <div class="container">
        <table>
            <tr>
                
                <th>Previous watts Used</th>
                <th>Previous Month Cost</th>
                <th>Cost per watt</th>
                
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "umllogin";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM userdata";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    
                    echo "<td>" . $row["prev_watts_used"] . "</td>";
                    echo "<td>" . $row["prev_month_cost"] . "</td>";
                    echo "<td>" . $row["cost_per_watt"] . "</td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No data available.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
