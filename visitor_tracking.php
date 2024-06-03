<?php
// File path to store the visitor count
$countFilePath = 'visitor_count.txt';

// Check if the visitor has accepted cookies
if (isset($_COOKIE['cookie_accepted'])) {
    // Read the current count from the file
    $currentCount = (file_exists($countFilePath)) ? intval(file_get_contents($countFilePath)) : 0;

    // Increment the count
    $currentCount++;

    // Update the count in the file
    file_put_contents($countFilePath, $currentCount);
}
?>