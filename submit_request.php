<?php
// Database connection details
$host = 'localhost';
$dbname = 'procurement_db';
$username = 'root';
$password = '';

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstName = htmlspecialchars($_POST['firstName']);
    $secondName = htmlspecialchars($_POST['secondName']);
    $contact = htmlspecialchars($_POST['contact']);
    $email = htmlspecialchars($_POST['email']);
    $itemName = htmlspecialchars($_POST['itemName']);
    $itemDescription = htmlspecialchars($_POST['itemDescription']);
    $quantity = intval($_POST['quantity']);
    $justification = htmlspecialchars($_POST['justification']);
    $deliveryDueDate = htmlspecialchars($_POST['deliveryDueDate']); // New field for Delivery Due Date

    // Insert data into the database
    $sql = "INSERT INTO procurement_requests (first_name, second_name, contact, email, item_name, item_description, quantity, justification, delivery_due_date, request_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        //  binding the parameters with proper format string
        mysqli_stmt_bind_param($stmt, "ssssssiss", $firstName, $secondName, $contact, $email, $itemName, $itemDescription, $quantity, $justification, $deliveryDueDate);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                alert('Request submitted successfully!');
                window.location.href = 'request_form.php';
            </script>";
        } else {
            echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.location.href = 'request_form.php';
            </script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<p>Error preparing statement: " . mysqli_error($conn) . "</p>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
