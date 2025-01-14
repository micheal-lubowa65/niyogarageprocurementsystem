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
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // SQL query to delete the record
    $sql = "DELETE FROM procurement_requests WHERE id = ?";

    // Prepare and execute the delete query
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                alert('Record deleted successfully!');
                window.location.href = 'read_request.php';
            </script>";
        } else {
            echo "<script>
                alert('Error deleting record: " . mysqli_error($conn) . "');
                window.location.href = 'read_request.php';
            </script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>
                alert('Error preparing statement: " . mysqli_error($conn) . "');
                window.location.href = 'read_request.php';
            </script>";
    }
} else {
    echo "<script>
            alert('No record specified for deletion.');
            window.location.href = 'read_request.php';
        </script>";
}

// Close the database connection
mysqli_close($conn);
?>
