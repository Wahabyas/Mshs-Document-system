<?php
require '../model/class_model.php';
require '../model/config/connection2.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $role = $_POST['role'] ?? '';
    $Fname = $_POST['Fname'] ?? '';
    $Mname = $_POST['Mname'] ?? '';
    $Lname = $_POST['Lname'] ?? '';
    $date = $_POST['date'] ?? '';
    $Strand = $_POST['Strand'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $aboutMe = $_POST['aboutMe'] ?? '';




    if (empty($role) || empty($Fname) || empty($Mname) || empty($Lname) || empty($date)  || empty($phone)|| empty($aboutMe)) {
        echo "<div class='alert alert-danger'>Please fill in all required fields!</div>";
        exit;
    }

    
 
   

    


  

$sql = "SELECT * FROM user WHERE 
    `role` = ? AND First_name = ? AND Middle_name = ? AND Last_name = ? AND DoB = ? AND Strand = ? AND Phone_No = ? AND About_me = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param(
        "ssssssss",
        $role,
        $Fname,
        $Mname,
        $Lname,
        $date,
        $Strand,
        $phone,
        $aboutMe
    );

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $name = $row['First_name'];
    $Middle_name = $row['Middle_name'];
    $Last_name = $row['Last_name'];
    $username = $row['username'];
    $user_id = $row['user_id'];

    echo "
    <script>
        if (confirm('Are you $name $Middle_name $Last_name?')) {
            document.getElementById('message11').innerHTML = `
                <form id=\"resetForm\">
                    <div class=\"form-group\">
                        <label for=\"new_username\">New Username</label>
                        <input type=\"text\" class=\"form-control\" id=\"new_username\" name=\"new_username\" required>
                    </div>
                    <div class=\"form-group\">
                        <label for=\"new_password\">New Password</label>
                        <input type=\"password\" class=\"form-control\" id=\"new_password\" name=\"new_password\" placeholder=\"$username\" required>
                    </div>
                    <input type=\"hidden\" name=\"user_id\" value=\"$user_id\">
                    <button type=\"submit\" class=\"btn btn-primary mb-2 mt-2\">Update</button>
                </form>
                <div id=\"update-result\"></div>
            `;
            document.getElementById('resetForm').onsubmit = function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                fetch('controllers/update_user.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    document.getElementById('update-result').innerHTML = data;
                    setTimeout(function() { window.location.href = '../index.php'; }, 1000);
                });
            };
        } else {
            document.getElementById('message').innerHTML =
                '<div class=\"alert alert-danger\">Please try again.</div>';
        }
    </script>
    ";
        } else {
            echo "<div class='alert alert-danger'>No user found with the provided information.</div>";
        }
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
