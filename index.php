
<?php

include './classes/admin.php' ;
// session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form action="" method="post">
<div class="flex flex-col items-center m-60 p-10">
    <div class="text-3xl font-bold">Planet.DEV admin</div>
    <div class="w-48 h-0.5 m-2 bg-slate-400"></div>

    <div class="flex m-2 flex-col">
    <label for="">username</label>
    <input name="username" class="border w-64 h-9  border-slate-900" type="text"></div>

    <div class="flex m-2 flex-col">
    <label for="">password</label>
    <input name="password" class="border  w-64 h-9 border-slate-900" type="password"></div>

    <div class="w-48 h-0.5 m-2 bg-slate-400"></div>
    <button type="submit" name="submit" class="rounded-lg border px-3 py-1 bg-gradient-to-r from-slate-700 to-slate-600 hover:from-pink-500 hover:to-yellow-500 ...">
        login
      </button>
    </div>
</form>


<?php

if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $log = new admin($username,$password);
        $log->loginadmin();
    }
?>



</body>
</html>