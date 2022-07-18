<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Sorter application</title>
    <link rel="stylesheet" type="text/css"
          href=<?php if ($_SERVER['REQUEST_URI'] == '/finalproject/') {?> "finalproject.css" <?php } else { ?> "../finalproject.css" <?php } ?> >
</head>

<!-- the body section -->
<body>
<header>
    <?php if ($_SERVER['REQUEST_URI'] == '/finalproject/') { ?> 
        <h1 class="title"><a href="./"> 
    <?php } else { ?> 
        <h1><a href="../"> 
    <?php } ?>
       Task Sorter application
    </a></h1>
    <div class="<?php if ($_SERVER['REQUEST_URI'] == '/finalproject/') { echo 'hideMenu'; } else { echo 'dropdown'; } ?>" >
        <span><img src="../images/menu.png" alt="Menu"></span>
        <div class="dropdown-content">
            <p>
                <a href="../task_sorter">Task sorter</a>
            </p>
            <p>
                <a href="../to_do_list">To-do list</a>
            </p>
        </div>
        
    </div>
    <div class="<?php if ($_SERVER['REQUEST_URI'] == '/finalproject/') { echo 'hideMenu'; } else { echo 'pc_menu'; } ?>" >
        <p><a href="../task_sorter">Task sorter</a></p>
        <p><a href="../to_do_list">To-do list</a></p>
    </div>
    
</header>


