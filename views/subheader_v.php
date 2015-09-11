<!-- Sub Header Area Start -->
<header class="feature">
	<div class="container">
		
		<h4><?php echo $lang[137] ?></h4>

		<div class="topsrcbox">

				<div id="search">
					<form method="get" action="<?php echo $cg['baseurl']?>/search">
						<input id="srcbx" type="text" name="query" class="inputTxt" placeholder="<?php echo $lang[138] ?>" value="">
						<input id="srcbtn" type="submit" class="searchBtn" value="<?php echo $lang[111] ?>">
					</form>
				</div>
				<div class="clear"></div>
		</div>
		<?php if ($popKeywords[0]) { ?>
		<div class="subcat popwords">
			<ul>
				<li><p><?php echo $lang[139] ?></p></li>
			<?php
			foreach ($popKeywords as $pk) {
				$kw = stripslashes($pk['keyword']);
			?>
				<li><a href="<?php echo $cg['baseurl']?>/search?query=<?php echo str_replace(" ", "+", $kw)?>"><?php echo urldecode(str_replace("+", " ", $kw))?></a></li>
			<?php } // foreach?>
				<li class="more"><a href="/keyword"><?php echo $lang[167] ?></a></li>
			</ul>
			<div class="clear"></div>
		</div>
		<?php } // popKeywords ?>


	</div>
</header>
<!-- Sub Header Area End -->