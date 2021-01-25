<?php require_once('partials/landing_head.php'); ?>

<body>
	<nav class="navbar navbar-lg navbar-expand-lg navbar-transparant navbar-dark navbar-absolute w-100">
		<div class="container">
			<a class="navbar-brand" href="index.php">iRegistration</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Login Panels
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="admin/">Adminstrator Panel</a>
							<a class="dropdown-item" href="registrar/">Registrar Panel</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="intro py-5 py-lg-9 position-relative text-white">
		<div class="bg-overlay-dark">
			<img src="public/dist/img/background.jpg" class="img-fluid img-cover" alt="iRegistration" />
		</div>
		<div class="intro-content py-6 text-center">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto text-center">
						<h1 class="my-3 display-4 d-none d-lg-inline-block">iRegistration</h1>
						<span class="h1 my-3 d-inline-block d-lg-none">iRegistration</span>
						<p class="lead mb-3">
							Birth And Death Registration Offices Hold Very Vital Information Concerning
							Birth And Mortality Records Of People Which Inturn Needs Better Methods Of
							Storage.
							<br>
							iRegistration Information Management System Aims At Making Sure
							That All Necessary Information For A Registration Office Is Properly Stored,
							Readily Available And Is Made Accessible To Only Authorized Personnel.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="public/dist/js/landing.js"></script>
</body>

</html>