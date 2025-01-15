<?php
// Database connection details
$host = 'localhost';
$dbname = 'procurement_db';
$username = 'root';
$password = '';

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check for any connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve data, including Delivery Due Date
$sql = "SELECT id, first_name, second_name, contact, email, item_name, item_description, quantity, justification, delivery_due_date, request_date, req_status, purchase_order
        FROM procurement_requests WHERE req_status = 'approved' ";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any records were found
if (mysqli_num_rows($result) > 0) {
    // Including Bootstrap CSS from local folder
    echo '<link href="css/bootstrap.min.css" rel="stylesheet">';

    // Add "Back" button aligned to the right
    echo '<div class="container m-4">';
    echo '<a href="podash.php" class="btn btn-primary mb-3 float-end">Back</a>';  // Link to podash.php

    echo '<h2>Niyo Garage Purchase Orders</h2>';
    echo '<table class="table table-bordered table-striped table-hover">';
    echo '<thead class="thead-dark">';
    echo '<tr>
            <th>Item Name</th>
            <th>Item Description</th>
            <th>Quantity</th>
            <th>Purchase Order No.</th>
            <th>Action</th>
          </tr>';
    echo '</thead>';
    echo '<tbody>';

    // Looping through each record and display it in the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['item_name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['item_description']) . '</td>';
        echo '<td>' . htmlspecialchars($row['quantity']) . '</td>';
        echo '<td>' . htmlspecialchars($row['purchase_order']) . '</td>';

      
        echo '<td><a class="btn btn-success btn-sm" href="generate_pdf.php?id=' . htmlspecialchars($row['id']) . '">Generate Purchase Order</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "<p class='text-center mt-4'>No records found.</p>";
}

// Close the database connection
mysqli_close($conn);
?>
