<?php
$target = '';
$title = "Delete Record";
require_once "includes/head.inc"
?>

<body>
    <?php
    require_once "includes/header.inc"
    ?>

    <main>
        <div class="event-delete-grid">
            <?php
            //The details of the techevent with option to confirm or cancel deletion
                require_once 'includes/config.inc';
                require_once 'includes/DBController.inc';

                $db = new DbController(HOST,USER,PASS,DB);
                $row = $db->retrieveRecord($_GET['id']);
                echo '<div class="card-details-content">';
                echo "<img src='images/".$row['image']."' alt='".$row['image']."'>";
                echo "<div class='card-content'>";
                echo '<h3>'.$row['eventname'].'</h3>';
                echo '<h4>'.$row['location'].'</h4>';
                echo '<h5>'.$row['techskill'].'</h5>';
                echo '<p>'.$row['description'].'</p>';
                echo '</div>';

                echo "<div class='confirm-panel'>";
                echo "<p class='confirm'>Are you sure you want to delete?</p>";                           
                echo "<a class='link' href='delete_record.php?id=".$row['id']."'>✅️ Confirm</a>";
                echo "<a class='link' href='list_for_changes.php'>❌ Cancel</a>";
                echo "</div></div>";
            ?>
            </div>
    </main>

    <?php
    require_once "includes/footer.inc"
    ?>
</body>
</html>


                ?>
    </main>

    <?php
    require_once "includes/footer.inc"
    ?>
</body>
</html>
