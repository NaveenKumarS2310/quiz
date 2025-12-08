<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .profile {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .profile h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .profile img {
            display: block;
            margin: auto;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile .details {
            margin-top: 20px;
        }
        .profile .details p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="profile">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <!-- Profile Picture (optional) -->
        <i class="fas fa-user"></i>
        
        <!-- Display User's Name -->
        <h1>{{ $user->name }}</h1>
        
        <div class="details">
            <!-- Display User's Email -->
            <p><strong>Email:</strong> {{ $user->email }}</p>
            
            <!-- Display Other Details -->
            <!-- Ensure that these fields exist in the users table -->
            <p><strong>Name:</strong> {{ $user->name ?? 'Not provided' }}</p>
        </div>
    </div>
</body>
</html>
