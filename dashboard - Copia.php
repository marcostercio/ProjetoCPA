<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css" >

	<link rel="stylesheet" href="dashboard.css" >
	<title>Projeto CPA</title>
</head>
<body>
	<!-- Navbar content -->
	<nav class="navbar navbar-dark  fixed-top flex-md-nowrap p-0 shadow back-color">

		<a class="navbar-brand col-sm-3 col-md-2 mr-0"   href="#">
			<img width="152px" height="57px" src="img/LOGO(fundoescuro).png">
		</a>
		<!--<input type="text" class="form-control form-control-primary w-100" placeholder="Search..." >-->
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="#">Logout</a>
			</li>
		</ul>

	</nav>
	<div class="container-fluid my-10">
		<div class="row">
			<!-- Sidebar -->
			<div class="col-md-2 bg-light d-none d-md-block sidebar">
				<div class="left-sidebar">

					<ul class="nav flex-column sidebar-nav">
						<!-- Administrador -->
						<h5>Administrador</h5>
						<li class="nav-item">
							<a class="nav-link active" href="#">
								<svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/></svg>
								Usuários
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?provas">
								<svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/></svg>
								Provas
							</a>
						</li>
						<h5>Minha Conta</h4>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/></svg>
								minha conta
							</a>
						</li>

					</ul>

				</div>
			</div>
		</div>
	</div>
	<!--main-->
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<h3>Usuários</h3>
		<!--Formulário de cadastrado e edição-->
		
		<?php include "controle/controladorCadastrarUsuario.php"; ?>

		<!--Listar usuários-->
		<?php
		include "controle/controladorListarUsuario.php";
		?>

		<!--rodape-->
		<hr>
		<div class="container mt-5 ">


			<div class="row">
				<div class="col">
					<a href="https://www.facdf.com.br/"><img class="pt-3 mx-auto" src="https://static.wixstatic.com/media/9a06c8_79cdccf8b1e54aa1bf7c0307407c8d15~mv2.png/v1/fill/w_131,h_37,al_c,q_85,usm_0.66_1.00_0.01/9a06c8_79cdccf8b1e54aa1bf7c0307407c8d15~mv2.webp">
					</a>
				</div>
				<div class="col">
					<p class="pt-3 mx-auto"> © 2018 by faculdade do distrito federal - facdf. todos os direitos reservados.</p>
				</div>
				<div class="col pt-3">
					<a class="badge badge-dark p-2"  href="http://bit.ly/5561991324926">Whatsapp</a></span>
				</div>

			</div>
		</main>


	</div>


</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="js/projetocpa.js"></script>
<script>
	
	
</script>

</body>
</html>