<?php



$file = urldecode($_GET['file']);
$filepath = '../filebank/' . $file; // Change this path to your actual file directory

// Get the file extension
$ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

// Supported types for inline view
$mime_types = [
    'pdf' => 'application/pdf',
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'txt' => 'text/plain',
    'doc' => 'application/msword',
    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'xls' => 'application/vnd.ms-excel',
    'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'ppt' => 'application/vnd.ms-powerpoint',
    'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
    'zip' => 'application/zip',
    'rar' => 'application/vnd.rar',
    'csv' => 'text/csv',
    'mp4' => 'video/mp4',
    'mp3' => 'audio/mpeg',
    'html' => 'text/html',
    'css' => 'text/css',
    'js' => 'application/javascript'
];

if (file_exists($filepath) && isset($mime_types[$ext])) {
    header('Content-type: ' . $mime_types[$ext]);
    header('Content-Disposition: inline; filename="' . basename($filepath) . '"');
    readfile($filepath);
    exit;
} else {
    echo "File not found or unsupported format.";
}





?>
