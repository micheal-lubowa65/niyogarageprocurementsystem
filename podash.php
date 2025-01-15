<?php

echo '<!DOCTYPE html>';
echo '<html lang="en">';


echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Landing Page</title>';
// Link to Font Awesome for icons
echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">';

// CSS for icon colors 
echo '<style>';
echo 'body {';
echo '  background-color: white;';
echo '  height: 100vh;';
echo '}';
echo '.card i {';
echo '  color: #ffffff;';  // Color the icons white
echo '  margin-top: 20px;';
echo '  margin-bottom: 20px;';
echo '}';

// Remove the underline from links inside the cards
echo '.card a {';
echo '  text-decoration: none;';
echo '}';

echo '</style>';

echo '</head>';

echo '<body>';


echo '<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">';
echo '<div class="row text-center w-100">';

// Title above the cards
echo '<div class="col-12 mb-4">';
echo '<h1 class="text-dark">PROCUREMENT OFFICER DASHBOARD</h1>';
echo '</div>';

// First pane: Procurement Requests
echo '<div class="col-md-4 mb-4">';
echo '<div class="card p-5" style="height: 250px; background-color: #4CAF50;">';
echo '<a href="read_requests.php" class="text-reset"><h2 class="text-white">Procurement Requests</h2></a>';
echo '<i class="fas fa-cogs fa-3x"></i>';  
echo '</div>';
echo '</div>';

// Second pane: Purchase Orders
echo '<div class="col-md-4 mb-4">';
echo '<div class="card p-5" style="height: 250px; background-color: #2196F3;">';
echo '<a href="purchase_orders.php" class="text-reset"><h2 class="text-white">Purchase Orders</h2></a>';
echo '<i class="fas fa-cart-plus fa-3x"></i>';  
echo '</div>';
echo '</div>';

// Third pane: Reports
echo '<div class="col-md-4 mb-4">';
echo '<div class="card p-5" style="height: 250px; background-color: #F44336;">';
echo '<a href="reports.php" class="text-reset"><h2 class="text-white">Reports</h2></a>';
echo '<i class="fas fa-chart-line fa-3x"></i>';  
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';

// Inclusion of  Bootstrap JS for functionality
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>';
echo '</body>';
echo '</html>';
?>
