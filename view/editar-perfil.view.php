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
			<?php if ($this->success) { ?>
				<p class="success bg-success"><?php echo $this->success ?? '' ?></p>
			<?php } ?>
			
			<p class="regular-16 color-gray-500">Olá, <?php echo $_SESSION['nome']; ?></p>

			<form method="POST" action="/user/editar-perfil" enctype="multipart/form-data">
				<div class="container">
					<button type="button" onClick="addImage()" class="button-no-style">
						<div class="img-perfil" id="image" <?php echo "style='background-image: url(" . '"/' . $usuario->getFoto() . '"' . ")'" ?> />
					</button>
					<input type="file" name="photo" hidden id="photo" />
				</div>

				<div class="p-2 text-center">
					<b class="regular-16 color-gray-500"> Clique na imagem para alterar </b>
				</div>

				<div class="text-field">
					<input type="text" name="nome" value="<?php echo $usuario->getNome() ?>" required placeholder="Nome completo" />
					<p class="regular-12 color-error"><?php echo $this->errors['nome'] ?? '' ?></p>
				</div>

				<div class="text-field">
					<input type="email" name="email" value=<?php echo $usuario->getEmail() ?> required placeholder="E-mail" />
					<p class="regular-12 color-error"><?php echo $this->errors['email'] ?? '' ?></p>
				</div>

				<div class="text-field">
					<input type="password" name="password" placeholder="Nova Senha" />
					<p class="regular-12 color-error"><?php echo $this->errors['password'] ?? '' ?></p>
				</div>

				<div class="text-field">
					<input type="password" name="confirmPassword" placeholder="Confirmar Senha" />
					<p class="regular-12 color-error"><?php echo $this->errors['confirmPassword'] ?? '' ?></p>
				</div>

				<button type="submit" class="button-primary">Editar Cadastro</button>
			</form>
		</div>
	</div>
</body>
<script>
	addImage = () => {
		document.getElementById("photo").click();
	}

	function changeImage() {
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