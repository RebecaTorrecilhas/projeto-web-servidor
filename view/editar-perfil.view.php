<html>

<head>
	<title>Editar perfil</title>

	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />

	<link rel="shortcut icon" href="/public/images/favicon.png" />
	<link rel="stylesheet" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/css/config.css">
	<link rel="stylesheet" href="/public/css/editar-perfil.css">
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
			<p class="regular-16 color-gray-500">Olá, <?php echo $_SESSION['nome']; ?></p>

			<form method="POST" action="/auth/cadastrar">

				<div class="container">
					<button type="button" onClick="addImage()" class="button-no-style">
						<div class="img-perfil" id="image" />
					</button>
					<input type="file" name="photo" hidden id="photo" />
				</div>
				<div class="p-2 text-center">
					<b class="regular-16 color-gray-500"> Clique na imagem para alterar </b>
				</div>

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

				<div class="text-field">
					<input type="password" name="confirm-password" required placeholder="Confirmar Senha" />
					<p class="regular-12 color-error"><?php echo $this->errors['confirm-password'] ?? '' ?></p>
				</div>
			</form>

			<button type="submit" class="button-primary">Editar Cadastro</button>
		</div>
	</div>
</body>
<script>
	addImage = () => {
		document.getElementById("photo").click();
	}

	function changeImage() {
		console.log(this.files);
		if (this.files && this.files[0]) {
			const blob = new Blob([this.files[0]]);
			const url = URL.createObjectURL(blob, {
				type: "image/png"
			});
			document.getElementById("image").style.backgroundImage = `url("${url}")`;

		}
	}

	document.getElementById("photo").addEventListener("change", changeImage, false);
</script>

</html>