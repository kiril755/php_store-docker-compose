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
                                <a class="hover:text-sky-400 duration-200" href="/">Home</a>
                            </li>
                            <li>
                                <a class="hover:text-sky-400 duration-200" href="/items.php">Store</a>
                            </li>
                        </ul>
                    </nav>
                </li>
                <li>
                    <ul class="flex">
                        <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md ursor-pointer bg-sky-500 px-3 py-1 ease-in duration-200 rounded mr-5">
                            <a href="/admin-panel">Admin panel</a>
                        </li>
                        <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md ursor-pointer bg-sky-500 px-3 py-1 ease-in duration-200 rounded">
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
                <div class="flex block flex-col w-80 mb-5">
                    <label for="name" class="mb-3">Name of product</label>
                    <input class="py-2 px-3" id="name" type="text" name="name" placeholder="product name" value="<?php echo $item['name']?>">
                </div>
                <div class="flex appearance-none block flex-col w-80 mb-5">
                    <label for="guest_price" class="mb-3">Guest price</label>
                    <input class="py-2 px-3 appearance-none" id="guest_price" type="number" name="guest_price" placeholder="guest price" value="<?php echo $item['guest_price']?>">
                </div>
                <div class="flex block flex-col w-80 mb-5">
                    <label for="user_price" class="mb-3">User price</label>
                    <input class="py-2 px-3" id="user_price" type="number" name="user_price" placeholder="user price" value="<?php echo $item['user_price']?>">
                </div>
                <div class="flex block flex-col w-80 mb-5">
                    <label for="amount" class="mb-3">Amount</label>
                    <input class="py-2 px-3" id="amount" type="number" name="amount" placeholder="amount" value="<?php echo $item['amount']?>">
                </div>
                <div class="flex block flex-col w-80 mb-5">
                    <label for="description" class="mb-3">Description</label>
                    <textarea class="py-2 px-3" id="description" name="description" rows="3"><?php echo $item['description'] ?></textarea>
                </div>
                <button type="submit" class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer bg-sky-500 px-3 py-1 rounded w-40">edit</button>
            </form>
        </div>
    </div>
</body>
</html>