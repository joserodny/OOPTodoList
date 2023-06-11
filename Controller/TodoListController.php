<?php
    namespace Controller;
    
    use Model\TodoList;
    
    class TodoListController extends TodoList
    {
        private $name;

        public function __construct($name)
        {
            $this->name = $name;
        }

        public function store()
        {
            $this->createTodoList($this->name);
        }

        public function delete($id)
        {
            $this->deleteList($id);
        }
    }