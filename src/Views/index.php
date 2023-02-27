<?php
    session_start();
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
                                <a class="hover:text-sky-400 ease-in duration-200 " href="/">Home</a>
                            </li>
                            <li>
                                <a class="hover:text-sky-400 ease-in duration-200" href="/items.php">Store</a>
                            </li>
                        </ul>
                    </nav>
                </li>
                <li>
                    <ul class="flex">
                        <?php
                            $cartCount = isset($_SESSION['cart']) ? count($_SESSION["cart"]) : 0;
                            if(isset($_SESSION['user'])) {
                                if ($_SESSION['user']['type'] === 'admin') {
                                    echo 
                                    '
                                    <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded mr-5">
                                        <a href="/admin-panel" class="px-3 py-1 block" >Admin panel</a>
                                    </li>
                                    <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded">
                                        <a href="/log-out" class="px-3 py-1 block">exit</a>
                                    </li>';
                                } elseif ($_SESSION['user']['type'] === 'user') {
                                    echo 
                                    '
                                    <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded mr-5">
                                        <a href="/log-out" class="px-3 py-1 block">exit</a>
                                    </li>
                                    <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded relative">
                                        <a href="/cart.php" class="px-3 py-1 block">Cart</a>
                                        <div class="flex absolute w-7 bottom-5 left-10 rounded-full bg-red-500 justify-center align-center">
                                            <span id="item-count-cart">' . $cartCount .'<span/>
                                        </div>
                                    </li>
                                    ';
                                }
                            } else {
                                echo 
                                '<li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded mr-5">
                                    <a href="/signIn.php" class="px-3 py-1 block">log in</a>
                                </li>
                                <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded mr-5">
                                    <a href="/signUp.php" class="px-3 py-1 block">sign up</a>
                                </li>
                                <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded mr-5">
                                    <a href="/adminAuth.php" class="px-3 py-1 block">admin authorize</a>
                                </li>
                                <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded relative">
                                        <a href="/cart.php" class="px-3 py-1 block relative z-10">Cart</a>
                                        <div class="flex absolute w-7 bottom-5 left-10 rounded-full bg-red-500 justify-center align-center">
                                            <span id="item-count-cart">' . $cartCount .'<span/>
                                        </div>
                                </li>
                                ';
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <?php
        if (isset($_SESSION['welcome'])) {
            echo
            "
            <div class='container container-hero flex justify-center items-center bg-slate-50 flex-1'>
                <h3 class='text-green-500'>
                    $_SESSION[welcome]
                </h3>
            </div>
            ";
            unset($_SESSION['welcome']);
        }
    ?>
    <div class="container container-hero flex justify-center h-80 items-center bg-slate-50">
        <h1 class='font-bold text-5xl animate-pulse' >Welcome!</h1>
    </div>
    </div>
</body>
</html>