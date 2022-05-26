<html>

<head>
	<title>Dashboard</title>

	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />

	<link rel="shortcut icon" href="/public/images/favicon.png" />
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/config.css">
	<link rel="stylesheet" href="/public/css/index.css">
</head>

<body>
	<header>
		<a href="/">
			<img src="/public/images/logo.png" width="64" height="64" alt="Logo" />
		</a>
	</header>

	<div class="container d-flex justify-content-between mt-4">
		<p class="regular-24 font-plex color-gray-500">Olá, <?php echo $_SESSION['nome']; ?></p>
		<a class="regular-24 font-plex color-gray-500" href="/editar-perfil">Editar Perfil</a>
		<a class="regular-24 font-plex color-gray-500" href="/catalogo">Catálogo</a>


		<a class="regular-24 font-plex color-gray-500" href="/auth/logout">Sair</a>
	</div>
</body>

</html>