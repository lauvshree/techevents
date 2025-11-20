<?php
$target = '';
$title = "Insert Event";
require_once "includes/head.inc"
?>
<body>
    <?php
    require_once "includes/header.inc"
    ?>

    <main>
            <form class="input-form" action="inserttodb.php" method="post" enctype="multipart/form-data">                
                <label for="eventname">Event name</label>
                <input type="text" name="eventname" id="eventname" required>

                <label for="location">Location</label>
                <input type="text" name="location" id="location" required>

                <label for="techskill">Tech Skills involved</label>
                <input type="text" name="techskill" id="techskill" required>

                <label for="description">Description</label>
                <textarea name="description" id="description" required></textarea>

                <label for="tech_event_image">Choose an image</label>
                <input type="file" name="tech_event_image" id="tech_event_image" required>
                
                <input class="submit-btn" type="submit" name="submit" value="Insert">
            </form>
    </main>

    <?php
    require_once "includes/footer.inc"
    ?>
</body>
</html>
