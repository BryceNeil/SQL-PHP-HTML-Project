<!DOCTYPE html>
    <html>
    <head>
        <title>Landing Page</title>
        <link rel="stylesheet" type="text/css" href="homestyle.css">
    </head>
    <body>
        <header>

            <img src="assets/BrycesBurgers.png" alt="Logo">
            <nav>
                <ul>
                <li><a href="employee_schedule.php">Employee Schedule</a></li>
                <spacer type="horizontal" width="50" height="100">    </spacer>
                <li><a href="order_summary.php">Order Summary</a></li>
                <spacer type="horizontal" width="50" height="100">    </spacer>
                <li><a href="order_count.php">Order Count</a></li>
                <spacer type="horizontal" width="50" height="100">    </spacer>
                <li><a href="add_customer.php">Add Customer</a></li>
                </ul>
            </nav>
            <spacer type="horizontal" width="100" height="100">    </spacer>
            <spacer type="horizontal" width="100" height="100">    </spacer>
        </header>

        <main>
            <div class="container">
                <div class="column1">
                    <h1>Employee Work Schedule</h1>

                    <p>Select an employee to see their work schedule.</p>
                </div>
                <div class="column2">
                    <!-- <div class="employee-selector">
                        <button class="employee-selector-button" type="button">Select Employee</button>
                        <ul class="employee-selector-list" style="display:none;">
                            <li data-value="Employee1">Employee1</li>
                            <li data-value="Employee2">Employee2</li>
                            <li data-value="Employee3">Employee3</li>
                        </ul>
                    </div> -->

                    <body>
                        <form method="post" action="fetch_employee_schedule.php">
                            <label for="employee">Select an employee:</label>
                            <select name="employee" id="employee">
                                <?php
                                    // Connect to database using PDO
                                    $servername = "localhost";
                                    $port = '8080/phpmyadmin/i';
                                    $username = "root";
                                    $password = "";
                                    $dbname = "restaurantDB";

                                    try {
                                        $conn = new PDO("mysql:host=$servername; port=$port; dbname=$dbname", $username, $password);
                                        // set the PDO error mode to exception
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        // Retrieve employees from database
                                        $sql = "SELECT id, firstInitial, lastInitial FROM employee";
                                        $result = $conn->query($sql);
                                        if ($result->rowCount() > 0) {
                                            // Output data of each row
                                            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option value='" . $row["firstInitial"] . " " . $row["lastInitial"] . "'>" . $row["firstInital"] . " " . $row["lastInitial"] . "</option>";
                                            }
                                        } else {
                                            echo "No results";
                                        }
                                    }
                                    catch(PDOException $e) {
                                        echo "Connection failed: " . $e->getMessage();
                                    }
                                ?>
                            </select>
                            <br><br>

                                                <label for="date">Enter a Date:</label>
                            <input type="week" id="week" name="week" required>
                            <input type="hidden" id="monday_date" name="date">
                            <br><br>

                            <input type="submit" value="Get Schedule">
                        </form>

                        <p>The selected work week starts on: </p>
                        <p id="monday_date_display"></p>

                        <!-- Variable mondayDateDisplayValue contains the monday date -->

                        <script>
                            document.getElementById("week").addEventListener("change", function() {
                                const weekInput = this;
                                const mondayDateInput = document.getElementById("monday_date");
                                const mondayDateDisplay = document.getElementById("monday_date_display");

                                // Extract Monday's date of the selected week
                                const selectedWeek = new Date(weekInput.value);
                                const mondayDate = new Date(selectedWeek.setDate(selectedWeek.getDate() - selectedWeek.getDay() + 1));

                                // Store Monday's date in the hidden input element
                                mondayDateInput.value = mondayDate.toISOString().slice(0, 10);

                                // Display Monday's date on the screen
                                mondayDateDisplay.textContent = mondayDateInput.value;
                            });
                        </script>
                    </body>

                    <!-- Monday date -->

                    <body>
                        <!-- <form method="post" action="fetch_employee_schedule.php">
                            <label for="week">Select a week:</label>
                            <input type="week" id="week" name="week" required>
                            <input type="hidden" id="monday_date" name="monday_date">
                            <br><br>
                            <input type="submit" value="Submit">
                        </form> -->

                        

                        
                    </body>



                    <!-- <form action="fetch_orders.php?" method="GET">
                        <label for="date">Enter a Date:</label>
                        <input type="date" id="date" name="date" required>
                        <br><br>
                        <input type="submit" value="Get Order Count">
                    </form> -->




                        <div class="calendar-container">
                        <table class="calendar-table">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>12:00am - 1:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>1:00am - 2:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>2:00am - 3:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>3:00am - 4:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>4:00am - 5:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>5:00am - 6:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>6:00am - 7:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>7:00am - 8:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>8:00am - 9:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>9:00am - 10:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>10:00am - 11:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>11:00am - 12:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>12:00pm - 1:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>1:00pm - 2:0pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>2:00pm - 3:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>3:00pm - 4:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>4:00pm - 5:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>5:00pm - 6:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>6:00pm - 7:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>7:00pm - 8:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>8:00pm - 9:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>9:00pm - 10:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>10:00pm - 11:00pm</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>
                            <tr>
                                <td>11:00pm - 12:00am</td>
                                <td class="monday"></td>
                                <td class="tuesday"></td>
                                <td class="wednesday"></td>
                                <td class="thursday"></td>
                                <td class="friday"></td>
                            </tr>

                            <!-- Add more rows for additional time blocks -->
                        </tbody>
                    </table>
                </div>
                
                <script>
                    const employeeSelector = document.querySelector('.employee-selector');
                    const employeeButton = document.querySelector('.employee-selector-button');
                    const employeeList = document.querySelector('.employee-selector-list');
                    const calendarCells = document.querySelectorAll('.calendar td:not(:first-child)');
                    let selectedEmployee = null;

                    // Show/hide the employee list when the button is clicked
                    employeeButton.addEventListener('click', () => {
                    employeeList.style.display = (employeeList.style.display === 'block') ? 'none' : 'block';
                    });

                    // Select an employee from the list
                    employeeList.addEventListener('click', (event) => {
                    // Update the selected employee
                    selectedEmployee = event.target.dataset.value;
                    employeeButton.textContent = selectedEmployee;
                    
                    // Hide the employee list
                    employeeList.style.display = 'none';
                    
                    // Update the calendar cells with the selected employee name
                    calendarCells.forEach((cell) => {
                        cell.textContent = selectedEmployee;
                    });
                    });
                </script>



            
            <!-- Main content goes here -->
        </main>
        <footer>
            <!-- Footer content goes here -->
        </footer>
    </body>
</html>
