<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator BMI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            max-width: 90%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            color: #666;
        }
        input {
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        #result {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Kalkulator BMI</h1>
        <form method="post">
            <label for="weight">Berat (kg):</label>
            <input type="number" id="weight" name="weight" required step="0.1">
            
            <label for="height">Tinggi (cm):</label>
            <input type="number" id="height" name="height" required step="0.1">
            
            <button type="submit">Hitung BMI</button>
        </form>
        
        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $weight = $_POST["weight"];
                $height = $_POST["height"] / 100; // Convert cm to m
                
                $bmi = $weight / ($height * $height);
                $bmi = round($bmi, 2);
                
                echo "BMI Anda: " . $bmi . "<br>";
                
                if ($bmi < 18.5) {
                    echo "Kategori: Kurus";
                } elseif ($bmi < 25) {
                    echo "Kategori: Normal";
                } elseif ($bmi < 30) {
                    echo "Kategori: Kelebihan berat badan";
                } else {
                    echo "Kategori: Obesitas";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>