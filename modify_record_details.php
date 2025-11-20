<?php
$target = '';
$title = "Modify Record";
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
                echo "<form action='modify_record.php' method='POST' enctype='multipart/form-data'>";
                echo "<img src='images/".$row['image']."' alt='".$row['image']."'>";
                
                echo "<div class='card-edit-content'>";
                echo "<label for='eventname'>Event Name</label>";

                echo "<input type='text' value=\"".$row['eventname']."\" id='eventname' name='eventname'>";
                echo "<label for='location'>Location</label>";
                echo "<input type='text' value=\"".$row['location']."\" id='location' name='location'>";
                echo "<label for='techskill'>Tech Skill</label>";
                echo "<input type='text' value=\"".$row['techskill']."\" id='techskill' name='techskill'>";
                echo "<label for='description'>Description</label>";
                echo "<textarea id='description' name='description'>".$row['description'].'</textarea>';
                echo "<div class='confirm-panel'>";
                echo "<p class='confirm'>Are you sure you want to modify?</p>";                           
                echo "<input type='hidden' name='id' value=".$row['id'].'>';
                echo "<button class='modify_button' onclick='submit()'>✅️ Confirm</button>";
                echo "<a class='link' href='list_for_changes.php'>❌ Cancel</a>";
                echo "</div></form>";
            ?>
        </div>
    </main>

    <?php
    require_once "includes/footer.inc"
    ?>
</body>
</html>