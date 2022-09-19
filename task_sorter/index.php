<?php
require('../model/database.php');
require('../model/task_sort_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_tasks';
    }
}

if ($action == 'list_tasks') {
    $tasks = get_tasks();
    include('list_tasks.php');
} else if ($action == 'change_check') {
    $checkbox = filter_input(INPUT_POST, 'checkbox');
    $task_id = filter_input(INPUT_POST, 'task_id', 
            FILTER_VALIDATE_INT);
    $sort_option = filter_input(INPUT_POST, 'sort_option');
    if ($checkbox == NULL || $task_id == NULL || $task_id == FALSE) {
        $error = "Error with checkbox";
        include('../errors/error.php');
    } else {
        if ($checkbox == 0) { 
            change_check('1', $task_id); 
            header("Location: .?$sort_option");
        } 
        else if ($checkbox == 1) { 
            change_check('0', $task_id);
            header("Location: .?$sort_option"); 
        }
    }
} else if ($action == 'delete_task') {
    $task_id = filter_input(INPUT_POST, 'task_id', 
            FILTER_VALIDATE_INT);
    $checked = filter_input(INPUT_POST, 'checked', 
            FILTER_VALIDATE_INT);
    $sort_option = filter_input(INPUT_POST, 'sort_option');
    if ($task_id == NULL || $task_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else if (!$checked) {
        $error = "You need to check the task before erasing it.";
        include('../errors/error.php');
    }else { 
        delete_task($task_id);
        header("Location: .?$sort_option");
    }
} else if ($action == 'show_add_task_form') {
    $task = get_tasks();
    include('add_task.php');    
} else if ($action == 'add_task') {
    $name = filter_input(INPUT_POST, 'name');
    $deadline = filter_input(INPUT_POST, 'deadline');
    $priority = filter_input(INPUT_POST, 'priority');
    if ($name == NULL || $deadline == NULL) {
        $error = "Invalid task data. Check all fields and try again.";
        include('../errors/error.php');
    } elseif ($priority < 1 || $priority > 5 ) {
        $error = "Invalid task proority. The priority level should be a number between 1 to 5.";
        include('../errors/error.php');
    } else { 
        add_task($name, $deadline, $priority);
        header("Location: .?list_tasks");
    }
} else if ($action == 'sort_by_all') {
    $tasks = sort_by_all();
    include('list_tasks.php');
} else if ($action == 'sort_by_name') {
    $tasks = sort_by_name();
    include('list_tasks.php');  
} else if ($action == 'sort_by_date') {
    $tasks = sort_by_date();
    include('list_tasks.php');
} else if ($action == 'sort_by_priority') {
    $tasks = sort_by_priority();
    include('list_tasks.php');
}

?>