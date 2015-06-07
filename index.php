<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test tree</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>

<ul>
<?php
include ("connect_db.php");

$result = mysql_query('SELECT * FROM `tree` WHERE `parent_id` = 0');
while ($row = mysql_fetch_assoc($result)) {
    if($row['has_child']){ ?>

        <li id="<?php echo $row['id'] ?>" class="has-child not-received">
            <p><?php echo $row['name'] ?></p>
            <ul></ul>
        </li>

    <?php } else {  ?>

        <li id="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></li>

    <?php }} ?>
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>