<?php
$target = 'index.php';
$title = "Insert Event";
require_once "includes/head.inc"
?>

<body>
    <?php
    require_once "includes/header.inc"
    ?>

    <main>
        <?php
        require_once 'includes/config.inc';
        require_once 'includes/DBController.inc';

        $dbctrl = new DBController(HOST,USER,PASS,DB);

        $image = $_FILES['tech_event_image']['name'];
        $image = time().$image;
        $image = preg_replace('/[^A-Za-z0-9._-]/', '', $image);

        $tmp_name = $_FILES['tech_event_image']['tmp_name'];

        $eventname = $_POST['eventname'];
        $location = $_POST['location'];
        $techskill = $_POST['techskill'];

        $description = $_POST['description'];


        if($dbctrl->uploadImage($image, $tmp_name)) {
            if($dbctrl->insert_event($eventname, $location, $techskill, $description, $image)) {
                echo "<p>The data has been successfully added!<p>";
            } else {
                echo "<p>The data has not been added. Please check the logs</p>";
            }
        } else {
            echo "Image upload fail. Rolling back insert operation. Check log file";
        }
        ?>
    </main>

    <?php
    require_once "includes/footer.inc"
    ?>
</body>
</html>
