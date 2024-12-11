
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse; 
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd; 
        }
        th {
            background-color: #f4f4f4; 
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1; 
        }
    </style>
</head>
<div>  

    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Content</th>
        </tr>
        <?php foreach($tasks as $task):?>
        <tr>
            <td><?=$task['taskID'];?></td>
            <td><?=$task['title'];?></td>
            <td><?=$task['status'];?></td>
            <td><?=$task['content'];?></td>
            <td>
            <form action="controller/delete.php" method="GET">
            <input type="hidden" name="taskID" value="<?=$task['taskID'];?>">
                 <input type="submit" value="Delete">
            </form>
            </td>
            <td>
                <form action="index.php" method="POST">
                    <input type="hidden" name="action" value="edit_task">
                    <input type="hidden" name="taskID" value="<?=$task['taskID'];?>">
                    <input type="submit" value="Edit">
                </form>
            </td>
        </tr>
        
        <?php endforeach;?>
    </table>
</div>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="show_add_form">
    <input type="hidden" name="userID" value="<?=$userID;?>">
    <input type="submit" value="Add task">
</form>
