<?php
function get_tasks() {
    global $db;
    $query = 'SELECT * FROM to_do_list
              ORDER BY checkbox, taskID';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function change_check($checkbox, $task_id) {
    global $db;
    $query = 'UPDATE to_do_list
            SET checkbox = :checkbox
            WHERE taskID = :task_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':checkbox', $checkbox);
    $statement->bindValue(':task_id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_task($name) {
    global $db;
    $query = 'INSERT INTO to_do_list
            (taskName)
            VALUES
            (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_task($task_id) {
    global $db;
    $query = 'DELETE FROM to_do_list
            WHERE taskID = :task_id'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':task_id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}

?>