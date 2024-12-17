<?php
header("Content-Type: application/json");

// Database connection
$conn = new mysqli("localhost", "root", "", "cultiveer");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if all required data is provided
    if (!isset($data['device_id'], $data['device_secret'], $data['airTemp'], $data['humidity'], $data['lightLux'], $data['soilMoisture'], $data['soilTemp1'], $data['soilTemp2'])) {
        http_response_code(400); // Bad Request
        echo json_encode(["message" => "Incomplete data."]);
        exit();
    }

    // Sanitize inputs
    $device_id = $conn->real_escape_string($data['device_id']);
    $device_secret = $conn->real_escape_string($data['device_secret']);
    $airTemp = $conn->real_escape_string($data['airTemp']);
    $humidity = $conn->real_escape_string($data['humidity']);
    $lightLux = $conn->real_escape_string($data['lightLux']);
    $soilMoisture = $conn->real_escape_string($data['soilMoisture']);
    $soilTemp1 = $conn->real_escape_string($data['soilTemp1']);
    $soilTemp2 = $conn->real_escape_string($data['soilTemp2']);

    // Verify device ID and secret
    $query = "SELECT id FROM users WHERE device_id = '$device_id' AND device_secret = '$device_secret'";

    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        // Valid device_id and device_secret
        $user = $result->fetch_assoc();
        $verified_device_id = $user['id'];

        // Insert data into analytics table
        $insert_query = "INSERT INTO analytics (device_id, airTemp, humidity, lightLux, soilMoisture, soilTemp1, soilTemp2)
                         VALUES ('$verified_device_id', '$airTemp', '$humidity', '$lightLux', '$soilMoisture', '$soilTemp1', '$soilTemp2')";

        if ($conn->query($insert_query)) {
            http_response_code(201); // Created
            echo json_encode(["message" => "Data stored successfully."]);
        } else {
            http_response_code(500); // Internal Server Error
            echo json_encode(["message" => "Failed to store data."]);
        }
    } else {
        // Invalid device_id or device_secret
        http_response_code(403); // Forbidden
        echo json_encode(["message" => "Invalid device ID or secret."]);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["message" => "Only POST requests are allowed."]);
}
?>
