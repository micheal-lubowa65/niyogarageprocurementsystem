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
    // Including Bootstrap CSS from local folder
    echo '<link href="css/bootstrap.min.css" rel="stylesheet">';

    // Add "Back" button aligned to the right
    echo '<div class="container m-4">';
    echo '<a href="podash.php" class="btn btn-primary mb-3 float-end">Back</a>';  // Link to podash.php


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
            <th>Actions</th>
          </tr>';
    echo '</thead>';
    echo '<tbody>';

    // Loop through each record and display it in the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['first_name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['second_name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['contact']) . '</td>';
        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
        echo '<td>' . htmlspecialchars($row['item_name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['item_description']) . '</td>';
        echo '<td>' . htmlspecialchars($row['quantity']) . '</td>';
        echo '<td>' . htmlspecialchars($row['justification']) . '</td>';
        echo '<td>' . htmlspecialchars($row['req_status']) . '</td>';
        echo '<td>' . htmlspecialchars($row['request_date']) . '</td>';
        echo '<td>' . htmlspecialchars($row['delivery_due_date']) . '</td>';

        // Dropdown for actions
        echo '<td>';
        echo '<div class="btn-group">';
        echo '<button type="button" class="btn btn-light btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>';
        echo '<ul class="dropdown-menu">';
        
        // Conditional approve button
        if ($row['req_status'] === 'pending') {
            echo '<li><a class="dropdown-item"  href="approve_request.php?id=' . $row['id'] .  '">Approve</a></li>';
        } else {
            echo '<li><a class="dropdown-item disabled" href="#">Approve</a></li>';
        }
        
        if ($row['req_status'] === 'pending') {
        echo '<li><a class="dropdown-item" href="reject_request.php?id=' . $row['id'] . '">Reject</a></li>';
        }else {
            echo '<li><a class="dropdown-item disabled" href="#">Reject</a></li>';
        }
        
        if ($row['req_status'] === 'pending') {
        echo '<li><a class="dropdown-item" href="edit_request.php?id=' . $row['id'] . '">Edit</a></li>';
        } else {
            echo '<li><a class="dropdown-item disabled" href="#">Edit</a></li>';
      
        }

     
        // Delete button
        echo '<li><a class="dropdown-item" href="delete_request.php?id=' . $row['id'] . '">Delete</a></li>';

        echo '</ul>';
        echo '</div>';
        echo '</td>';

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

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
