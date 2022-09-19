<?php include '../view/header.php'; ?>

<main>
    <h1>Add Task</h1>
    <form action="index.php" method="post" id="add_task_form">
            <input type="hidden" name="action" value="add_task">

            <label>Name:</label>
            <input type="text" name="name" class="inputfield"/>
            <br>

            <label>Deadline:</label>
            <input type="date" name="deadline" class="inputfield"/>
            <br>

            <label>Priority Level*:</label>
            <input type="number" min="1" max="5" name="priority" class="inputfield"/>
            <div class="obs">*between 1 (less important) to 5 (more important)</div>
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Add task"/>
            <br>
    </form>
    <p><a href="?action=list_tasks">Back to task list</a></p>
</main>

<?php include '../view/footer.php'; ?>