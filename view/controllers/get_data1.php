<?php
session_start();
require '../model/config/connection2.php';
require_once "../model/class_model.php";

$connsh = new class_model();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized access"]);
    exit;
}

$user_id = $_SESSION['user_id'];
$userinfo = $connsh->user_account($user_id);

header('Content-Type: application/json');

if (!$userinfo || !isset($userinfo['Strand'])) {
    http_response_code(500);
    echo json_encode(["error" => "User information not found"]);
    exit;
}

$labels = [];
$series = [];

if ($userinfo['Strand'] === 'TVL' && $userinfo['role'] === 'Chairperson' ) {
    $sql = "SELECT Form, COUNT(*) as count 
            FROM file 
            WHERE Strand IN ('TVL', 'TVL-ICT', 'TVL-HE', 'TVL-AFA') 
            GROUP BY Form";
    $stmt = $conn->prepare($sql);
} elseif($userinfo['role'] == 'Admin') {
    $sql = "SELECT Form, COUNT(*) as count FROM file GROUP BY Form";
    $stmt = $conn->prepare($sql);

}else{
    $sql = "SELECT Form, COUNT(*) as count 
    FROM file 
    WHERE Strand = ? 
    GROUP BY Form";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $userinfo['Strand']);
}

if ($stmt->execute()) {
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['Form'];
        $series[] = (int)$row['count'];
    }

    echo json_encode([
        "labels" => $labels,
        "series" => [$series]
    ]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "Database query failed"]);
}
?>