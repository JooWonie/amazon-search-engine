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
		
			<?php include 'subheader_v.php';?>

			<div class="container index">
			
				<!-- pickup Area Start -->
				<div class="indextop">
					<div class="pickup">
						<h2><?php echo $lang[142] ?></h2>
						
						<div class="bnarea">

							<ul id="owl-pick" class="feuture_item owl-carousel">
								<?php include $videogames_file; ?>
							</ul>
			
						</div><!-- .bnarea END -->
						
					</div><!-- .pickup END -->
				</div>
				<!-- pickup Area End -->

				<!-- category Area Start -->
				<div class="catarea">
				<h2><?php echo $lang[140] ?></h2>
				<ul id="catlist">
					<li class="mmenu"><a><?php echo $lang[4] ?></a>
						<ul class="big">
							<?php $listurl = $cg['baseurl'] .'/list';?>
							<h3><?php echo $lang[4] ?></h3>
							<li><a href="<?php echo $listurl?>?query=<?php echo urlencode($lang[5]) ?>&node=<?php echo $ni[5]?>&main=4"><?php echo $lang[5] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[6]) ?>&node=<?php echo $ni[6]?>&main=4"><?php echo $lang[6] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[7]) ?>&node=<?php echo $ni[7]?>&main=4"><?php echo $lang[7]?><span><?php echo $lang[8] ?></span></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[9]) ?>&node=<?php echo $ni[9]?>&main=4"><?php echo $lang[9] ?><span><?php echo $lang[10] ?></span></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[11]) ?>&node=<?php echo $ni[11]?>&main=4"><?php echo $lang[11] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[12]) ?>&node=<?php echo $ni[12]?>&main=4"><?php echo $lang[12] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[13]) ?>&node=<?php echo $ni[13]?>&main=4"><?php echo $lang[13] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[109]) ?>&node=<?php echo $ni[109]?>&main=4"><?php echo $lang[109] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[14]) ?>&node=<?php echo $ni[14]?>&main=4"><?php echo $lang[14] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[15]) ?>&node=<?php echo $ni[15]?>&main=4"><?php echo $lang[15] ?></a></li>
						</ul>
					</li>

					<li class="mmenu"><a><?php echo $lang[16] ?></a>
						<ul class="big">
							<h3><?php echo $lang[16] ?></h3>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[17]) ?>&node=<?php echo $ni[17]?>&main=16"><?php echo $lang[17] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[18]) ?>&node=<?php echo $ni[18]?>&main=16"><?php echo $lang[18] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[19]) ?>&node=<?php echo $ni[19]?>&main=16"><?php echo $lang[19] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[20]) ?>&node=<?php echo $ni[20]?>&main=16"><?php echo $lang[20] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[21]) ?>&node=<?php echo $ni[21]?>&main=16"><?php echo $lang[21] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[22]) ?>&node=<?php echo $ni[22]?>&main=16"><?php echo $lang[22] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[23]) ?>&node=<?php echo $ni[23]?>&main=16"><?php echo $lang[23] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[24]) ?>&node=<?php echo $ni[24]?>&main=16"><?php echo $lang[24] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[25]) ?>&node=<?php echo $ni[25]?>&main=16"><?php echo $lang[25] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[26]) ?>&node=<?php echo $ni[26]?>&main=16"><?php echo $lang[26] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[27]) ?>&node=<?php echo $ni[27]?>&main=16"><?php echo $lang[27] ?></a></li>
						</ul>
					</li>
					
					<li class="mmenu"><a><?php echo $lang[28] ?></a>
						<ul class="big">
							<h3><?php echo $lang[28] ?></h3>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[29]) ?>&node=<?php echo $ni[29]?>&main=28"><?php echo $lang[29] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[30]) ?>&node=<?php echo $ni[30]?>&main=28"><?php echo $lang[30] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[31]) ?>&node=<?php echo $ni[31]?>&main=28"><?php echo $lang[31] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[32]) ?>&node=<?php echo $ni[32]?>&main=28"><?php echo $lang[32] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[33]) ?>&node=<?php echo $ni[33]?>&main=28"><?php echo $lang[33] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[34]) ?>&node=<?php echo $ni[34]?>&main=28"><?php echo $lang[34] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[35]) ?>&node=<?php echo $ni[35]?>&main=28"><?php echo $lang[35] ?><span><?php echo $lang[36] ?></span></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[37]) ?>&node=<?php echo $ni[37]?>&main=28"><?php echo $lang[37] ?></a></li>
						</ul>
					</li>
					
					<li class="mmenu"><a><?php echo $lang[107] ?></a>
						<ul>
							<h3><?php echo $lang[107] ?></h3>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[38]) ?>&node=<?php echo $ni[38]?>&main=107"><?php echo $lang[38] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[39]) ?>&node=<?php echo $ni[39]?>&main=107"><?php echo $lang[39] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[40]) ?>&node=<?php echo $ni[40]?>&main=107"><?php echo $lang[40] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[41]) ?>&node=<?php echo $ni[41]?>&main=107"><?php echo $lang[41] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[42]) ?>&node=<?php echo $ni[42]?>&main=107"><?php echo $lang[42] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[126])?>&query=<?php echo urlencode($lang[43]) ?>&node=<?php echo $ni[43]?>&main=107"><?php echo $lang[43] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[126])?>&query=<?php echo urlencode($lang[44]) ?>&node=<?php echo $ni[44]?>&main=107"><?php echo $lang[44] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[126])?>&query=<?php echo urlencode($lang[45]) ?>&node=<?php echo $ni[45]?>&main=107"><?php echo $lang[45] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[127])?>&query=<?php echo urlencode($lang[46]) ?>&node=<?php echo $ni[46]?>&main=107"><?php echo $lang[46] ?></a></li>
						</ul>
					</li>

					<li class="mmenu"><a><?php echo $lang[108] ?></a>
						<ul>
							<h3><?php echo $lang[108] ?></h3>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[128])?>&query=<?php echo urlencode($lang[47]) ?>&node=<?php echo $ni[47]?>&main=108"><?php echo $lang[47] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[128])?>&query=<?php echo urlencode($lang[48]) ?>&node=<?php echo $ni[48]?>&main=108"><?php echo $lang[48] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[128])?>&query=<?php echo urlencode($lang[49]) ?>&node=<?php echo $ni[49]?>&main=108"><?php echo $lang[49] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[129])?>&query=<?php echo urlencode($lang[50]) ?>&node=<?php echo $ni[50]?>&main=108"><?php echo $lang[50] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[129])?>&query=<?php echo urlencode($lang[51]) ?>&node=<?php echo $ni[51]?>&main=108"><?php echo $lang[51] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[129])?>&query=<?php echo urlencode($lang[52]) ?>&node=<?php echo $ni[52]?>&main=108"><?php echo $lang[52] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[129])?>&query=<?php echo urlencode($lang[53]) ?>&node=<?php echo $ni[53]?>&main=108"><?php echo $lang[53] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[129])?>&query=<?php echo urlencode($lang[54]) ?>&node=<?php echo $ni[54]?>&main=108"><?php echo $lang[54] ?><span><?php echo $lang[55] ?></span></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[128])?>&query=<?php echo urlencode($lang[56]) ?>&node=<?php echo $ni[56]?>&main=108"><?php echo $lang[56] ?></a></li>
						</ul>
					</li>

					<li class="mmenu"><a><?php echo $lang[57] ?></a>
						<ul>
							<h3><?php echo $lang[57] ?></h3>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[130])?>&query=<?php echo urlencode($lang[58]) ?>&node=<?php echo $ni[58]?>&main=57"><?php echo $lang[58] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[130])?>&query=<?php echo urlencode($lang[59]) ?>&node=<?php echo $ni[59]?>&main=57"><?php echo $lang[59] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[130])?>&query=<?php echo urlencode($lang[60]) ?>&node=<?php echo $ni[60]?>&main=57"><?php echo $lang[60] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[130])?>&query=<?php echo urlencode($lang[61]) ?>&node=<?php echo $ni[61]?>&main=57"><?php echo $lang[61] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[130])?>&query=<?php echo urlencode($lang[62]) ?>&node=<?php echo $ni[62]?>&main=57"><?php echo $lang[62] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[130])?>&query=<?php echo urlencode($lang[63]) ?>&node=<?php echo $ni[63]?>&main=57"><?php echo $lang[63] ?><span><?php echo $lang[64] ?></span></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[130])?>&query=<?php echo urlencode($lang[65]) ?>&node=<?php echo $ni[65]?>&main=57"><?php echo $lang[65] ?></a></li>
						</ul>
					</li>
					
					<li class="mmenu"><a><?php echo $lang[66] ?></a>
						<ul>
							<h3><?php echo $lang[66] ?></h3>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[131])?>&query=<?php echo urlencode($lang[67]) ?>&node=<?php echo $ni[67]?>&main=66"><?php echo $lang[67] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[131])?>&query=<?php echo urlencode($lang[68]) ?>&node=<?php echo $ni[68]?>&main=66"><?php echo $lang[68] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[131])?>&query=<?php echo urlencode($lang[69]) ?>&node=<?php echo $ni[69]?>&main=66"><?php echo $lang[69] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[131])?>&query=<?php echo urlencode($lang[70]) ?>&node=<?php echo $ni[70]?>&main=66"><?php echo $lang[70] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[129])?>&query=<?php echo urlencode($lang[71]) ?>&node=<?php echo $ni[71]?>&main=66"><?php echo $lang[71] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[131])?>&query=<?php echo urlencode($lang[72]) ?>&node=<?php echo $ni[72]?>&main=66"><?php echo $lang[72] ?></a></li>
						</ul>
					</li>

					<li class="mmenu"><a><?php echo $lang[73] ?></a>
						<ul>
							<h3><?php echo $lang[73] ?></h3>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[132])?>&query=<?php echo urlencode($lang[74]) ?>&node=<?php echo $ni[74]?>&main=73"><?php echo $lang[74] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[132])?>&query=<?php echo urlencode($lang[75]) ?>&node=<?php echo $ni[75]?>&main=73"><?php echo $lang[75] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[132])?>&query=<?php echo urlencode($lang[76]) ?>&node=<?php echo $ni[76]?>&main=73"><?php echo $lang[76] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[132])?>&query=<?php echo urlencode($lang[77]) ?>&node=<?php echo $ni[77]?>&main=73"><?php echo $lang[77] ?><span><?php echo $lang[78] ?></span></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[132])?>&query=<?php echo urlencode($lang[79]) ?>&node=<?php echo $ni[79]?>&main=73"><?php echo $lang[79] ?></a></li>
						</ul>
					</li>
					
					<li class="mmenu"><a><?php echo $lang[80] ?></a>
						<ul class="big">
							<h3><?php echo $lang[80] ?></h3>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[81]) ?>&node=<?php echo $ni[81]?>&main=80"><?php echo $lang[81] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[82]) ?>&node=<?php echo $ni[82]?>&main=80"><?php echo $lang[82] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[83]) ?>&node=<?php echo $ni[83]?>&main=80"><?php echo $lang[83] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[84]) ?>&node=<?php echo $ni[84]?>&main=80"><?php echo $lang[84] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[85]) ?>&node=<?php echo $ni[85]?>&main=80"><?php echo $lang[85] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[86]) ?>&node=<?php echo $ni[86]?>&main=80"><?php echo $lang[86] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[87]) ?>&node=<?php echo $ni[87]?>&main=80"><?php echo $lang[87] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[88]) ?>&node=<?php echo $ni[88]?>&main=80"><?php echo $lang[88] ?><span><?php echo $lang[89] ?></span></a></li>
						</ul>
					</li>

					<li class="mmenu"><a><?php echo $lang[90] ?></a>
						<ul>
							<h3><?php echo $lang[90] ?></h3>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[134])?>&query=<?php echo urlencode($lang[91]) ?>&node=<?php echo $ni[91]?>&main=90"><?php echo $lang[91] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[134])?>&query=<?php echo urlencode($lang[92]) ?>&node=<?php echo $ni[92]?>&main=90"><?php echo $lang[92] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[134])?>&query=<?php echo urlencode($lang[93]) ?>&node=<?php echo $ni[93]?>&main=90"><?php echo $lang[93] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[134])?>&query=<?php echo urlencode($lang[94]) ?>&node=<?php echo $ni[94]?>&main=90"><?php echo $lang[94] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[134])?>&query=<?php echo urlencode($lang[95]) ?>&node=<?php echo $ni[95]?>&main=90"><?php echo $lang[95] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[134])?>&query=<?php echo urlencode($lang[96]) ?>&node=<?php echo $ni[96]?>&main=90"><?php echo $lang[96] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[134])?>&query=<?php echo urlencode($lang[97]) ?>&node=<?php echo $ni[97]?>&main=90"><?php echo $lang[97] ?></a></li>
						</ul>
					</li>
					
					<li class="mmenu"><a><?php echo $lang[98] ?></a>
						<ul>
							<h3><?php echo $lang[98] ?></h3>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[135])?>&query=<?php echo urlencode($lang[99]) ?>&node=<?php echo $ni[99]?>&main=98"><?php echo $lang[99] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[135])?>&query=<?php echo urlencode($lang[100]) ?>&node=<?php echo $ni[100]?>&main=98"><?php echo $lang[100] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[135])?>&query=<?php echo urlencode($lang[101]) ?>&node=<?php echo $ni[101]?>&main=98"><?php echo $lang[101] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[135])?>&query=<?php echo urlencode($lang[102]) ?>&node=<?php echo $ni[102]?>&main=98"><?php echo $lang[102] ?></a></li>
							<li><a href="<?php echo $listurl?>?index=<?php echo urlencode($lang[135])?>&query=<?php echo urlencode($lang[103]) ?>&node=<?php echo $ni[103]?>&main=98"><?php echo $lang[103] ?></a></li>
						</ul>
					</li>
				
				</ul>


				<a class="spcatbtn" href="#menu"><span class="label"><i class="icon cat"></i><span class="txt"><?php echo $lang[141] ?></span></span></a>
				</div>
				<!-- category Area End -->


				<div class="clear"></div>

				<h2><?php echo $lang[143] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[17]) ?>&node=<?php echo $ni[17]?>&main=1"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec" class="products">
				<?php 
				if ($dvd_file) {
					include $dvd_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				

				<h2><?php echo $lang[145] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[29])?>&node=<?php echo $ni[29]?>&main=28"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec2" class="products">
				<?php 
				if ($elc_file) {
					include $elc_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				

				<h2><?php echo $lang[146] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[20]) ?>&node=<?php echo $ni[20]?>&main=16"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec3" class="products">
				<?php 
				if ($mp3_file) {
					include $mp3_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				

				<h2><?php echo $lang[159] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[7]) ?>&node=<?php echo $ni[7]?>&main=4"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($kindle_file) {
					include $kindle_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				

				<h2><?php echo $lang[147] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[5])?>&query=<?php echo urlencode($lang[6]) ?>&node=<?php echo $ni[6]?>&main=4"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($books_file) {
					include $books_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[162] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[126])?>&query=<?php echo urlencode($lang[43]) ?>&node=<?php echo $ni[43]?>&main=107"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($software_file) {
					include $software_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[151] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[82]) ?>&node=<?php echo $ni[82]?>&main=80"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($apparel_file) {
					include $apparel_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[152] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[29])?>&query=<?php echo urlencode($lang[35]) ?>&node=<?php echo $ni[29]?>&main=28"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($appliance_file) {
					include $appliance_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[156] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[130])?>&query=<?php echo urlencode($lang[60]) ?>&node=<?php echo $ni[60]?>&main=57"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($grocery_file) {
					include $grocery_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[157] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[132])?>&query=<?php echo urlencode($lang[77]) ?>&node=<?php echo $ni[77]?>&main=73"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($hobby_file) {
					include $hobby_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				

				<h2><?php echo $lang[153] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[135])?>&query=<?php echo urlencode($lang[102]) ?>&node=<?php echo $ni[102]?>&main=98"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($auto_file) {
					include $auto_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[158] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[86]) ?>&node=<?php echo $ni[86]?>&main=73"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($jewelry_file) {
					include $jewelry_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[165] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[85]) ?>&node=<?php echo $ni[85]?>&main=80"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($watches_file) {
					include $watches_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>


				<h2><?php echo $lang[163] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[134])?>&query=<?php echo urlencode($lang[84]) ?>&node=<?php echo $ni[84]?>&main=90"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($sporting_file) {
					include $sporting_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[155] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[129])?>&query=<?php echo urlencode($lang[94]) ?>&node=<?php echo $ni[94]?>&main=66"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($beauty_file) {
					include $beauty_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[161] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[133])?>&query=<?php echo urlencode($lang[87]) ?>&node=<?php echo $ni[87]?>&main=80"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($shoes_file) {
					include $shoes_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[160] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[17])?>&query=<?php echo urlencode($lang[21]) ?>&node=<?php echo $ni[21]?>&main=16"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($instrument_file) {
					include $instrument_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
				<h2><?php echo $lang[154] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[132])?>&query=<?php echo urlencode($lang[74]) ?>&node=<?php echo $ni[74]?>&main=73"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($baby_file) {
					include $baby_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>

				<h2><?php echo $lang[164] ?><a class="rlink" href="<?php echo $listurl?>?index=<?php echo urlencode($lang[132])?>&query=<?php echo urlencode($lang[75]) ?>&node=<?php echo $ni[75]?>&main=73"><?php echo $lang[144] ?><span></span></a></h2>
				<ol id="owl-rec4" class="products">
				<?php 
				if ($toys_file) {
					include $toys_file;
				} 
				?>
					<li class="blank"></li>
				</ol>
				<div class="clear"></div>
				
			</div><!-- .container.index End -->
		</article>
		<!-- Main Area End -->

		<?php require($cg['viewdir'] . '/footer.php'); ?>
		<?php include $cg['viewdir'] . '/smartphone_sidemenu.php'; ?>
	</div><!-- #page -->
	
		<?php require($cg['viewdir'] . '/javascripts_index.php');?>
	</body>
</html>