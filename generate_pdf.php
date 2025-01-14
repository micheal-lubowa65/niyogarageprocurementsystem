<?php
require_once('tcpdf/tcpdf.php'); // Include the TCPDF library

// Get the 'id' from the query string
$id = $_GET['id'];

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

// SQL query to retrieve the record based on the id
$sql = "SELECT id, first_name, second_name, contact, email, item_name, item_description, quantity, justification, delivery_due_date, request_date, req_status
        FROM procurement_requests WHERE id = '$id'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the record exists
if (mysqli_num_rows($result) > 0) {
    // Fetch the row
    $row = mysqli_fetch_assoc($result);

    // Create new TCPDF object
    $pdf = new TCPDF();

    // Add a page to the PDF
    $pdf->AddPage();

    // Set PDF metadata
    $pdf->SetTitle('Niyo Garage Purchase Order');

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Add title with a larger, bold font
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'Procurement Request Details', 0, 1, 'C');
    $pdf->Ln(5);

    // Set font back to regular for content
    $pdf->SetFont('helvetica', '', 12);

    // Set a background color for the headers
    $pdf->SetFillColor(230, 230, 230);  // Light gray
    $pdf->Cell(0, 10, 'Requester Details', 0, 1, 'L', true);  // Section header
    $pdf->Ln(2);

    // Display the data from the row with some styling
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(40, 10, 'First Name:', 0, 0);
    $pdf->Cell(0, 10, htmlspecialchars($row['first_name']), 0, 1);
    $pdf->Cell(40, 10, 'Second Name:', 0, 0);
    $pdf->Cell(0, 10, htmlspecialchars($row['second_name']), 0, 1);
    $pdf->Cell(40, 10, 'Contact:', 0, 0);
    $pdf->Cell(0, 10, htmlspecialchars($row['contact']), 0, 1);
    $pdf->Cell(40, 10, 'Email:', 0, 0);
    $pdf->Cell(0, 10, htmlspecialchars($row['email']), 0, 1);
    $pdf->Ln(5);

    $pdf->SetFillColor(230, 230, 230);  // Light gray for section header
    $pdf->Cell(0, 10, 'Item Details', 0, 1, 'L', true);  // Section header
    $pdf->Ln(2);

    $pdf->Cell(40, 10, 'Item Name:', 0, 0);
    $pdf->Cell(0, 10, htmlspecialchars($row['item_name']), 0, 1);
    $pdf->Cell(40, 10, 'Description:', 0, 0);
    $pdf->MultiCell(0, 10, htmlspecialchars($row['item_description']), 0, 'L');
    $pdf->Cell(40, 10, 'Quantity:', 0, 0);
    $pdf->Cell(0, 10, htmlspecialchars($row['quantity']), 0, 1);
    $pdf->Cell(40, 10, 'Justification:', 0, 0);
    $pdf->MultiCell(0, 10, htmlspecialchars($row['justification']), 0, 'L');
    $pdf->Ln(5);

    $pdf->SetFillColor(230, 230, 230);  // Light gray for section header
    $pdf->Cell(0, 10, 'Request Details', 0, 1, 'L', true);  // Section header
    $pdf->Ln(2);

    $pdf->Cell(40, 10, 'Status:', 0, 0);
    $pdf->Cell(0, 10, htmlspecialchars($row['req_status']), 0, 1);
    $pdf->Cell(40, 10, 'Request Date:', 0, 0);
    $pdf->Cell(0, 10, htmlspecialchars($row['request_date']), 0, 1);
    $pdf->Cell(40, 10, 'Delivery Due Date:', 0, 0);
    $pdf->Cell(0, 10, htmlspecialchars($row['delivery_due_date']), 0, 1);

    // Add a line separator
    $pdf->Ln(5);
    $pdf->SetLineWidth(0.5);
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

    // Output the PDF
    $pdf->Output('Procurement_Request_' . $id . '.pdf', 'D');
} else {
    echo "Record not found.";
}

// Close the database connection
mysqli_close($conn);
?>
