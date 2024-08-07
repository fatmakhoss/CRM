@extends('design.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Settings</title>
        <link rel="stylesheet" href="('css/app.css') ">
    </head>
    <body>
        <div class="container">
            <h1>Paramètres</h1>
            <table>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->email}}</td>
                </tr>

                @endforeach
            </table>

                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </form>
        </div>
        <script src="('js/app.js')"></script>
    </body>
    </html>
@endsection
