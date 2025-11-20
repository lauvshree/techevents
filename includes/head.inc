<!DOCTYPE html>
<html lang="en">
<head>
	<title>Explore Tech Events | $title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <?php if ($target != "") { ?>
		<meta http-equiv="refresh" content="3;url=<?= htmlspecialchars($target, ENT_QUOTES) ?>">
	<?php
	}
	?>
    <link rel="stylesheet" href="stylesheet.css?<?php echo time() ?>" title="Default Style">
</head>
