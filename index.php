<?php 
	require_once 'partials/connection.php';
	include_once 'partials/header.php';

	# Retrieveing information from the post tabel.
	$stmt = $connect -> query("SELECT * FROM `post`");
	$rows = $stmt -> fetchAll();

	

?>
			<!-- Features -->
				<div id="features-wrapper">
					<div class="container">
					<?php echo '<h2>Hello ' . $_SESSION['username'] . '</h2>' ?>
						<div class="row">
						<?php $a = 1;
							foreach ($rows as $row){
								echo '<div class="col-4 col-12-medium">
										<!-- Box -->
										<section class="box feature">
											<a href="#" class="image featured"><img src="images/pic0'.$a.'.jpg" alt="" /></a>
											<div class="inner">
												<header>
													<h2>' . $row['title'] . '</h2>
													<p>Maybe here as well I think <b>'. $row['date_posted'] .'</b>
													</p>
												</header>
												<p>Phasellus quam turpis, feugiat sit amet in, hendrerit in lectus. Praesent sed semper amet bibendum tristique fringilla.</p>				
											</div>
										</section>
									</div>';
									$a = $a + 1;
								}?>
						</div>
					</div>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row gtr-200">
							<div class="col-4 col-12-medium">

								<!-- Sidebar -->
									<div id="sidebar">
										<section class="widget thumbnails">
											<h3>Interesting stuff</h3>
											<div class="grid">
												<div class="row gtr-50">
													<div class="col-6"><a href="#" class="image fit"><img src="images/pic04.jpg" alt="" /></a></div>
													<div class="col-6"><a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a></div>
													<div class="col-6"><a href="#" class="image fit"><img src="images/pic06.jpg" alt="" /></a></div>
													<div class="col-6"><a href="#" class="image fit"><img src="images/pic07.jpg" alt="" /></a></div>
												</div>
											</div>
											<a href="#" class="button icon fa-file-alt">More</a>
										</section>
									</div>

							</div>
							<div class="col-8 col-12-medium imp-medium">

								<!-- Content -->
									<div id="content">
										<section class="last">
											<h2>So what's this all about?</h2>
											<p>This is <strong>Verti</strong>, a free and fully responsive HTML5 site template by <a href="http://html5up.net">HTML5 UP</a>.
											Verti is released under the <a href="http://html5up.net/license">Creative Commons Attribution license</a>, so feel free to use it for any personal or commercial project you might have going on (just don't forget to credit us for the design!)</p>
											<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. Praesent semper bibendum ipsum, et tristique augue fringilla eu. Vivamus id risus vel dolor auctor euismod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. Aliquam luctus mattis lectus sit amet phasellus quam turpis.</p>
											<a href="#" class="button icon solid fa-arrow-circle-right">Continue Reading</a>
										</section>
									</div>

							</div>
						</div>
					</div>
				</div>
<?php 

	include_once 'partials/footer.php';

?>