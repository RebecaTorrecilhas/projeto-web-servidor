<html>

<head>
	<title>Catalogo</title>

	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />

	<link rel="shortcut icon" href="/public/images/favicon.png" />
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/config.css">
	<link rel="stylesheet" href="/public/css/catalogo.css">
</head>

<body>
	<header>
		<a href="/">
			<img src="/public/images/logo.png" width="64" height="64" alt="Logo" />
		</a>
	</header>

	<div class="container">
		<div>
			<div class="page-title">
				<p class="regular-30 color-gray-500"> Catálogo de filmes </p>
			</div>

			<div class="movies-list">
				<?php foreach ($listMovies->results as $movie) { ?>
					<a class="movie" href=<?php echo '/catalogo/detalhes?id=' . $movie->id ?>>
						<img class="poster" src=<?php echo 'https://image.tmdb.org/t/p/w500/' . $movie->poster_path ?>>
					</a>
				<?php } ?>
			</div>
			
		</div>
	</div>
</body>

</html>