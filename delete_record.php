<?php
$target = 'list_for_changes.php';
$title = "Delete Record";
require_once "includes/head.inc"
?>

<body>
    <?php
    require_once "includes/header.inc"
    ?>

    <main>
        <section>
                <?php
                //All the details from the table techevent with option to delete or modify
                    require_once 'includes/config.inc';
                    require_once 'includes/DBController.inc';

                    $db = new DbController(HOST,USER,PASS,DB);
                    
                    if($db->deleteRecord($_GET['id'])) {
                        echo "<h3>The record has been deleted</h3>";
                    } else {
                        echo "<h3>The record could not be deleted</h3>";
                    }
                    
                ?>
                </section>
    </main>

    <?php
    require_once "includes/footer.inc"
    ?>
</body>
</html>