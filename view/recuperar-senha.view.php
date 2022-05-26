<html>

<head>
	<title>Alterar senha</title>

	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />

	<link rel="shortcut icon" href="/public/images/favicon.png" />
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/config.css">
	<link rel="stylesheet" href="/public/css/recuperar-senha.css">
</head>

<body>
	<header>
		<a href="/">
			<img src="/public/images/logo.png" width="64" height="64" alt="Logo" />
		</a>
	</header>

	<div class="container">
		<div class="card bg-gray-200">
			<?php if ($this->success) { ?>
				<p class="success bg-success"><?php echo $this->success ?? '' ?></p>
			<?php } ?>

			<?php if ($this->errors['error']) { ?>
				<p class="error bg-error"><?php echo $this->errors['error'] ?? '' ?></p>
			<?php } ?>

			<h5 class="text-center semibold-24 color-white">Alterar senha</h5>
			<p class="text-center regular-16 color-gray-500 mb-0">Informe uma nova senha para alterar</p>

			<form method="POST" action="/auth/resetPassword">
				<input type="hidden" name="email" value='<?php echo $_GET['email'] ?>' />
				<input type="hidden" name="token" value='<?php echo $_GET['token'] ?>' />

				<div class="text-field">
					<input type="password" name="password" required placeholder="Nova senha" />
					<p class="regular-12 color-error"><?php echo $this->errors['password'] ?? '' ?></p>
				</div>

				<div class="text-field">
					<input type="password" name="password_confirmation" required placeholder="Confirme sua senha" />
					<p class="regular-12 color-error"><?php echo $this->errors['password_confirmation'] ?? '' ?></p>
				</div>

				<button type="submit" class="button-primary">Alterar senha</button>
			</form>

			<p class="text-center regular-16 color-gray-500 mb-0">Lembrou a senha? <a class="color-gray-500" href="/entrar">Entrar</a></p>
		</div>
	</div>
</body>

</html>