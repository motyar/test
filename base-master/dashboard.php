<?php 
require_once('include/db.php');
require_once('config.php');
require_once('top.php');
include 'auth.php';
$user_id = $_SESSION['enteredId'];
$display_button_name =  'Add';
$entryvalue = '';
$message = '';
// code for delete
if (isset($del)) {
    $id=intval($delid);
    $db->Q("DELETE FROM `students` WHERE `id` = '$id'");
    header('location:dashboard.php');
}
// code for edit or update
elseif (isset($edit)) {
    $display_button_name =  'update';
    $id = intval($edit);
    $rows = $db->Q("SELECT * FROM `students` WHERE `id`='$id'");
    foreach ($rows as $row) {
        $entryvalue = $row['entry'];
    }
    if (isset($update)) {
        $rows = $db->Q("SELECT * FROM `students` WHERE `entry`='$entry' AND `user_id`='$user_id'");
        if (! $rows) {
            $db->Q("UPDATE `students` SET `entry`='$entry' WHERE `id`='$id'");
            header('location:dashboard.php');
        } else {
            $message = 'This entry already exits';
        }
    }
}
// code for add or insert
elseif (isset($Add)) {
    $rows = $db->Q("SELECT * FROM `students` WHERE `entry`='$entry' AND `user_id`='$user_id'");
    if (! $rows) {
        $db->Q("INSERT INTO `students`(`entry`,`user_id`) VALUES ('$entry','$user_id')");
        $message = 'Added';
    } else {
        $message = 'This entry already exits';
    }
}

?>
<!-- liking stylsheet -->
<link rel="stylesheet" href="include/css/style.css">

<h1>
    Welcome <?php echo $_SESSION['enteredUser'] ?>
</h1>
<!-- user will add new entires here -->
<h3>Add new entries</h3>
<form action="" method="post">
    <label for="">Entry</label>
	<input type="text" name="entry" value="<?php echo $entryvalue; ?>" required>
	<input type="submit" name="<?php echo $display_button_name; ?>" value="<?php echo $display_button_name?>">
</form>
<?php echo $message; ?>
<!-- showing output from entry talble here -->
<table>
    	<tr>
    		<th>Entry</th>
    		<th>Edit</th>
    		<th>Delete</th>
    	</tr>
<?php
   $rows = $db->Q("SELECT * FROM `students` WHERE `user_id`='$user_id'");
   foreach ($rows as $row) {
       $s_entry = ($row['entry']); ?>

    	<tr>
    	    <td><?php echo $s_entry; ?></td>
    	    <td>
                <a href="?edit=<?php echo $row['id'] ?>">Edit</a>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $row['id'] ?>" name="delid">
                    <input onclick="return confirm('Are you sure?')" type="submit" value="Delete" name="del">
                </form>
            </td>
    	</tr>

        <?php

   }
?>
</table>

<br><br>
<a href="logout.php"><button>Logout</button></a>
