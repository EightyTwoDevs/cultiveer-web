import requests
import json

# URL of the PHP script
url = "http://cultiveer.com/api.php"  # Update this with your actual endpoint

# Fake sensor data
payload = {
    "device_id": "zorokolla",
    "device_secret": "AZK124",
    "airTemp": 25.5,
    "humidity": 60.2,
    "lightLux": 1500,
    "soilMoisture": 45.8,
    "soilTemp1": 22.4,
    "soilTemp2": 23.1
}

# Send POST request
headers = {"Content-Type": "application/json"}
response = requests.post(url, data=json.dumps(payload), headers=headers)

# Print response
print("Status Code:", response.status_code)
print("Response:", response.json())
