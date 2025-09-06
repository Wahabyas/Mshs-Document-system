<?php
require '../model/config/connection2.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_name = $_POST['Fname'];
    $sender = $_POST['user_id'];
    $folder_id = $_POST['folder_id'];
    $strand = $_POST['strand'];

    $fileTmp = $_FILES['file']['tmp_name'];
    $fileRealName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $destination = "../filebank/" . $fileRealName;

    $fileExtension = strtolower(pathinfo($fileRealName, PATHINFO_EXTENSION));

  
    switch ($fileExtension) {
        case 'pdf':
            $Form = 'PDF';
            break;
        case 'doc':
        case 'docx':
            $Form = 'Word Document';
            break;
        case 'xls':
        case 'xlsx':
            $Form = 'Excel Spreadsheet';
            break;
        case 'ppt':
        case 'pptx':
            $Form = 'PowerPoint Presentation';
            break;
        case 'txt':
            $Form = 'Text File';
            break;
        case 'png':
             $Form = 'Photo';
            break;
         case 'jpeg':
                $Form = 'Photo';
             break;
             case 'jpg':
                $Form = 'Photo';
             break;
        default:
            $Form = 'Unknown';
            break;
           
    }

    if (move_uploaded_file($fileTmp, $destination) ) {
       if ($Form != 'Unknown'){
        $size_readable = round($fileSize / 1024, 2) . " KB";

        $sql = "INSERT INTO file (file_name, file, upload, size, Form,Strand, sender, id)
                VALUES (?, ?, NOW(), ?, ?,?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $file_name, $fileRealName, $size_readable, $Form, $strand, $sender, $folder_id);

        if ($stmt->execute()) {
            echo '<div class="alert alert-success" >Add file Successfully!</div><script> setTimeout(function() {  window.history.go(-1); }, 1000); </script>';
        } else {
            echo "Error saving file to database.";
        }

        $stmt->close();
    } else {
        echo '<div class="alert alert-danger">This file is Restricted!</div><script> setTimeout(function() {  window.history.go(-1); }, 1000); </script>';
    }
    } else {
        echo "Failed to upload file.";
    }

    $conn->close();
}
?>
