<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include_once '../Database/Database.php';
        include_once '../Model/TodoList.php';
        include_once '../Controller/TodoListController.php';

        $id = $_POST['id'];

        $deleteTodo = new Controller\TodoListController($id);
        $deleteTodo->delete($id);

        header('Location: ../index.php?error=success');
    } 