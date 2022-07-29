<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/css/style.css" />
		<title><?= $title ?></title>
	</head>


	<body>

		
		<header>
			<?php require_once $layoutsDirectory . 'header.php'; ?>
		</header>

		<nav>
			<?php require_once $layoutsDirectory . 'navbar.php'; ?>
		</nav>

		<section>

			<div class="main">

        		<?php
        		echo $content;
        		?>

			</div>

		</section>

		<!--<footer>

		</footer>-->


	</body>
</html>