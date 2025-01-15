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
    $id = intval($_POST['id']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $secondName = htmlspecialchars($_POST['secondName']);
    $contact = htmlspecialchars($_POST['contact']);
    $email = htmlspecialchars($_POST['email']);
    $itemName = htmlspecialchars($_POST['itemName']);
    $itemDescription = htmlspecialchars($_POST['itemDescription']);
    $quantity = intval($_POST['quantity']);
    $justification = htmlspecialchars($_POST['justification']);
    $deliveryDueDate = htmlspecialchars($_POST['deliveryDueDate']); // New field for Delivery Due Date

    // SQL query 
    $sql = "UPDATE procurement_requests
            SET first_name = ?, second_name = ?, contact = ?, email = ?, 
                item_name = ?, item_description = ?, quantity = ?, justification = ?, 
                delivery_due_date = ?
            WHERE id = ?";

    // Prepare the statement for execution
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the placeholders in the SQL statement
        mysqli_stmt_bind_param($stmt, "ssssssisss", $firstName, $secondName, $contact, $email, $itemName, $itemDescription, $quantity, $justification, $deliveryDueDate, $id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('Request successfully Updated!');
                    window.location.href = 'read_requests.php';
                </script>";
        } else {
            echo "<script>
                    alert('Error: " . mysqli_error($conn) . "');
                    window.location.href = 'read_requests.php';
                </script>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<p>Error preparing statement: " . mysqli_error($conn) . "</p>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
