<?php
require('../model/database.php');
require('../model/to_do_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'to_do';
    }
}

if ($action == 'to_do') {
    $tasks = get_tasks();
    include('to_do.php');
} else if ($action == 'change_check') {
    $checkbox = filter_input(INPUT_POST, 'checkbox');
    $task_id = filter_input(INPUT_POST, 'task_id', 
            FILTER_VALIDATE_INT);
    if ($checkbox == NULL || $task_id == NULL || $task_id == FALSE) {
        $error = "Error with checkbox";
        include('../errors/error.php');
    } else if ($checkbox == 0) { 
        change_check('1', $task_id);
        header("Location: .");
    } else if ($checkbox == 1) { 
        change_check('0', $task_id);
        header("Location: .");
    }
} else if ($action == 'delete_task') {
    $task_id = filter_input(INPUT_POST, 'task_id', 
            FILTER_VALIDATE_INT);
    $checked = filter_input(INPUT_POST, 'checked', 
            FILTER_VALIDATE_INT);
    if ($task_id == NULL || $task_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else if (!$checked) {
        $error = "You need to check the task before erasing it.";
        include('../errors/error.php');
    } else { 
        delete_task($task_id);
        header("Location: .");
    }
} else if ($action == 'add_task') {
    $name = filter_input(INPUT_POST, 'name');
    if ($name == NULL) {
        $error = "Invalid task name. Try again.";
        include('../errors/error.php');
    } else { 
        add_task($name);
        header("Location: .");
    }
} 

?>