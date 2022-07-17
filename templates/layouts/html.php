<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title><?= $title ?></title>
	</head>

	<?php // header
	require_once $layoutsDirectory . 'header.php'; 
	require_once $layoutsDirectory . 'navbar.php'; 
	?>

	<body>

        <?php
        echo $content;
        ?>


        
	</body>
</html>