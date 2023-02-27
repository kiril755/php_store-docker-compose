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
                                <a class="hover:text-sky-400 ease-in duration-200 block" href="/">Home</a>
                            </li>
                            <li>
                                <a class="hover:text-sky-400 ease-in duration-200 block" href="/items.php">Store</a>
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
                                        <a href="/admin-panel" class="px-3 py-1 block">Admin panel</a>
                                    </li>
                                    <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded">
                                        <a href="/log-out" class="px-3 py-1 block">exit</a>
                                    </li>';
                                } elseif ($_SESSION['user']['type']=== 'user') {
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
    <div class="container py-5 px-10 bg-slate-50">
        <?php
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['type'] === 'admin') {
                    ?>
                        <div class="container mb-7">
                            <ul class="flex">
                                <li >
                                    <a class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer bg-sky-500 px-3 py-1 rounded" href="/items.php/create">add item</a>
                                </li>
                            </ul>
                        </div>
                    <?php
                }
            }
        ?>
        <div class="container items-container">
            <ul class="grid grid-cols-4 gap-4">
                <?php
                    if (isset($empty)) {
                        ?>
                            <li>
                                <h2>
                                    <?php echo $empty;?>
                                </h2>
                            </li>
                        <?php
                    } elseif (isset($data)){
                        foreach ($items as $item) {
                            $guest_price = array_key_exists('guest_price', $item) ? " (guest price: $item[guest_price])" : '';
                            echo
                            "
                                <li id='$item[id]' class='bg-slate-100 py-2 px-3 mb-5'>
                                    <h3 class='mb-2'>name: $item[name]</h3>
                                    <p class='mb-2'>price: $item[price]" . $guest_price . "</p>
                                    <p class='mb-2'>amount: $item[amount]</p>
                                    <p class='mb-5'>description: $item[description]</p>
                            ";
                            if (isset($_SESSION['user']) && $_SESSION['user']['type'] == 'admin') {
                                echo
                                "
                                    <a class='text-slate-100 hover:bg-green-700 hover:shadow-md cursor-pointer bg-green-500 px-3 py-1 rounded mr-5' href='/items/edit?id=$item[id]'>edit</a>
                                    <a class='text-slate-100 hover:bg-red-700 hover:shadow-md cursor-pointer bg-red-500 px-3 py-1 rounded' href='/items/delete?id=$item[id]'>delete</a>
                                ";
                            } else {
                                if ($item['amount'] <= 0) {
                                    echo "<button data-item-id='$item[id]' disabled class='add-to-cart-btn text-slate-100 bg-red-500 px-3 py-1 rounded'>sold</button>";
                                } elseif (array_key_exists($item['id'], $_SESSION['cart'])) {
                                    echo "<button data-item-id='$item[id]' disabled class='add-to-cart-btn text-slate-100 bg-orange-500 px-3 py-1 rounded'>added</button>";
                                } else {
                                    echo "<button data-item-id='$item[id]' class='add-to-cart-btn text-slate-100 hover:bg-green-700 hover:shadow-md cursor-pointer bg-green-500 px-3 py-1 rounded'>add to cart</button>";
                                }
                            }
                            echo
                            "</li>";
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
    </div>
    <script src="../js/cart.js"></script>
</body>
</html>