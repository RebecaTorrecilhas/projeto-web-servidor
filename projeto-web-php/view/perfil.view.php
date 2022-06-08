<html>

<head>
	<title>Perfil</title>

	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />

	<link rel="shortcut icon" href="/public/images/favicon.png" />
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/config.css">
	<link rel="stylesheet" href="/public/css/detalhes.css">

	<link rel="stylesheet" href="/public/css/perfil.css">
</head>

<body>
	<header>
		<a href="/">
			<img src="/public/images/logo.png" width="64" height="64" alt="Logo" />
		</a>
	</header>

	<div class="page-title">
		<p class="regular-30 color-gray-500"> Minhas avaliações </p>
	</div>

	<?php foreach ($avaliacoes as $avaliacao) { ?>
		<div class="container detalhes">
			<div class="card-large bg-gray-200">
				<div class="row">
					<div class="col-lg-4">
						<img class="poster" src=<?php echo 'https://image.tmdb.org/t/p/w500/' . $avaliacao["movie"]->poster_path ?>>
					</div>

					<div class="col-lg col-12">
						<h4 class="semibold-24 color-gray-500"><?php echo $avaliacao["movie"]->original_title ?></h4>
						<p class="regular-16 color-gray-500"><?php echo $avaliacao["movie"]->overview ?></p>
						<p class="regular-16 color-gray-500"><b>Tempo do filme: </b><?php echo $avaliacao["movie"]->runtime . ' minutos' ?></p>
					</div>
				</div>

				<div class="avaliacao">
					<p class="titulo semibold-24 color-gray-500">Sua avaliação</p>

					<form method="POST" action="/avaliar">
						<input type="textarea" name="comentario" value='<?php echo $avaliacao["ava_comentario"] ?>' disabled />
					</form>
				</div>
			</div>
		</div>
	<?php } ?>
</body>

</html>