<?php
$target = '';
$title = "Home";
require_once "includes/head.inc"
?>
<body>
    <?php
    require_once "includes/header.inc"
    ?>

    <main>
            <h2 id="upcoming">Upcoming Highlights</h2>
            <div class="events-grid">

                <?php
                    require_once 'includes/config.inc';
                    require_once 'includes/DBController.inc';
                    $db = new DbController(HOST,USER,PASS,DB);

                    if($db != null) {
                        $rows = $db->retrieveRecords();

                        if (!$rows) {
                          echo "<section><p>No events yet!</p></section>";
                        } else {                          
                          foreach ($rows as $row) {
                            echo "<a class='no-link-decor' href='details.php?id=".$row['id']."'>";
                            echo '<article class="event-card">';                        
                            echo "<img src='./images/".$row['image']."' alt='".$row['image']."'>";
                            echo "<div class='card-content'>";
                        	echo '<h3>'.$row['eventname'].'</h3>';
                        	echo '<h4>'.$row['location'].'</h4>';
                            echo '<h5>'.$row['techskill'].'</h5>';
                            echo '</article>';
                            echo "</a>";
                          }
                        }
                    } else {
                        echo "No data to show!";
                    }
                ?>
            </div>
    </main>
    <?php
    require_once "includes/footer.inc"
    ?>

</body>
</html>
