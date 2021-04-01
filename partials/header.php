<?php
session_start();
$_SESSION['username'] ??= 'Guest';
$_SESSION['status'] ??= '';
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Alfys Blog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--<link rel="stylesheet" href="assets/css/bootstrap.css">-->
		<link rel="stylesheet"  href="assets/css/bootstrap.css" />
		<link rel="stylesheet"  href="assets/css/main.css" />
	</head>
	<body class="is-preload homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.php">Alfys</a></h1>
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.php">Home</a></li>
									<li>
										<a href="#">Category</a>
										<ul>
											<li><a href="#">Lorem ipsum dolor</a></li>
											<li><a href="#">Magna phasellus</a></li>
											<li>
												<a href="#">Phasellus consequat</a>
												<ul>
													<li><a href="#">Lorem ipsum dolor</a></li>
													<li><a href="#">Phasellus consequat</a></li>
													<li><a href="#">Magna phasellus</a></li>
													<li><a href="#">Etiam dolore nisl</a></li>
												</ul>
											</li>
											<li><a href="#">Veroeros feugiat</a></li>
										</ul>
									</li>
									
									<?php 
									if($_SESSION['username'] === 'Guest'){
										echo '<li><a href="user_login.php">Login</a></li>
											  <li><a href="user_register.php">Register</a></li>';
									}else{
										echo '<form style="display: inline">
												<li><input type="hidden"><a href="user_logout.php">Logout</a></input></li>
											  </form>';
									} 
									if ($_SESSION['status'] === 'admin'){
										echo '<li><a href="user_login.php">Dashbord</a></li>';
									}
									?>
									
									<li><a href="no-sidebar.html">About</a></li>
								</ul>
							</nav>

					</header>
				</div>
			</div>
<input type="hidden">

