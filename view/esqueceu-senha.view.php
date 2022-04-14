<html>

<head>
	<title>Recuperar senha</title>

	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />

	<link rel="shortcut icon" href="/public/images/favicon.png" />
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/config.css">
	<link rel="stylesheet" href="/public/css/esqueceu-senha.css">
</head>

<body>
	<header>
		<a href="/">
			<img src="/public/images/logo.png" width="64" height="64" alt="Logo" />
		</a>
	</header>

	<div class="container">
		<div class="card bg-gray-200">
			<h5 class="text-center semibold-24 color-white">Recuperar senha</h5>
			<p class="text-center regular-16 color-gray-500 mb-0">Para recuperar a senha, informe o e-mail utilizado no cadastro. Um link será para alterar a senha</p>

			<form method="POST" action="/auth/forgotPassword">
				<div class="text-field">
					<input type="email" name="email" required placeholder="E-mail" />
					<p class="regular-12 color-error"><?php echo $this->errors['email'] ?? '' ?></p>
				</div>

				<button type="submit" class="button-primary">Enviar e-mail</button>
			</form>

			<p class="text-center regular-16 color-gray-500 mb-0">Lembrou a senha? <a class="color-gray-500" href="/entrar">Entrar</a></p>
		</div>
	</div>
</body>

</html>