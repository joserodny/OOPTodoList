<?php
include 'includes/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />

    <style>
        .checked {
            color: red;
        }
    </style>

</head>

<body>
    <div class="w-full h-screen bg-gray-100 pt-8">
        <div class="bg-white p-3 max-w-md mx-auto">
            <div class="text-center">
                <h1 class="text-3xl font-bold">ToDo App</h1>
                <form action="includes/createtodolist.php" method="POST">
                    <div class="mt-4 flex">

                        <input class="w-80 border-b-2 border-gray-500 text-black" type="text" placeholder="Enter your task here" name="name" />
                        <button class="ml-2 border-2 border-green-500 p-2 text-green-500 hover:text-white hover:bg-green-500 rounded-lg flex" type="submit" name="submit">
                            <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="12" r="9" />
                                <line x1="9" y1="12" x2="15" y2="12" />
                                <line x1="12" y1="9" x2="12" y2="15" />
                            </svg>
                            <span>Add</span>
                        </button>

                    </div>
                </form>
            </div>
            <div class="mt-8">

                <ul>
                    <?php
                    $todoListView  = new View\TodoListView();
                    $todoList = $todoListView->showTodo();
                    ?>
                    <?php foreach ($todoList as $todo) { ?>
                        <li class="p-2 rounded-lg" x-data="{ isChecked: localStorage.getItem('isChecked_<?php echo $todo['id'] ?>') === 'true' }" x-init="localStorage.setItem('isChecked_<?php echo $todo['id'] ?>', isChecked)">
                            <div class="flex align-middle flex-row justify-between">
                                <div class="p-2">
                                    <input type="checkbox" class="h-6 w-6" id="<?php echo $todo['id'] ?>" value="true" x-model="isChecked" x-on:change="localStorage.setItem('isChecked_<?php echo $todo['id'] ?>', isChecked)" />
                                </div>
                                <div class="p-2">
                                    <p class="text-lg text-black" id="p<?php echo $todo['id'] ?>" x-bind:class="{ 'line-through': isChecked, 'text-gray-400': isChecked }"><?php echo $todo['name'] ?></p>
                                </div>
                                <form action="includes/deletetodolist.php" method="POST">
                                    
                                <button type="submit" name="submit" class="flex text-red-500 border-2 border-red-500 p-2 rounded-lg">
                                    <input type="hidden" name="id" value="<?php echo $todo['id'] ?>" />
                                    <svg class="h-6 w-6 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="15" y1="9" x2="9" y2="15" />
                                        <line x1="9" y1="9" x2="15" y2="15" />
                                    </svg>
                                    <span>Remove</span>
                                </button>
                                </form>
                            </div>
                            <hr class="mt-2" />
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>