<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<?php
	$pageTitle = "みんなのショッピング.com";
	require($cg['viewdir'] . '/head.php'); 
	?>
	<body><div id="page">
	
		<?php require($cg['viewdir'] . '/header.php'); ?>

		<!-- Main Area Start -->
		<article>
		
			<!-- Sub Header Area Start -->
			<header class="feature">
				<div class="container">
					<div class="featurebox">
							<h1 class="title"><?php echo $lang[139] ?></h1>	
					</div>
				</div>
			</header>
			<!-- Sub Header Area End -->

			<div class="container">

				<!-- category Area Start -->
				<nav class="categorypg">
					<ul>
						<li>
							<span><?php echo $lang[166] ?></span>

							<?php if ($popKeywords[0]) { ?>
								<ul>
					
								<?php
								foreach ($popKeywords as $pk) {
									$kw = stripslashes($pk['keyword']);
								?>
									<li><a href="<?php echo $cg['baseurl']?>/search?query=<?php echo str_replace(" ", "+", $kw)?>"><?php echo urldecode(str_replace("+", " ", $kw))?></a></li>
								<?php } // foreach?>
								</ul>
							<?php } // popKeywords ?>

						</li>
						
					</ul>
				</nav>
				<!-- category Area End -->

				<div class="clear"></div>

			</div><!-- .container End -->
		</article>
		<!-- Main Area End -->

		<?php require($cg['viewdir'] . '/footer.php'); ?>
		<?php include $cg['viewdir'] . '/smartphone_sidemenu.php'; ?>
	</div><!-- #page -->
	
		<?php require($cg['viewdir'] . '/javascripts_static.php');?>
	</body>
</html>