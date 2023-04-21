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
                    <h1>Order Summary</h1>

                    <p>Get a summary of each order</p>
                </div>
                <div class="column2">
                    <div>


                        <head>
                            <title>Order Summary</title>
                            <link rel="stylesheet" type="text/css" href="orderstyle.css">
                        </head>
                        <body>
                            <h1>Order Summary</h1>
                            <form action="fetch_order_summary.php?" method="GET">
                                <label for="date">Enter a Date:</label>
                                <input type="date" id="date" name="date" required>
                                <br><br>
                                <input type="submit" value="Get Order Summary">
                            </form>


                            <div class="order-list">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Items</th>
                                            <th>Total</th>
                                            <th>Tip</th>
                                            <th>Delivery Person</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Orders will be added dynamically here -->
                                    </tbody>
                                </table>
                            </div>

                            <script src="order.js"></script>
                        </body>

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
