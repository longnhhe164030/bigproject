<form action="index.php?action=edit_task" method="POST">
    <input type="hidden" name="taskID" value="<?=$task['taskID'];?>">
    <label for="title">Tiêu đề:</label>
    <input type="text" name="title" value="<?=$task['title'];?>" required><br>

    <label for="status">Trạng thái:</label>
    <select name="status">
        <option value="pending" <?=($task['status'] == 'pending' ? 'selected' : '')?>>Chưa hoàn thành</option>
        <option value="completed" <?=($task['status'] == 'completed' ? 'selected' : '')?>>Hoàn thành</option>
    </select><br>

    <label for="content">Nội dung:</label>
    <textarea name="content" required><?=$task['content'];?></textarea><br>

    <input type="submit" value="Cập nhật công việc">
</form>
