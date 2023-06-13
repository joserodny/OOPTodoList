<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    include_once '../Database/Database.php';
    include_once '../Model/TodoList.php';
    include_once '../Controller/TodoListController.php';

    $name = $_POST['name'];

    $createTodo = new Controller\TodoListController($name);
    $createTodo->store();

    header('Location: ../index.php?status=success');
}