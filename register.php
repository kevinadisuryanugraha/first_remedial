    <?php
    include_once('./Auth.php');

    $authError = "";

    if(isset($_POST['register'])) {
        $data = [
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "konfirm_password" => $_POST["konfirm_password"],
        ];

        $register = Auth::register($data);

        if($register === true) {
            // Login berhasil, arahkan ke halaman home
            header("Location: login.php");
            exit(); // Penting untuk menghentikan eksekusi skrip setelah mengarahkan
        } elseif ($register === "username_exists") {
            // Username sudah ada di database, atur pesan error
            $authError = "Username sudah ada. Silakan gunakan username lain.";
        } elseif ($register === "password_mismatch") {
            $eror_konfirmpw = "Password dan konfirmasi password tidak cocok. Silakan coba lagi.";
        }
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
            <div class="bg-white p-8 rounded-xl w-96">
                <form action="" method="POST">
                    <p class="font-bold text-3xl text-center mb-5">Register Page</p>


                    <?php if (!empty($authError)) { ?>
                        <p class="text-red-500 text-sm mb-3"><?php echo $authError; ?></p>
                    <?php } ?>

                    <?php if (!empty($eror_konfirmpw)) { ?>
                        <p class="text-red-500 text-sm mb-3"><?php echo $eror_konfirmpw; ?></p>
                    <?php } ?>


                    <div class="mb-3">
                        <label for="username" id="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="isi nama lengkap" class="flex border rounded-sm p-1 mt-1 w-full">
                    </div>

                    <div class="mb-3">
                        <label for="password" id="password">Password</label>
                        <input type="password" id="password" name="password" class="flex border rounded-sm p-1 mt-1 w-full">
                    </div>
                    <div class="mb-3">
                        <label for="konfirm_password" id="konfirm_password">Konfirmasi Password</label>
                        <input type="password" id="konfirm_password" name="konfirm_password" class="flex border rounded-sm p-1 mt-1 w-full">
                    </div>
                    <div class="mt-5">
                        <input type="submit" name="register" id="register"
                            class="bg-blue-500 rounded-xl px-3 py-2 w-full hover:bg-blue-700 cursor-pointer text-white"
                            value="Daftar">
                    </div>
                    <dir class="">
                        <p class="text-xs "><a href="login.php">Anda sudah mempunyai akun? segera masuk sekarang</a></p>
                    </dir>
                </form>
            </div>
        </div>
    </body>

    </html>