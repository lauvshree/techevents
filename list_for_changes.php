<?php
$target = '';
$title = "Modify Details";
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
            $rows = $db->retrieveRecords();

            if (!$rows) {
              echo "<p>No events yet!</p>";
            } else {    

                echo '<table>';    
                echo '<tr>';
                echo '<th>S.No</th>';
                echo '<th>Image</th>';
                echo '<th>Title</th>';
                echo '<th>Location</th>';
                echo '<th colspan="2">Operations</th>';
                echo '</tr>';
                
                for ($i = 0; $i<count($rows); $i++) {
                    echo '<tr>';
                    echo '<td><p>'.($i+1).'</p></td>';
                    echo "<td><img class='thumb' src='images/".$rows[$i]['image']."' alt='".$rows[$i]['image']."'></td>";
                	echo '<td><p>'.$rows[$i]['eventname'].'</p></td>';
                	echo '<td><p>'.$rows[$i]['location'].'</p></td>';
                	echo '<td><a class="no-link-decor" href="modify_record_details.php?id='.$rows[$i]['id'].'"><p class="modify">Modify</p></a></td>';
                	echo '<td><a class="no-link-decor" href="delete_record_details.php?id='.$rows[$i]['id'].'"><p class="delete">Delete</p></a></td>';
                    echo '</tr>';
                }
                echo '</table>';                                          

            }
        ?>
    </main>

    <?php
    require_once "includes/footer.inc"
    ?>
</body>
</html>
