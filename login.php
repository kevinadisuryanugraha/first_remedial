<?php
include_once('./Auth.php');

if(isset($_POST['login'])){
    $data = [
        "username" => $_POST['username'],
        "password" => $_POST['password'],
    ];

    $result = Auth::login($_POST['username'], $_POST['password']);
    // die(var_dump($result));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-yellow-400 flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded-xl h-96 w-96">
            <form action="home.php" method="POST">
                <p class="font-bold text-3xl text-center mb-5">Login Page</p>

                <div class="mb-3">
                    <label for="username" id="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="isi nama lengkap" class="flex border rounded-sm p-1 mt-1 w-full">
                </div>
                <div class="mb-3">
                    <label for="password id=" password">Password</label>
                    <input type="password" id="password" name="password" class="flex border rounded-sm p-1 mt-1 w-full">
                </div>
                <div class="mt-5">
                    <input type="submit" name="login" id="login"
                        class="bg-blue-500 rounded-xl px-3 py-2 w-full hover:bg-blue-700 cursor-pointer text-white"
                        value="Login">
                </div>
                <dir class="">
                    <p class="text-xs "><a href="register.php">Anda belum mempunyai akun? segera daftar sekarang</a>
                    </p>
                </dir>
            </form>
        </div>
    </div>
</body>

</html>