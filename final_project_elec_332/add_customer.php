
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
                    <h1>Add Customer</h1>

                    <p>Add a new customer</p>
                </div>
                <div class="column2">
                    
				<body>
	<form action="submit-add-customer.php" method="POST">
		<p>Add A New Customer Here</p>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>
		<br>

		<label for="phone">Phone Number:</label>
		<input type="tel" id="phone" name="phone" required>
		<br>

		<label for="fname">First Name:</label>
		<input type="text" id="fname" name="fname" required>
		<br>

		<label for="lname">Last Name:</label>
		<input type="text" id="lname" name="lname" required>
		<br>

		<label for="street">Street Name:</label>
		<input type="text" id="street" name="street" required>
		<br>

		<label for="unit">Unit Number:</label>
		<input type="text" id="unit" name="unit">
		<br>

		<label for="city">City:</label>
		<input type="text" id="city" name="city" required>
		<br>

		<label for="postalcode">Postal Code:</label>
		<input type="text" id="postalcode" name="postalcode" required>
		<br>

		<input type="submit" value="Submit">
	</form>
</body>

                </div>
            </div>
            
            <!-- Main content goes here -->
        </main>
        <footer>
            <!-- Footer content goes here -->
        </footer>
    </body>
</html>


