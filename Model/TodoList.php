<?php

    namespace Model;
    
    use Database\Database;

    class TodoList extends Database
    {
        protected function createTodoList($name)
        {
            $sql = 'INSERT INTO todo_list (name, status_id) VALUES (:name, 1);';
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':name', $name);

            if(!$stmt->execute()){
                $stmt = null;
                header('Location: ../index.php?errror=failed');
                exit();
            }
            $stmt = null;
        }

        protected function getList()
        {
            $sql = 'SELECT * FROM todo_list';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll();
            return $results;
        }

        protected function deleteList($id)
        {
            $sql = 'DELETE FROM todo_list WHERE id = :id ';
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();  
        }


    }