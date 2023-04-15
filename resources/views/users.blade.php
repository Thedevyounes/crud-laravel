<!DOCTYPE html>
<html lang="en">

<head>
    <title>bienvenu</title>
    <style>
        table,
        tr,
        th,
        td {
            border: 1px solid black;
        }

        td,
        th {
            padding: 5px;
        }
    </style>
</head>

<body>
    <p style="color: yellow;">{{ $message }}</p>
    <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>date Naissance</th>
        </tr>
        @foreach($users as $userPosition => $userInfos)
        <tr>
            <td>{{ $userInfos->id }}</td>
            <td>{{ $userInfos->nom }} </td>
            <td> {{ $userInfos->prenom }} </td>
            <td> {{ $userInfos->dateNaissance }} </td>
            <td> <a href="/delete/{{$userInfos->id}}">Delete</a> </td>
            <td> <a href="/modify/{{$userInfos->id}}">Modify</a> </td>
        </tr>
        @endforeach

    </table>
    <br>
    <a href="/register">Add user</a>
</body>

</html>