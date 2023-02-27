<?php
    session_start();
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['type'] !== 'admin') {
        header('location: /items.php');
        }
    } elseif (!isset($_SESSION['user'])) {
        header('location: /items.php');
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
<body>
    <div class="container mx-auto py-5 px-10 bg-slate-50 flex-1">
        <div class="header">
            <ul class="flex justify-between">
                <li>
                    <nav>
                        <ul class="flex">
                            <li class=" mr-5">
                                <a class="hover:text-sky-400 " href="/">Головна</a>
                            </li>
                            <li>
                                <a class="hover:text-sky-400 " href="/items.php">Каталог</a>
                            </li>
                        </ul>
                    </nav>
                </li>
                <li>
                    <ul class="flex">
                        <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md ursor-pointer bg-sky-500 px-3 py-1 rounded mr-5">
                            <a href="/admin-panel">Admin panel</a>
                        </li>
                        <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md ursor-pointer bg-sky-500 px-3 py-1 rounded">
                            <a href="/log-out">exit</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="container mx-auto my-auto py-5 px-10 bg-slate-50">
        <div class="container create-item-container">
            <form action="/items/update?id=<?php echo $item['id']?>" method="post" class="flex flex-col">
                <div class="flex block flex-col w-80">
                    <label for="name">Name of product</label>
                    <input class="py-2 px-3" id="name" type="text" name="name" placeholder="product name" value="<?php echo $item['name']?>">
                </div>
                <div class="flex appearance-none block flex-col w-80">
                    <label for="guest_price">Guest price</label>
                    <input class="py-2 px-3 appearance-none" id="guest_price" type="number" name="guest_price" placeholder="guest price" value="<?php echo $item['guest_price']?>">
                </div>
                <div class="flex block flex-col w-80">
                    <label for="user_price">User price</label>
                    <input class="py-2 px-3" id="user_price" type="number" name="user_price" placeholder="user price" value="<?php echo $item['user_price']?>">
                </div>
                <div class="flex block flex-col w-80">
                    <label for="amount">Amount</label>
                    <input class="py-2 px-3" id="amount" type="number" name="amount" placeholder="amount" value="<?php echo $item['amount']?>">
                </div>
                <div class="flex block flex-col w-80">
                    <label for="description">Description</label>
                    <textarea class="py-2 px-3" id="description" name="description" rows="3"><?php echo $item['description'] ?></textarea>
                </div>
                <button type="submit" class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer bg-sky-500 px-3 py-1 rounded w-40">edit</button>
            </form>
        </div>
    </div>
</body>
</html>