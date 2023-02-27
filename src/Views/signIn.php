<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('location: /');
    }
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
<body class="min-h-screen">
    <div class="container mx-auto min-h-screen bg-slate-50">
    <div class="container border-b py-5 px-10 bg-slate-50 flex-1">
        <div class="header">
            <ul class="flex justify-between items-center">
                <li>
                    <nav>
                        <ul class="flex">
                            <li class=" mr-5">
                                <a class="hover:text-sky-400 ease-in duration-200" href="/">Home</a>
                            </li>
                            <li>
                                <a class="hover:text-sky-400 ease-in duration-200" href="/items.php">Store</a>
                            </li>
                        </ul>
                    </nav>
                </li>
                <li>
                    <ul class="flex">
                        <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded mr-5">
                            <a class="px-3 py-1 block" href="/signIn.php">log in</a>
                        </li>
                        <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded mr-5">
                            <a class="px-3 py-1 block" href="/signUp.php">sign up</a>
                        </li>
                        <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded mr-5">
                            <a href="/adminAuth.php" class="px-3 py-1 block">admin authorize</a>
                        </li>
                        <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded relative">
                            <a href="/cart.php" class="px-3 py-1 block relative z-10">Cart</a>
                            <div class="flex absolute w-7 bottom-5 left-10 rounded-full bg-red-500 justify-center align-center">
                                <span id="item-count-cart"> <?php echo isset($_SESSION['cart']) ? count($_SESSION["cart"]) : 0 ?> <span/>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="container mx-auto py-5 px-10 bg-slate-50 flex justify-center signin-container">
        <div class="signin">
            <form method="post" action="/sign-in" class="flex flex-col">
                <?php
                    if (isset($_POST['error'])) {
                        echo '<div class="text-red-500">' . $_POST['error'] . '</div>';
                    }
                ?>
                <div class="flex block flex-col w-80 mb-5">
                    <label for="email" class="mb-3">Email</label>
                    <input required class="py-2 px-3" id="email" type="email" name="email" placeholder="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '';?>">
                </div>
                <div class="flex block flex-col w-80 mb-5">
                    <label for="password" class="mb-3">Password</label>
                    <input required pattern=".{8,}" class="py-2 px-3" type="password" name="password" placeholder="password(min 8)">
                </div>
                <button type="submit" class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer bg-sky-500 px-3 py-1 rounded w-40 m-auto">sign in</button>
            </form>
        </div>
    </div>
    </div>
</body>
</html>