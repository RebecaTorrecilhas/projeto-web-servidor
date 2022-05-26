<html>

<head>
	<title>Detalhes</title>

	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />

	<link rel="shortcut icon" href="/public/images/favicon.png" />
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/config.css">
	<link rel="stylesheet" href="/public/css/detalhes.css">
</head>

<body>
	<header>
		<a href="/">
			<img src="/public/images/logo.png" width="64" height="64" alt="Logo" />
		</a>
	</header>

	<div class="container detalhes">
		<div class="card-large bg-gray-200">
			<div class="row">
				<div class="col-lg-4">
					<img class="poster" src=<?php echo 'https://image.tmdb.org/t/p/w500/' . $movie->poster_path ?>>
				</div>

				<div class="col-lg col-12">
					<h4 class="semibold-24 color-gray-500"><?php echo $movie->original_title ?></h4>
					<p class="regular-16 color-gray-500"><?php echo $movie->overview ?></p>
					<p class="regular-16 color-gray-500"><b>Data de estreia: </b><?php echo $release_date ?></p>
					<p class="regular-16 color-gray-500"><b>Tempo do filme: </b><?php echo $movie->runtime . ' minutos' ?></p>

					<button class="favorito button-no-style" onclick="alterarFavorito()">
						<img id="favoritar-img" src="/public/images/like-uncheck.png" alt="Favorito" />
						<span id="favoritar-texto" class="semibold-16 color-gray-500">Favoritar</span>
					</button>
				</div>
			</div>

			<div class="avaliacao">
				<p class="titulo semibold-24 color-gray-500">Deixe sua avaliação aqui</p>

				<form method="POST" action="/avaliar">
					<div class="estrelas">
						<img id="estrela-1" src="/public/images/star-checked.png" onclick="alterarAvaliacao(1)" />
						<img id="estrela-2" src="/public/images/star-checked.png" onclick="alterarAvaliacao(2)" />
						<img id="estrela-3" src="/public/images/star-checked.png" onclick="alterarAvaliacao(3)" />
						<img id="estrela-4" src="/public/images/star-checked.png" onclick="alterarAvaliacao(4)" />
						<img id="estrela-5" src="/public/images/star-checked.png" onclick="alterarAvaliacao(5)" />
					</div>

					<input type="hidden" name="filme" value=<?php echo $movie->id ?> />
					<input type="hidden" name="avaliacao" id="avaliacao" value="5" />

					<input type="textarea" name="comentario" />

					<div class="container-button">
						<button type="submit" class="button-primary">Enviar avaliação</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<script>
	function alterarFavorito() {
		let text = document.getElementById('favoritar-texto').innerHTML;

		if (text === 'Favoritar') {
			document.getElementById('favoritar-texto').innerHTML = 'Desfavoritar';
			document.getElementById('favoritar-img').setAttribute('src', '/public/images/like-checked.png');
		} else {
			document.getElementById('favoritar-texto').innerHTML = 'Favoritar';
			document.getElementById('favoritar-img').setAttribute('src', '/public/images/like-uncheck.png');
		}
	}

	function alterarAvaliacao(avaliacao) {
		document.getElementById('avaliacao').value = avaliacao;

		for (let i = 1; i <= 5; i++) {
			if (i <= avaliacao) {
				document.getElementById('estrela-' + i).setAttribute('src', '/public/images/star-checked.png');
			} else {
				document.getElementById('estrela-' + i).setAttribute('src', '/public/images/star-uncheck.png');
			}
		}
	}
</script>

</html>