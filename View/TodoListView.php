<?php
    namespace View;

    use Model\TodoList;

    class TodoListView extends TodoList
    {
        public function showTodo()
        {
            $results = $this->getList();
            return $results;
        }
    }