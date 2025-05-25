<?php
require 'DbConfig.php';

$search = isset($_GET['q']) ? '%' . $_GET['q'] . '%' : '%';

$stmt = $con->prepare("SELECT id, name, image, address FROM theater WHERE name LIKE ? OR address LIKE ?");
$stmt->bind_param("ss", $search, $search);
$stmt->execute();
$result = $stmt->get_result();

$theaters = [];
while ($row = $result->fetch_assoc()) {
    $theaters[] = $row;
}

header('Content-Type: application/json');
echo json_encode($theaters);
?>