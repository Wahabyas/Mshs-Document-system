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
    $status = $_POST['Status'] ?? '';
    $reason = $_POST['Reason'] ?? null; // 1. Get the reason
    $user_id = $_POST['user_ids'] ?? '';

    $profileImage = $_FILES['profileImage'] ?? null;
    $backgroundImage = $_FILES['backgroundImage'] ?? null;

    if (empty($user_id) || empty($role) || empty($username) || empty($password) || empty($firstName) || empty($lastName) || empty($dateOfBirth) || empty($phoneNo)) {
        echo "<div class='alert alert-danger'>Please fill in all required fields!</div>";
        exit;
    }

    $uploadDir = "../../imageupload/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
   

    $existingProfile = "";
    $existingBackground = "";

    $query = $conn->prepare("SELECT profile_name, Background FROM user WHERE user_id = ?");
    $query->bind_param("i", $user_id);
    $query->execute();
    $query->bind_result($existingProfile, $existingBackground);
    $query->fetch();
    $query->close();

    $profileName = $existingProfile;
    if ($profileImage && $profileImage['error'] === UPLOAD_ERR_OK) {
        $profileExt = strtolower(pathinfo($profileImage["name"], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png' ,'jfif'];

        if (in_array($profileExt, $allowed)) {
            if (!empty($existingProfile) && file_exists($uploadDir . $existingProfile)) {
                unlink($uploadDir . $existingProfile);
            }
            $profileName = uniqid("profile_") . "." . $profileExt;
            move_uploaded_file($profileImage["tmp_name"], $uploadDir . $profileName);
        } else {
            echo "<div class='alert alert-danger'>Invalid profile image type!</div>";
            exit;
        }
    }


    $backgroundName = $existingBackground;
    if ($backgroundImage && $backgroundImage['error'] === UPLOAD_ERR_OK) {
        $backgroundExt = strtolower(pathinfo($backgroundImage["name"], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png' ,'jfif'];

        if (!in_array($backgroundExt, $allowed)) {
            echo "<div class='alert alert-danger'>Invalid background image type!</div>";
            exit;
        }

        if ($backgroundImage['size'] > 5000000) {
            echo "<div class='alert alert-danger'>Background image is too large!</div>";
            exit;
        }

        if (!empty($existingBackground) && file_exists($uploadDir . $existingBackground)) {
            unlink($uploadDir . $existingBackground);
        }

        $backgroundName = uniqid("background_") . "." . $backgroundExt;
        move_uploaded_file($backgroundImage["tmp_name"], $uploadDir . $backgroundName);
    }

    if ($status === 'Inactive' && empty($reason)) { // 2. Require reason if inactive
        echo "<div class='alert alert-danger'>Please provide a reason for inactivation.</div>";
        exit;
    }

    // === UPDATE USER ===
    $sql = "UPDATE user SET 
            username = ?, password = ?, First_name = ?, Middle_name = ?, Last_name = ?, DoB = ?, Phone_No = ?, profile_name = ?, Background = ?, About_me = ?, role = ?, Strand = ?, Status = ?, Reason = ?
            WHERE user_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param(
            "ssssssssssssssi",
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
            $status,
            $reason, // 3. Bind the reason
            $user_id
        );

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>User updated successfully!</div>
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
