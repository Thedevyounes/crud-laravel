<!DOCTYPE html>
<html lang="en">
<head>
   <title>confirm delete</title>
</head>
<body>
    Id to delete : {{ $id }}

    <button onclick="window.location.href='http://127.0.0.1:8000/confirmdelete/{{ $id }}';">
      Confirm
    </button>
</body>
</html>