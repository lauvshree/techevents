<?php
$target = '';
$title = "Details";
require_once "includes/head.inc"
?>
<body>
    <?php
    require_once "includes/header.inc"
    ?>

    <main>
            <?php
            //The details of the techevent with option to confirm or cancel deletion
                require_once 'includes/config.inc';
                require_once 'includes/DBController.inc';

                $db = new DbController(HOST,USER,PASS,DB);
                $row = $db->retrieveRecord($_GET['id']);
                echo '<div style="display:flex;flex-direction:row;margin:auto;width:60%;padding:15px;">';
                echo '<article class="card-details-content">';
                echo "<div class='top-section'>";
                echo "<img src='images/".$row['image']."' alt='".$row['image']."'>";
                echo "<div class='title-section'>";
                echo '<h2>'.$row['eventname'].'</h2>';
                echo '<h3>'.$row['location'].'</h3>';
                echo '<h4>'.$row['techskill'].'</h4>';
                echo '</div></div>';
                echo '<p>'.$row['description'].'</p>';
                echo "<div class='confirm-panel'>";
                echo "<a class='link' href='index.php'>";                
                echo "</div>";
                echo "<div class='home-link'>&#8617;Home</div>";
                echo '</article></div>';
                echo "</a>";
            ?>
    </main>

    <?php
    require_once "includes/footer.inc"
    ?>
</body>
</html>