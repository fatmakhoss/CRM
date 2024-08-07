@extends('design.base')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .move-right {
            margin-right: 5000px;

        }
    </style>
    <title>Admin</title>
    <link rel="stylesheet" href="('js/app.js')">
</head>
<body>
<div class="container">
    <h1><p class="move-right">Admin</p></h1>

    </div>
    <ul>
        <a href="{{route('admin.settings.index')}}">settings</a><br>
        <a href="{{route('admin.users.index')}}">gere users</a><br>
    </ul>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
