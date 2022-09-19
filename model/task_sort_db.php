<?php
function get_tasks() {
    global $db;
    $query = 'SELECT * FROM task_to_sort
              ORDER BY checkbox, taskID';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function change_check($checkbox, $task_id) {
    global $db;
    $query = 'UPDATE task_to_sort
            SET checkbox = :checkbox
            WHERE taskID = :task_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':checkbox', $checkbox);
    $statement->bindValue(':task_id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_task($name, $deadline, $priority) {
    global $db;
    $query = 'INSERT INTO task_to_sort
            (taskName, taskDate, taskPriority)
            VALUES
            (:name, :deadline, :priority)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':deadline', $deadline);
    $statement->bindValue(':priority', $priority);
    $statement->execute();
    $statement->closeCursor();
}

function delete_task($task_id) {
    global $db;
    $query = 'DELETE FROM task_to_sort
            WHERE taskID = :task_id'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':task_id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}

function sort_by_all() {
    global $db;
    $query1 = 'UPDATE task_to_sort
                SET calculatedPriority = (FLOOR(LN(DATEDIFF(taskDate, CURRENT_DATE()))+1)*10 + 5 - taskPriority)
                WHERE taskDate > CURRENT_DATE()';
    $statement1 = $db->prepare($query1);
    $statement1->execute();
    $statement1->closeCursor();
    $query2 = 'UPDATE task_to_sort
                SET calculatedPriority = 0
                WHERE taskDate <= CURRENT_DATE()';
    $statement2 = $db->prepare($query2);
    $statement2->execute();
    $statement2->closeCursor();
    $query3 = 'SELECT * FROM task_to_sort
                ORDER BY checkbox, calculatedPriority, taskDate, taskPriority';
    $statement3 = $db->prepare($query3);
    $statement3->execute();
    $products = $statement3->fetchAll();
    $statement3->closeCursor();
    return $products;
}

function sort_by_name() {
    global $db;
    $query = 'SELECT * FROM task_to_sort
              ORDER BY checkbox, taskName';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function sort_by_date() {
    global $db;
    $query = 'SELECT * FROM task_to_sort
              ORDER BY checkbox, taskDate, taskPriority DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function sort_by_priority() {
    global $db;
    $query = 'SELECT * FROM task_to_sort
              ORDER BY checkbox, taskPriority DESC, taskDate';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}


?>