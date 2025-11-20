<?php
$target = 'list_for_changes.php';
$title = "Modify Record";
require_once "includes/head.inc"
?>

<body>
    <?php
    require_once "includes/header.inc"
    ?>

    <main>
        <?php
        //All the details from the table techevent with option to delete or modify
            require_once 'includes/config.inc';
            require_once 'includes/DBController.inc';

            $db = new DbController(HOST,USER,PASS,DB);
            $id = $_POST['id'];
            $eventname = $_POST['eventname'];
            $location = $_POST['location'];
            $techskill = $_POST['techskill'];

            $description = $_POST['description'];
            
            if($db->updateRecord($id, $eventname, $location, $techskill, $description)) {
                echo "<p>The record has been modified</p>";
            } else {
                echo "<p>The record could not be modified</p>";
            }            
        ?>
    </main>

    <?php
    require_once "includes/footer.inc"
    ?>
</body>
</html>