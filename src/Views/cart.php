
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
    <div class="container mx-auto my-auto py-5 px-10 bg-slate-50">
        <h2 class='mb-10'>Cart</h2>
        <?php
            if (isset($empty)) {
                echo "<p>$empty</p>";
            }
        ?>
        <?php 
            if (count($items)) {
                ?>
                <ul class="cart-items-list flex flex-col">
                    <?php
                        foreach ($items as $item) {
                            echo 
                            "
                            <li id='$item[id]' class='flex flex-wrap items-center bg-slate-100 py-2 px-3 mb-5 w-max'>
                                <h3 class='mr-5'>$item[name]</h3>
                                <h3 class='mr-5'>name: $item[name]</h3>
                                <p class='mr-5'>price: $item[price]</p>
                                <button data-item-id='$item[id]' class='delete-from-cart-btn text-slate-100 hover:bg-red-700 hover:shadow-md cursor-pointer bg-red-500 px-3 rounded' >delete</button>
                            </li>
                            ";
                        }   
                    ?>
                </ul>
                <div class="container container-order">
                    <form method="post" action="/order" class="flex flex-col">
                        <?php
                            foreach ($items as $item) {
                                echo "<input type='hidden' name='item_id[]' value='$item[id]'>";
                            }
                        ?>
                        <?php
                            if (!isset($_SESSION['user'])) {
                                echo
                                "
                                <div class='flex block flex-col w-80 mb-5'>
                                    <label for='guest_name' class='mb-3'>Name</label>
                                    <input required class='py-2 px-3' type='text' name='guest_name' placeholder='name'>
                                </div>
                                <div class='flex block flex-col w-80 mb-5'>
                                    <label for='guest_email' class='mb-3'>Email</label>
                                    <input required class='py-2 px-3' id='guest_email' type='email' name='guest_email' placeholder='email'>
                                </div>
                                ";
                            }
                        ?>
                        <div class="flex block flex-col w-80 mb-5">
                            <label for="delivery" class="mb-3">Delivery</label>
                            <select name="delivery" class="py-2 px-3" id="delivery">
                                <option>Nova Poshta</option>
                                <option>Ukr Poshta</option>
                            </select>
                        </div>
                        <div class="flex block flex-col w-80 mb-5">
                            <label for="region" class="mb-3">Region</label>
                            <input required class="py-2 px-3" type="text" name="region" placeholder="region">
                        </div>
                        <div class="flex block flex-col w-80 mb-5">
                            <label for="city" class="mb-3">City</label>
                            <input required class="py-2 px-3" type="text" name="city" placeholder="city">
                        </div>
                        <div class="flex block flex-col w-80 mb-5">
                            <label for="address" class="mb-3">Address</label>
                            <input required class="py-2 px-3" type="text" name="address" placeholder="address">
                        </div>
                        <div class="flex block flex-col w-80 mb-5">
                            <label for="house_number" class="mb-3">House number</label>
                            <input required class="py-2 px-3" type="number" name="house_number" placeholder="house number">
                        </div>
                        <button type="submit" class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer bg-sky-500 px-3 py-1 rounded w-40">Order</button>
                    </form>
                </div>
                <?php
            }
        ?>
    </div>
    </div>
    <script src="../js/cart.js"></script>
</body>
</html>