<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #a8edea, #fed6e3); /* gradasi biar cantik */
        }
        .profile-container {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        }
        .profile-container img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            object-fit: cover;
        }
        .profile-item {
            background: #e0e0e0;
            padding: 15px;
            margin: 10px 0;
            border-radius: 6px;
            font-size: 18px;
            width: 250px;
            text-align: center;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Foto -->
        <img src="{{ asset('images/sand.png') }}" alt="Profile Picture">

        <!-- Data -->
        <div class="profile-item">{{ $nama }}</div>
        <div class="profile-item">{{ $kelas }}</div>
        <div class="profile-item">{{ $npm }}</div>
    </div>
</body>
</html>
