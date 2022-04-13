<html>

<head>
	<title>Cadastrar</title>

	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />

	<link rel="shortcut icon" href="/public/images/favicon.png" />
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/config.css">
	<link rel="stylesheet" href="/public/css/cadastrar.css">
</head>

<body>
	<header>
		<a href="/">
			<img src="/public/images/logo.png" width="64" height="64" alt="Logo" />
		</a>
	</header>

	<div class="container">
		<div class="card bg-gray-200">
			<h5 class="text-center semibold-24 color-white">Cadastre-se</h5>
			<p class="text-center regular-16 color-gray-500 mb-0">Avalie seus filmes e séries favoritas.</p>

			<form method="POST" action="/auth/cadastrar">
				<div class="text-field">
					<input type="text" name="nome" required placeholder="Nome completo" />
					<p class="regular-12 color-error"><?php echo $this->errors['nome'] ?? '' ?></p>
				</div>

				<div class="text-field">
					<input type="email" name="email" required placeholder="E-mail" />
					<p class="regular-12 color-error"><?php echo $this->errors['email'] ?? '' ?></p>
				</div>

				<div class="text-field">
					<input type="password" name="password" required placeholder="Senha" />
					<p class="regular-12 color-error"><?php echo $this->errors['password'] ?? '' ?></p>
				</div>

				<button type="submit" class="button-primary">Cadastrar</button>
			</form>

			<p class="regular-12 color-gray-500">Ao clicar em cadastrar, você está aceitando os Termos e Condições e a Política de Privacidade.</p>

			<div class="d-flex justify-content-center align-items-center">
				<hr class="bg-gray-500" width="40%" />
				<span class="semibold-16 color-gray-500 divider">OU</span>
				<hr class="bg-gray-500" width="40%" />
			</div>

			<p class="text-center regular-16 color-gray-500 mb-0">Já possui conta? <a class="color-gray-500" href="/entrar">Entrar</a></p>
		</div>
	</div>
</body>

</html>