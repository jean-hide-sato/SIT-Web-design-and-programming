<?php include '../view/header.php'; ?>

<main>
    <h1>Tasks</h1>
    <table>
        <tr>
            <th>&nbsp;</th>
            <th>Name</th>
            <th>Deadline</th>
            <th>Priority Level</th>
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
                <input type="hidden" name="sort_option"
                        value="<?php echo $_SERVER['QUERY_STRING']; ?>">
                <input type="checkbox" name="done" 
                        <?php if ($task['checkbox']) { ?> checked <?php ;} ?>
                        onchange="this.form.submit()">
            </form></td>
            <td><?php echo $task['taskName']; ?></td>
            <td><?php echo date('Y/m/d', strtotime($task['taskDate'])); ?></td>
            <td class="right"><?php echo $task['taskPriority']; ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                        value="delete_task">
                <input type="hidden" name="task_id"
                        value="<?php echo $task['taskID']; ?>">
                <input type="hidden" name="checked"
                        value="<?php echo $task['checkbox']; ?>">
                <input type="hidden" name="sort_option"
                        value="<?php echo $_SERVER['QUERY_STRING']; ?>">
                <input type="image" name="delete" src="../images/erase.png"
                        alt="Delete" border="0">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>Sort by:</p>
    <div class="sort_option">
        <form action="." method="get">
            <input type="hidden" name="action" value="sort_by_all">
            <input type="submit" value="All Parameters">
        </form>
        <form action="." method="get">
            <input type="hidden" name="action" value="sort_by_name">
            <input type="submit" value="Name">
        </form>
        <form action="." method="get">
            <input type="hidden" name="action" value="sort_by_date">
            <input type="submit" value="Deadline">
        </form>
        <form action="." method="get">
            <input type="hidden" name="action" value="sort_by_priority">
            <input type="submit" value="Priority">
        </form>
    </div>
    <p><a href="?action=show_add_task_form">Add Task</a></p>
</main>

<?php include '../view/footer.php'; ?>