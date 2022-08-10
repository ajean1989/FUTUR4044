<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

		<footer>

		<div class="footer">- Adrien Jacquenet - ad.jacquenet@gmail.com - Le site n'utilise pas de cookies -</div>

		</footer>


	</body>
</html>