<?php
function reghtml(){
    echo '<div class="container">
        <h1>Register</h1>
        <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
            <input type="text" name="fullname" required id="" placeholder="Fullname">
            <br>
            <input type="text" name="username" required id="" placeholder="Username">
            <br>
            <input type="email" name="email" required id="" placeholder="Email">
            <br>
            <input type="password" name="password" required placeholder="password">
            <br>
            <input type="password" name="password_confirm" required placeholder="Password confirm">
            <br>
            <button type="submit" name="submit">Register</button>
        </form>
        <br>
            <p>Already a member. <a href="user_login.php">Login here...</a></p>
    </div> ';
}

function lginhtml(){
	echo '<div class="container">
            <h1>Login</h1>
            <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                <input type="text" name="username" id="" placeholder="username">
                <br>
                <input type="password" name="password" placeholder="password">
                <br>
                <button type="submit" name="submit">Login</button>
            </form>
            <br>
            <p>Not a member.<a href="user_register.php">Register here...</a></p>
    
        </div> ';

}

function check_exist($field){
	global $connect, $email, $username;
	
	$stmt = $connect -> query("SELECT " . $field . " FROM users");
	$rows = $stmt->fetchAll();
	
	foreach ($rows as $row){
		if ($row[$field] === $email  || $row[$field] === $username){
			return true;
		}
	}
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Alfys Blog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet"  href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.css">
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
									<li><a href="user_login.php">Login</a></li>
									<li><a href="user_register.php">Register</a></li>
									<li><a href="no-sidebar.html">About</a></li>
								</ul>
							</nav>

					</header>
				</div>


