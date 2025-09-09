<?php
session_start();
include "./template/header.php";

$title = "Kurikulum | LOGIN";
$error = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurikulum | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-H1QzM0oJ3hKxZy2XK7O7l3xPzY0p6Nq+ZJtq5qQGJSk9L3k9V7F0z4kYpTyWZV2Fg9Q6KfR17p2y8nKQz6pX5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="h-screen flex gap-x-12">

    
<div class="w-2/3 bg-[#091D3C] flex items-center justify-center pr-8">
    <div class="bg-white p-10 rounded-lg shadow-md w-full max-w-xl min-h-[500px] flex flex-col justify-center">

            <div class="flex justify-center mb-4">
            </div>

            <?php if ($error): ?>
                <div class="mb-4 text-red-500 text-sm font-semibold">
                    <?= htmlspecialchars($error)?>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-4 text-left">
                <div>
                    <div class="mb-6 text-center">
                        <h1 class="text-3xl font-bold text-gray-800 text-center">
                            Login Kurikulum PI
                        </h1>
                    </div>
                        <div class="relative mt-1">
                            <input type="email" name="email" placeholder="Email"
                            class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required />
                            <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                                <i class="fa-solid fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div>
                        <div class="relative mt-1">
                            <input type="password" name="password" id="password" placeholder="Password"
                            class="w-full px-4 py-3 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10 mb-6"
                            required />
                            <span onclick="tooglePassword()" class="absolute inset-y-0 right-3 flex items-center cursor-pointer mb-6">
                                <i class="fa-solid fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <button type="submit"
                    class="w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200 mb-6">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="w-1/3 bg-white flex items-center justify-center pl-8">
        <img src="assets/img/logopi.jpeg" alt="Logo Sekolah" class="w-80 h-80">
    </div>

    <script>
        function tooglePassword() {
            const input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>


<?php if (isset($_SESSION["VALIDATION_INPUT"])): ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION["VALIDATION_INPUT"] ?>
    </div>
<?php session_unset();
endif ?>

<?php if (isset($_SESSION["VALIDATION_EMAIL_EXIST"])): ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION["VALIDATION_EMAIL_EXIST"] ?>
    </div>
<?php session_unset();
endif ?>

<?php if (isset($_SESSION["WRONG_PASSWORD"])): ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION["WRONG_PASSWORD"] ?>
    </div>
<?php session_unset();
endif ?>

<?php if (isset($_SESSION["is_login"]) == true) {
    header("Location: http://localhost/kurikulum/index.php");
} ?>

<form action="db/login.php" method="POST"></form>

<?php include "./template/footer.php"; ?>
