<?php include '../view/header.php'; ?>

<main>
    <h1>Tasks</h1>
    <table>
        <tr>
            <th>&nbsp;</th>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($tasks as $task) : ?>
        <tr class="<?php if ($task['checkbox']) {echo 'striketrough';} ?>">
            <td><form action="." method="post">
                <input type="hidden" name="action"
                        value="change_check">
                <input type="hidden" name="task_id"
                        value="<?php echo $task['taskID']; ?>">
                <input type="hidden" name="checkbox"
                        value="<?php echo $task['checkbox']; ?>">
                <input type="checkbox" name="done" 
                        <?php if ($task['checkbox']) { ?> checked <?php ;} ?>
                        onchange="this.form.submit()">
            </form></td>
            <td><?php echo $task['taskName']; ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                        value="delete_task">
                <input type="hidden" name="task_id"
                        value="<?php echo $task['taskID']; ?>">
                <input type="hidden" name="checked"
                        value="<?php echo $task['checkbox']; ?>">
                <input type="image" name="delete" src="../images/erase.png"
                        alt="Delete" border="0" style="height: 1.2em;">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <!--- Add a task--->
    <h1>Add Task</h1>
    <form action="index.php" method="post" id="add_task_form">
            <input type="hidden" name="action" value="add_task">
            
            <label>Name:</label>
            <input type="text" name="name" class="inputfield"/>
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Add task"/>
    </form>
    <br>
</main>

<?php include '../view/footer.php'; ?>