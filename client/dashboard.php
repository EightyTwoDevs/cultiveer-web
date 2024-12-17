<?php
session_start();

$conn = new mysqli("localhost", "root", "", "cultiveer");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_query = "SELECT device_id FROM users WHERE id = '$user_id'";
$user_result = $conn->query($user_query);

if ($user_result->num_rows > 0) {
    $user = $user_result->fetch_assoc();
    $device_id = $user['device_id'];
} else {
    echo "Error: User not found.";
    exit();
}

// Correct query with JOIN to match device_id
$data_query = "SELECT a.airTemp, a.humidity, a.lightLux, a.soilMoisture, a.soilTemp1, a.soilTemp2, a.created_at FROM analytics a INNER JOIN users u ON a.device_id = u.id WHERE u.device_id = '$device_id' ORDER BY a.created_at ASC";

$data_result = $conn->query($data_query);


$sensorData = [];
while ($row = $data_result->fetch_assoc()) {
    $sensorData[] = $row;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Data Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<h1>Sensor Data Dashboard</h1>

<!-- Canvas for Charts -->
<canvas id="airTempChart" width="400" height="200"></canvas>
<canvas id="humidityChart" width="400" height="200"></canvas>
<canvas id="lightLuxChart" width="400" height="200"></canvas>
<canvas id="soilMoistureChart" width="400" height="200"></canvas>
<canvas id="soilTemp1Chart" width="400" height="200"></canvas>
<canvas id="soilTemp2Chart" width="400" height="200"></canvas>

<script>

    const sensorData = <?php echo json_encode($sensorData); ?>;

    const labels = sensorData.map(data => data.created_at);

    const airTempData = sensorData.map(data => parseFloat(data.airTemp));
    const humidityData = sensorData.map(data => parseFloat(data.humidity));
    const lightLuxData = sensorData.map(data => parseFloat(data.lightLux));
    const soilMoistureData = sensorData.map(data => parseFloat(data.soilMoisture));
    const soilTemp1Data = sensorData.map(data => parseFloat(data.soilTemp1));
    const soilTemp2Data = sensorData.map(data => parseFloat(data.soilTemp2));

    // Function to Create Charts
    function createChart(ctx, label, data) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: { display: true, text: 'Timestamp' }
                    },
                    y: {
                        title: { display: true, text: label }
                    }
                }
            }
        });
    }

    // Create Charts
    createChart(document.getElementById('airTempChart'), 'Air Temperature (°C)', airTempData);
    createChart(document.getElementById('humidityChart'), 'Humidity (%)', humidityData);
    createChart(document.getElementById('lightLuxChart'), 'Light Lux (lx)', lightLuxData);
    createChart(document.getElementById('soilMoistureChart'), 'Soil Moisture (%)', soilMoistureData);
    createChart(document.getElementById('soilTemp1Chart'), 'Soil Temperature 1 (°C)', soilTemp1Data);
    createChart(document.getElementById('soilTemp2Chart'), 'Soil Temperature 2 (°C)', soilTemp2Data);
    console.log(sensorData);

</script>

<a href="logout.php">Logout</a>
</body>
</html>


