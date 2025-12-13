{{-- <!DOCTYPE html>
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
</html> --}}
@section('title', 'Home Page')
@section('description', 'Home Page')
@section('keywords', 'Home Page')

@extends('layouts.master')
@section('content')
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
  <button type="button" class="btn btn-primary">1</button>
  <button type="button" class="btn btn-primary">2</button>

  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Dropdown
    </button>
    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <li><a class="dropdown-item" href="#">Dropdown link</a></li>
      <li><a class="dropdown-item" href="#">Dropdown link</a></li>
    </ul>
  </div>
</div>
@endsection
