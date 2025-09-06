<?php
if (isset($_GET['file'])) {
    $file = urldecode($_GET['file']); // Decode the filename
    $filepath = '../filebank/' . $file; 

    if (file_exists($filepath)) {
        // Set headers
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));

        // Clear output buffer and read the file
        flush();
        readfile($filepath);
        exit;
    } else {
        echo "File not found!";
    }
} else {
    echo "No file specified.";
}
?>
