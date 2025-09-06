<?php
require '../model/class_model.php';
require '../model/config/connection2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $role = $_POST['role'] ?? '';
    $username = $_POST['Uname'] ?? '';
    $password = $_POST['password'] ?? '';
    $firstName = $_POST['Fname'] ?? '';
    $middleName = $_POST['Mname'] ?? '';
    $lastName = $_POST['Lname'] ?? '';
    $dateOfBirth = $_POST['date'] ?? '';
    $phoneNo = $_POST['phone'] ?? '';
    $aboutMe = $_POST['aboutMe'] ?? '';
    $Strand = $_POST['Strand'] ?? '';
    $status = "Active";

    
    $profileImage = $_FILES['profileImage'] ?? null;
    $backgroundImage = $_FILES['backgroundImage'] ?? null;

    if (empty($role) || empty($username) || empty($password) || empty($firstName) || empty($lastName) || empty($dateOfBirth) || empty($phoneNo)) {
        echo "<div class='alert alert-danger'>Please fill in all required fields!</div>";
        exit;
    }

    
    $uploadDir = "../../imageupload/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

  
    $profileName = "";
    if ($profileImage && $profileImage['error'] === UPLOAD_ERR_OK) {
        $profileName = basename($profileImage["name"]);
        $profilePath = $uploadDir . $profileName;
        $allowedProfileExtensions = ['jpg', 'jpeg', 'png', 'jfif'];
        $profileExt = strtolower(pathinfo($profileName, PATHINFO_EXTENSION));

        if (in_array($profileExt, $allowedProfileExtensions)) {
            move_uploaded_file($profileImage["tmp_name"], $profilePath);
        } else {
            echo "<div class='alert alert-danger'>Invalid profile image type!</div>";
            exit;
        }
    }

    
    $backgroundName = "";
    if ($backgroundImage && $backgroundImage['error'] === UPLOAD_ERR_OK) {
        $backgroundName = basename($backgroundImage["name"]);
        $backgroundPath = $uploadDir . $backgroundName;
        $allowedBackgroundExtensions = ['jpg', 'jpeg', 'png' ,'jfif'];
        $backgroundExt = strtolower(pathinfo($backgroundName, PATHINFO_EXTENSION));

        if (!in_array($backgroundExt, $allowedBackgroundExtensions)) {
            echo "<div class='alert alert-danger'>Invalid background image type!</div>";
            exit;
        }

        if ($backgroundImage['size'] > 5000000) {
            echo "<div class='alert alert-danger'>Background image is too large!</div>";
            exit;
        }

        move_uploaded_file($backgroundImage["tmp_name"], $backgroundPath);
    }

  
    $sql = "INSERT INTO user 
            (username, password, First_name, Middle_name, Last_name, DoB, Phone_No, profile_name, Background, About_me, role, Strand, Status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "sssssssssssss",
            $username,
            $password,
            $firstName,
            $middleName,
            $lastName,
            $dateOfBirth,
            $phoneNo,
            $profileName,
            $backgroundName,
            $aboutMe,
            $role,
            $Strand,
            $status
        );

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>User added successfully!</div>
                  <script> setTimeout(function() { window.history.go(-1); }, 1000); </script>";
        } else {
            echo "<div class='alert alert-danger'>Execute error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Database error: " . $conn->error . "</div>";
    }

    $conn->close();
}
?>
