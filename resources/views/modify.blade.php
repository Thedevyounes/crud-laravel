<!DOCTYPE html>
<html lang="en">

<head>
    <title>modify user</title>
    <style>
        .alert {
            color: red;
        }
    </style>
</head>

<body>
    <form action="/update" method="post">
        @csrf
        <!-- <label for="id">id</label>
        <input type="number" name="id" value={{$id}}><br>
        @error('id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror 
        -->
        
        <input type="hidden" name="id" value={{$id}}>

        <label for="nom">nom</label>
        <input type="text" name="nom" value={{$nom}}><br>
        @error('nom')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="prenom">prenom</label>
        <input type="text" name="prenom" value={{$prenom}}><br>
        @error('prenom')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="dateNaissance">dateNaissance</label>
        <input type="date" name="dateNaissance" value="{{$dateNaissance}}"><br>
        @error('dateNaissance')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="submit" value="submit">
    </form>
</body>

</html>
