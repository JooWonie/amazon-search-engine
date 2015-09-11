<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<?php
		$pageTitle = "みんなのショッピング.com";
		include $cg['viewdir'] . '/head.php';
	?>
	<body><div id="page">
	
		<?php include $cg['viewdir'] . '/header.php';?>

		<!-- Main Area Start -->
		<article>
		
			<!-- Sub Header Area Start -->
			<header class="feature">
				<div class="container">

					<div class="featurebox">
						<p class="subtitle"><?php echo $breadcrumbs?></p>
						<div class="titlebox">
							<h1 class="title"><?php echo stripslashes($category)?><!-- Category Title --></h1>	
						</div>
						<h6 class="resultCount">
							<span class="label"><?php echo $lang[115] ?></span><span id="myTargetElement" class="num">0</span><?php echo $lang[116] ?>
						</h6>
						<div class="clear"></div>
					</div>

					<div id="subcat" class="subcat">
						<span id="catfilter" class="catfilter">Filters<i></i></span>
						<ul>
						<?php
						if ($children) {
						foreach ($children->BrowseNode as $child) {
							$href = $cg['baseurl']. '/list.php?index='.$idx;
							$q = (string) $child->Name;
							$q = str_replace(" ", "+", $q);
							$q = urlencode($q);
						?>
							<li>
								<a href="<?php echo $href?>&query=<?php echo $q?>&node=<?php echo $child->BrowseNodeId;?>&main=<?php echo $mainLang?>&sub=<?php echo $subc?>">
									<?php echo $child->Name;?>
								</a>
							</li>
						<?php 
						} // foreach
						} // if
						?>
						</ul>
						<div class="clear"></div>
					</div>

				</div>
			</header>
			<!-- Sub Header Area End -->

			<div class="container main" id="container-main">

				<ol class="products">
				<?php 
				if ($xml['TotalResults'] > 0) { 
					$categ['All'] = 'All';
					foreach ($objItems->Items->Item as $item) {
						if (isset($item->ItemAttributes->ListPrice)) {
							$price = $item->ItemAttributes->ListPrice->FormattedPrice;
						} else {
							$price = $lang[119];
						}
						
						if(isset($item->LargeImage)) {
							$image = $item->LargeImage->URL;
						} else {
							if(isset($item->MediumImage)) {
								$image = $item->MediumImage->URL;
							} else if(isset($item->SmallImage)) {
								$image = $item->SmallImage->URL;
							} else {
								$image = $cg['imageurl'] . '/no-image.png';
							}
						}
						if(isset($item->ItemAttributes->ProductGroup)) {
							$pg = $item->ItemAttributes->ProductGroup;
							$categ[$pg] = $pg;
						}
				?>
					<li><a href="<?php echo $item->DetailPageURL?>" target="_blank">
						<div class="prbox"><span class="hovmask"></span>
							<img src="<?php echo $image?>" class="" alt="<?php echo $item->ItemAttributes->Title?>" title="">
						</div>
						<div class="prbottom simptip" data-tooltip="<?php echo $item->ItemAttributes->Title?><?php // echo $item->ItemAttributes->ProductGroup; ?>">
							<h3 class="title"><?php echo $item->ItemAttributes->Title?><?php // echo $item->ItemAttributes->ProductGroup; ?></h3>
							<span class="price"><?php echo $price;?></span>
						</div>
					</a></li>
				<?php
					} // foreach 
				} // if
				?>
				</ol>
				<div class="clear"></div>
				
				<span id="seemore" class="seemore">
				
					<div id="indicator">
						<div class="bar1"></div><div class="bar2"></div><div class="bar3"></div><div class="bar4"></div><div class="bar5"></div><div class="bar6"></div><div class="bar7"></div><div class="bar8"></div><div class="bar9"></div><div class="bar10"></div><div class="bar11"></div><div class="bar12"></div>
					</div>

					<span id="end-of-page-message"></span>

				</span>
				<input type="hidden" id="more-link" value="<?php echo $moreUrl?>"/>
						
			</div><!-- .container.main End -->
		</article>
		<!-- Main Area End -->

		<?php require($cg['viewdir'] . '/footer.php'); ?>
		<?php include $cg['viewdir'] . '/smartphone_sidemenu.php'; ?>
	</div><!-- #page -->

		<?php require($cg['viewdir'] . '/javascripts.php');?>		
		<script type="text/template" id="next-template">
		<%
		_.each(Items.Item, function(item) {
			if (typeof item.ItemAttributes.ListPrice !== 'undefined') {
				var price = item.ItemAttributes.ListPrice.FormattedPrice;
			} else {
				var price = lang119;
			}
			
			if (typeof item.LargeImage !== 'undefined') {
				var image = item.LargeImage.URL;
			} else {
				if(typeof item.MediumImage !== 'undefined') {
					image = item.MediumImage.URL;
				} else if(typeof item.SmallImage !== 'undefined') {
					image = item.SmallImage.URL;
				} else {
					image = noImage;
				}
			}
		%>
		<li><a href="<%= item.DetailPageURL%>" target="_blank">
			<div class="prbox"><span class="hovmask"></span>
				<img src="<%= image %>" class="" alt="<%= item.ItemAttributes.Title %>" title="">
			</div>
			<div class="prbottom simptip" data-tooltip="<%= item.ItemAttributes.Title %>">
				<h3 class="title"><%= item.ItemAttributes.Title %></h3>
				<span class="price"><%= price %></span>
			</div>
		</a></li>
		<% }); %>
		</script>
		
		<script>
		$(document).ready(function() {
			var nextPage = parseInt("<?php echo $nextPage?>");
			var maxPage = parseInt("<?php echo $maxPage?>");
			var allRecsShown = <?php echo $allRecsShown;?>;
			var lang119 = '<?php echo $lang[119]?>';
			var moreResults = "<?php echo (string) $xml['MoreSearchResultsUrl']; ?>";
			if (maxPage !== 0) {
				$el = $('#seemore');
				opts = {
					offset: '100%',
					container: 'auto'
				};
				var morelink = '';
				$el.waypoint(function(event, direction) {
					if (nextPage > maxPage) {
						if (allRecsShown) {
								var msg = '<span class="on"><?php echo $lang[121]?></span>';
							} else {
								var msg = '<a class="on link" target="_blank" href="' + moreResults + '"><?php echo $lang[122]?></a>';
							}
							$('#seemore #end-of-page-message').html(msg);
							$('#seemore #indicator').addClass('off');
					} else {
						$el.waypoint('destroy');
						morelink = $('#more-link').val() + "&page=" + nextPage;
						nextPage += 1;
						$.get(morelink, function(data) {
							data = $.parseJSON(data);
							data.noImage = "<?php echo $cg['imageurl'] . '/no-image.png'; ?>";
							data.lang119 = lang119;
							//alert(data.Items.Item[0].ItemAttributes.Author);
							var tpl = _.template($('#next-template').html(),  data );
							$('.products').append(tpl);
							$el.waypoint(opts);
						});
					}
				}, opts);
			}
		});	
		</script>

	</body>
</html>