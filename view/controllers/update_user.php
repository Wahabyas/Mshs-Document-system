<?php

require '../model/config/connection2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? '';
    $new_username = $_POST['new_username'] ?? '';
    $new_password = $_POST['new_password'] ?? '';

    if (empty($user_id) || empty($new_username) || empty($new_password)) {
        echo "<div class='alert alert-danger'>All fields are required.</div>";
        exit;
    }

    $sql = "UPDATE user SET username = ?, password = ? WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_username,  $new_password, $user_id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Username and password updated successfully.</div>
        <script>
            setTimeout(function() { window.location.href = '../index.php'; }, 3000);
        </script>";
    } else {
        echo "<div class='alert alert-danger'>Update failed: " . $stmt->error . "</div>";
    }
    $stmt->close();
    $conn->close();
}
?>