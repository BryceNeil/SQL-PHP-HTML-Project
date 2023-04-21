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
                    <h1>Order Count</h1>

                    <p>Get the most up-to-date order info</p>
                </div>
                <div class="column2">
                    <div class="table-container">

                    <form action="fetch_orders.php?" method="GET">
                        <label for="date">Enter a Date:</label>
                        <input type="date" id="date" name="date" required>
                        <br><br>
                        <input type="submit" value="Get Order Count">
                    </form>

                        <!-- <table>
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Order Count</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>2023-04-01</td>
                                <td>25</td>
                            </tr>
                            <tr>
                                <td>2023-04-02</td>
                                <td>34</td>
                            </tr>
                            <tr>
                                <td>2023-04-03</td>
                                <td>45</td>
                            </tr>
                            /* Add more rows for additional dates */
                            </tbody>
                        </table> -->
                    </div>

                </div>
            </div>
            
            <!-- Main content goes here -->
        </main>
        <footer>
            <!-- Footer content goes here -->
        </footer>
    </body>
</html>
