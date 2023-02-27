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
                        <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded mr-5">
                            <a href="/admin-panel" class="px-3 py-1 block">Admin panel</a>
                        </li>
                        <li class="text-slate-100 hover:bg-sky-700 hover:shadow-md cursor-pointer ease-in duration-200 bg-sky-500 rounded">
                            <a href="/log-out" class="px-3 py-1 block">exit</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="container mx-auto my-auto py-5 px-10 bg-slate-50">
        <div class="panel-users bg-slate-100 py-2 px-3 mb-5">
            <?php
                if(is_string($users)) {
                    echo "<p class='text-red-500'>$users</p>";
                } else {
                    ?>
                        <h2 class="mb-5">Users:</h2>
                        <ul>
                            <?php
                                foreach ($users as $user) {
                                    $identCheckForBtn = $_SESSION['user']['id'] == $user['id'] 
                                    ? "<a class='text-slate-100 hover:shadow-md bg-gray-500 px-3 py-1 rounded'>you</a>" 
                                    : "<a class='text-slate-100 hover:bg-red-700 hover:shadow-md cursor-pointer bg-red-500 px-3 py-1 rounded' href='/admin-panel/user/delete?id=$user[id]'>delete</a>";
                                    echo
                                    "
                                        <li id='$user[id]' class='flex flex-wrap bg-slate-200 py-2 px-3 mb-3 items-center w-max'>
                                            <h3 class='mr-3'>Name: $user[name]</h3>
                                            <p class='mr-3'>Email: $user[email]</p>
                                            <p class='mr-3'>Type: $user[type]</p>
                                            $identCheckForBtn
                                        </li>
                                    ";
                                }
                            ?>
                        </ul>
                    <?php
                }
            ?>
        </div>
        <div class="container container-users-orders bg-slate-100 py-2 px-3 mb-5">
            <?php
                if(is_string($usersOrders)) {
                    echo "<p class='text-red-500'>$usersOrders</p>";
                } else {
                    ?>
                        <h2 class="mb-5">User orders:</h2>
                        <ul>
                            <?php
                                foreach ($usersOrders as $usersOrder) {
                                    echo
                                    "
                                        <li class='flex flex-wrap bg-slate-200 py-2 px-3 mb-3 items-center w-max'>
                                            <h3 class='mr-3'>Name: $usersOrder[name]</h3>
                                            <p class='mr-3'>Email: $usersOrder[email]</p>
                                            <p class='mr-3'>item: $usersOrder[item]</p>
                                            <p class='mr-3'>Delivery: $usersOrder[delivery]</p>
                                            <p>Address: $usersOrder[region], $usersOrder[city], $usersOrder[address], $usersOrder[house_number]</p>
                                        </li>
                                    ";
                                }
                            ?>
                        </ul>
                    <?php
                }
            ?>
        </div>
        <div class="container container-guest-orders bg-slate-100 py-2 px-3">
            <?php
                if(is_string($guestOrders)) {
                    echo "<p class='text-red-500'>$guestOrders</p>";
                } else {
                    ?>
                        <h2 class="mb-5">User orders:</h2>
                        <ul>
                            <?php
                                foreach ($guestOrders as $guestOrder) {
                                    echo
                                    "
                                        <li class='flex flex-wrap bg-slate-200 py-2 px-3 mb-3 items-center w-max'>
                                            <h3 class='mr-3'>Name: $guestOrder[name]</h3>
                                            <p class='mr-3'>Email: $guestOrder[email]</p>
                                            <p class='mr-3'>item: $guestOrder[item]</p>
                                            <p class='mr-3'>Delivery: $guestOrder[delivery]</p>
                                            <p>Address: $guestOrder[region], $guestOrder[city], $guestOrder[address], $guestOrder[house_number]</p>
                                        </li>
                                    ";
                                }
                            ?>
                        </ul>
                    <?php
                }
            ?>
        </div>
    </div>
    </div>
</body>
</html>