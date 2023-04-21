<!DOCTYPE html>
<html>
<head>
    <title>Employee Schedule</title>
    <style>
        .tables-row {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .table-container {
            flex: 1;
            margin: 0 10px;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php

        //Funciton to fetch data for the date
        function fetchDataForDate($empID, $day) {

            // // Retrieve employee ID and date from POST parameters
            global $conn;


            // Connect to database using PDO
            $servername = "localhost";
            $port = '8080/phpmyadmin/i';
            $username = "root";
            $password = "";
            $dbname = "restaurantDB";

            try {
                $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                // Prepare the SQL query

                $sql = "SELECT ws.workDay, ws.startTime, ws.endTime
                FROM workSchedule ws
                JOIN employee e ON ws.id = e.id
                WHERE CONCAT(e.firstInitial, ' ', e.lastInitial) = :empID AND ws.workDay = :day;
                ";

                // $sql = "SELECT workDay, startTime, endTime FROM workSchedule WHERE id=:empID AND workDay=:day";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":empID", $empID);
                $stmt->bindParam(":day", $day);
                $stmt->execute();

                // Fetch data and return as an array
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(PDOException $e) {
                // GETTING SOME ERROR HERE
                echo "Connection failed: " . $e->getMessage();
            }
            
        }


        // Retrieve employee ID and date from POST parameters
        $empID = $_POST["employee"];
        $date = $_POST["date"];

        // Connect to database using PDO
        $servername = "localhost";
        $port = '8080/phpmyadmin/i';
        $username = "root";
        $password = "";
        $dbname = "restaurantDB";

        try {
            $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Retrieve employee's schedule for the selected date
            $sql = "SELECT workDay, startTime, endTime FROM workSchedule WHERE id=:empID AND workDay=:date";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":empID", $empID);
            $stmt->bindParam(":date", $date);
            $stmt->execute();

            // Display the Monday date
            echo "<h1>Monday date test: " . $date . "</h1>";

            // Display the employee id
            echo "<h1>Employee ID: " . $empID . "</h1>";

            // Display employee's schedule in a table
            //echo "<h1>Employee Schedule for " . date("l, F j, Y", strtotime($date)) . "</h1>";
            echo "<table>";
            echo "<tr><th>Day</th><th>Start Time</th><th>End Time</th></tr>";
            foreach($stmt as $row) {
                $day = $row["workDay"];
                $start = $row["startTime"];
                $end = $row["endTime"];
                echo "<tr><td>$day</td><td>$start</td><td>$end</td></tr>";
            }
            echo "</table>";

            // If no data is found, display a message
            if($stmt->rowCount() == 0) {
                echo "<p>No schedule found for the selected employee and date.</p>";
            }
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
    ?>

    <?php
        $date = $_POST["date"];
        $dateObject = new DateTime($date);
        $daysOfWeek = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
    ?>

    <div class="tables-row">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="table-container">
            <h2><?php echo $daysOfWeek[$i]; ?></h2>
                <table>
                    <tr><th>Day</th><th>Start Time</th><th>End Time</th></tr>
                    <?php


            

                    // Update the day in the loop
                    $day = $dateObject->format('Y-m-d');
                    
                    // Fetches data for each day
                    $data = fetchDataForDate($empID, $day);

                    // Debug: print day being sent as input into fetchDataForDate function
                    echo "<pre>";
                    print_r($day);
                    echo "</pre>";

                    // Debug: print fetched data to check its validity
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";

                    echo "<pre>";
                    print_r($empID);
                    echo "</pre>";

                    // // Display the Monday date
                    // echo "<h2>Monday date test: " . $date . "</h2>";

                    // // Display the employee id
                    // echo "<h2>Employee ID: " . $empID . "</h2>";

                    foreach($data as $row) {
                        $day = $row["workDay"];
                        $start = $row["startTime"];
                        $end = $row["endTime"];

                        
                        echo "<tr><td>$day</td><td>$start</td><td>$end</td></tr>";
                    } 


                     // Increment the date by 1 day
                     $dateObject->modify('+1 day');
                    
                        // echo "<p>Curr day: . $day . </p>";
                     if($stmt->rowCount() == 0) {
                        //echo "<p>No schedule found for the selected employee and date.</p>";
                    } 
                    ?>
                    
                </table>
            </div>
        <?php } ?>

        <!-- If no data is found, display a message MIGHT DELETE THIS-->
        <?php if($data->rowCount() == 0) {
            echo "<p>No schedule found for the selected employee and date.</p>";
        } ?>
    </div>

</body>
</html>
