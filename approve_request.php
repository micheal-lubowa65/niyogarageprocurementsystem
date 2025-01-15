<?php 

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'procurement_db';

// Variable to hold db connection
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the 'id' from the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // SQL query to update the record
    $sql = "UPDATE procurement_requests SET req_status = 'approved' WHERE id = ?";

    // Prepare and execute the update query
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                alert('Procurement Request successfully Approved');
                window.location.href = 'read_requests.php';
            </script>";
        } else {
            echo "<script>
                alert('Error Approving record: " . mysqli_error($conn) . "');
                window.location.href = 'read_requests.php';
            </script>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>
                alert('Error preparing statement: " . mysqli_error($conn) . "');
                window.location.href = 'read_requests.php';
            </script>";
    }
} else {
    echo "<script>
            alert('No record specified for approval.');
            window.location.href = 'read_requests.php';
        </script>";
}

// Close the database connection
mysqli_close($conn);
?>
