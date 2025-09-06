<?php
session_start();
require '../model/config/connection2.php';
require_once "../model/class_model.php";

header('Content-Type: application/json');

$connsh = new class_model();


if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized access"]);
    exit;
}

$user_id = $_SESSION['user_id'];
$userinfo = $connsh->user_account($user_id);


if (!$userinfo || !isset($userinfo['role']) || !isset($userinfo['Strand'])) {
    http_response_code(500);
    echo json_encode(["error" => "User information not found"]);
    exit;
}
if($userinfo['role'] == 'Admin'){

$labels = ['Admin','Chairperson', 'Faculty', 'Staff'];
$series = [];
$temp_counts = [];
}else{
    $labels = ['Chairperson', 'Faculty', 'Staff'];
$series = [];
$temp_counts = [];
}


if ($userinfo['role'] === 'Admin') {
    $query = "SELECT role, COUNT(*) as count 
              FROM user 
              WHERE role IN ('Admin', 'Chairperson', 'Faculty', 'Staff') 
              GROUP BY role";
    $stmt = $conn->prepare($query);

} elseif ($userinfo['role'] === 'Chairperson' && $userinfo['Strand'] === 'TVL') {
    $query = "SELECT role, COUNT(*) as count 
              FROM user 
              WHERE role IN ('Chairperson', 'Faculty', 'Staff') 
                AND Strand IN ('TVL', 'TVL-ICT', 'TVL-HE', 'TVL-AFA') 
              GROUP BY role";
    $stmt = $conn->prepare($query);

} elseif (in_array($userinfo['role'], ['Staff', 'Faculty'])) {
 if($userinfo['Strand'] == 'TVL-ICT' || $userinfo['Strand'] == 'TVL-HE' || $userinfo['Strand'] == 'TVL-AFA' ){
    $query = "SELECT role, COUNT(*) as count 
              FROM user 
              WHERE role IN ('Chairperson', 'Faculty', 'Staff') 
                AND (Strand = ? OR Strand = 'TVL' )
              GROUP BY role";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $userinfo['Strand']);
 }else{

    $query = "SELECT role, COUNT(*) as count 
    FROM user 
    WHERE role IN ('Chairperson', 'Faculty', 'Staff') 
      AND (Strand = ? )
    GROUP BY role";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userinfo['Strand']);
 }    

} else {
    $query = "SELECT role, COUNT(*) as count 
              FROM user 
              WHERE role IN ('Chairperson', 'Faculty', 'Staff') 
                AND Strand = ?
              GROUP BY role";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $userinfo['Strand']);
}


if ($stmt->execute()) {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $temp_counts[$row['role']] = (int)$row['count'];
    }

  
    foreach ($labels as $role) {
        $series[] = isset($temp_counts[$role]) ? $temp_counts[$role] : 0;
    }

    echo json_encode([
        'labels' => $labels,
        'series' => $series
    ]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Database query failed"]);
}
?>
