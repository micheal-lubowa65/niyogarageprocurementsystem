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

// Get the 'id' from the URL
if (!isset($_GET['id'])) {
    die("ID is required");
}

$id = intval($_GET['id']);

// SQL query to fetch the record based on the 'id'
$sql = "SELECT id, first_name, second_name, contact, email, item_name, item_description, quantity, justification, delivery_due_date
        FROM procurement_requests WHERE id = $id";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the record exists
if (mysqli_num_rows($result) > 0) {
    // Fetch the record
    $row = mysqli_fetch_assoc($result);
    
    // Start the HTML document
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Niyo Garage Procurement Request Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <style>
            .back-btn {
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 1000;
            }
        </style>
    </head>
    <body>
        
        <!-- Back Button -->
        <a href="read_requests.php" class="btn btn-primary mb-3 float-end">Back</a>

        <div class="container mt-5">
            <h2>Edit Niyo Garage Procurement Request Form</h2>
            <form action="update_request.php" method="POST">
                <input type="hidden" name="id" value="' . $row['id'] . '">
                
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="' . htmlspecialchars($row['first_name']) . '" required>
                </div>
                <div class="mb-3">
                    <label for="secondName" class="form-label">Second Name</label>
                    <input type="text" class="form-control" id="secondName" name="secondName" value="' . htmlspecialchars($row['second_name']) . '" required>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="' . htmlspecialchars($row['contact']) . '" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="' . htmlspecialchars($row['email']) . '" required>
                </div>
                <div class="mb-3">
                    <label for="itemName" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="itemName" name="itemName" value="' . htmlspecialchars($row['item_name']) . '" required>
                </div>
                <div class="mb-3">
                    <label for="itemDescription" class="form-label">Item Description</label>
                    <textarea class="form-control" id="itemDescription" name="itemDescription" rows="3" required>' . htmlspecialchars($row['item_description']) . '</textarea>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="' . htmlspecialchars($row['quantity']) . '" required>
                </div>
                <div class="mb-3">
                    <label for="justification" class="form-label">Justification</label>
                    <textarea class="form-control" id="justification" name="justification" rows="3" required>' . htmlspecialchars($row['justification']) . '</textarea>
                </div>
                <div class="mb-3">
                    <label for="deliveryDueDate" class="form-label">Delivery Due Date</label>
                    <input type="text" class="form-control datepicker" id="deliveryDueDate" name="deliveryDueDate" value="' . htmlspecialchars($row['delivery_due_date']) . '" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit Changes</button>
            </form>
        </div>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".datepicker").datepicker({
                    format: "yyyy-mm-dd", 
                    autoclose: true,
                    todayHighlight: true
                });
            });
        </script>
    </body>
    </html>';
} else {
    echo "<p class='text-center mt-4'>Record not found.</p>";
}

// Close the database connection
mysqli_close($conn);
?>
