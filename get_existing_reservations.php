<?php
require 'config.php';

// Fetch existing reservations from the database
$sql = "SELECT res_id, fullname, p_loc FROM res";
$result = $conn->query($sql);

$reservations = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reservations[] = array(
            'res_id' => $row['res_id'],
            'fullname' => $row['fullname'],
            'p_loc' => $row['p_loc']
        );
    }
}

// Output as JSON
header('Content-Type: application/json');
echo json_encode($reservations);

$conn->close();
?>