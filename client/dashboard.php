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
    <link rel="stylesheet" href="../assets/css/client.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<h1>Sensor Data Dashboard</h1>

<!-- Dashboard Container -->
<div class="dashboard-container">
    <div class="chart-container">
        <canvas id="airTempChart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="humidityChart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="lightLuxChart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="soilMoistureChart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="soilTemp1Chart"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="soilTemp2Chart"></canvas>
    </div>
</div>

<!-- Logout Button -->
<a href="logout.php" class="logout-button">Logout</a>

<script>
    const sensorData = <?php echo json_encode($sensorData); ?>;

    const labels = sensorData.map(data => data.created_at);

    const airTempData = sensorData.map(data => parseFloat(data.airTemp));
    const humidityData = sensorData.map(data => parseFloat(data.humidity));
    const lightLuxData = sensorData.map(data => parseFloat(data.lightLux));
    const soilMoistureData = sensorData.map(data => parseFloat(data.soilMoisture));
    const soilTemp1Data = sensorData.map(data => parseFloat(data.soilTemp1));
    const soilTemp2Data = sensorData.map(data => parseFloat(data.soilTemp2));

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
                    borderWidth: 2,
                    pointRadius: 4,
                    pointBackgroundColor: '#f7c35f',
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: { color: '#333' }
                    }
                },
                scales: {
                    x: {
                        title: { display: true, text: 'Timestamp', color: '#666' },
                        ticks: { color: '#888' }
                    },
                    y: {
                        title: { display: true, text: label, color: '#666' },
                        ticks: { color: '#888' }
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
</script>
</body>
</html>