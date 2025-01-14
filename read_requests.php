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
$sql = "SELECT id, first_name, second_name, contact, email, item_name, item_description, quantity, justification, delivery_due_date, request_date, req_status
        FROM procurement_requests";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any records were found
if (mysqli_num_rows($result) > 0) {
    // Including  Bootstrap CSS from local folder
    echo '<link href = "css/bootstrap.min.css" rel="stylesheet">' ;

    
    echo '<div class="container m-4">';
    echo '<h2>Niyo Garage Procurement Requests</h2>';
    echo '<table class="table table-bordered table-striped table-hover">';
    echo '<thead class="thead-dark">';
    echo '<tr>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Item Name</th>
            <th>Item Description</th>
            <th>Quantity</th>
            <th>Justification</th>
            <th>Status</th>
            <th>User Request Date</th>
            <th>Delivery Due Date</th> 
            <th colspan="2" style="text-align: center;">Actions</th>
          </tr>';
    echo '</thead>';
    echo '<tbody>';
    
    // Loop through each record and display it in the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . htmlspecialchars($row['first_name']) . '</td>
                <td>' . htmlspecialchars($row['second_name']) . '</td>
                <td>' . htmlspecialchars($row['contact']) . '</td>
                <td>' . htmlspecialchars($row['email']) . '</td>
                <td>' . htmlspecialchars($row['item_name']) . '</td>
                <td>' . htmlspecialchars($row['item_description']) . '</td>
                <td>' . htmlspecialchars($row['quantity']) . '</td>
                <td>' . htmlspecialchars($row['justification']) . '</td>
                <td>' . htmlspecialchars($row['req_status']) . '</td>
                <td>' . htmlspecialchars($row['request_date']) . '</td>
                <td>' . htmlspecialchars($row['delivery_due_date']) . '</td>
                
                <td>
                    <a href="approve_request.php?id=' . $row['id'] . '" class="btn btn-outline-success">Approve</a>
                </td>
                <td>
                    <a href="delete_request.php?id=' . $row['id'] . '" class="btn btn-outline-danger">Delete</a>
                </td>
              </tr>';
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
