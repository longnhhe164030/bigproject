<form method="POST">
    <label for="title">Tiêu đề:</label>
    <input type="text" name="title" required>
    <label for="status">Trạng thái:</label>
    <select name="status">
        <option value="pending">Chưa hoàn thành</option>
        <option value="completed">Hoàn thành</option>
    </select>
    <label for="content">Nội dung:</label>
    <textarea name="content" required></textarea>
    <button type="submit">Thêm công việc</button>
</form>