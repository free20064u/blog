<?php 
	require_once 'partials/connection.php';
	include_once 'partials/header.php';

	# Retrieveing information from the post tabel.
	$stmt = $connect -> query("SELECT * FROM `post` ORDER BY `post_id` DESC LIMIT 3");
	$rows = $stmt -> fetchAll();
	
	$stmt1 = $connect -> query("SELECT * FROM `post` ORDER BY `post_id` DESC LIMIT 3,3");
	$rows1 = $stmt1 -> fetchAll();


?>
	<!-- Features -->
	<div id="features-wrapper">
		<div class="container">
		<?php echo '<h2>Latest</h2>' ?>
			<div class="row">
			<?php $a = 5;
				foreach ($rows as $row){
					echo '<div class="col-4 col-12-medium">
							<!-- Box -->
							<section class="box feature">
								<a href="#" class="image featured"><img src="images/pic' . $a . '.jpg" alt="" /></a>
								<div class="inner">
									<header>
										<h2>' . $row['title'] . '</h2>
										<p>'. $row['date_posted'] .'</p>
									</header>			
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
							<h2>More news</h2>
							<div class="row">
							<?php  $b = $a;
								foreach ($rows1 as $row1){
									echo '<div class="col-12 col-12-medium">
											<!-- Box -->
											<section class="box feature">
												<div class="inner" style="background-color: #2abcfe">
												<div class="row">
													<div class="col-4 col-12-medium">
														<a href="#" class="image featured"><img src="images/pic' . $b . '.jpg" alt="" /></a>
													</div>
													<div class="col-8 col-12-medium">
														<h2>' . $row1['title'] . '</h2>
														<p>'. $row1['content'] .'</p>
													</div>
												</div>
															
												</div>
											</section>
										</div>';
										$b = $b + 1;
								}
							?>
							</div>
							
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 

	include_once 'partials/footer.php';

?>