<!-- JavaScript -->
<script src="./js/jquery-1.9.1.min.js"></script>

<!-- JS for Header hide animation -->
<script src="./js/headroom.min.js"></script>
<script src="./js/jQuery.headroom.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#header").headroom({
			"tolerance": 10,
			"offset": 205,
			"classes": {
			"initial": "animated",
			"pinned": "slideDown",
			"unpinned": "slideUp"
			}
		});
	});
</script>

<!-- JS for top page carousel animation -->
<script src="./js/owl.carousel.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		var owl = $("#owl-rec, #owl-rec2, #owl-rec3, #owl-rec4");
		
		owl.owlCarousel({
		itemsCustom : [
		  [0, 2],
		  [320, 3],
		  [480, 3],
		  [568, 4],
		  [768, 5],
		  [980, 5],
		  [1024, 6],
		  [1200, 7],
		  [1400, 8],
		  [1600, 9]
		],
		scrollPerPage :true,
		navigation : false
		
		});

		var pickowl = $("#owl-pick");
		pickowl.owlCarousel({
			items : 1,
			singleItem : true,
			autoPlay : 7000,
			stopOnHover : true,
			scrollPerPage :true,
			navigation : false
		});
	
	});
</script>

<!-- Sidemenu JS for smartphone -->
<script type="text/javascript" src="./js/jquery.mmenu.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('nav#menu').mmenu();
	});
</script>


<!-- JS for toggle class name -->
<script type="text/javascript">
	$(document).ready(function(){
		// header search for pc
		$("#header input#srcbx").focus( function (){$('#header input#srcbtn').addClass('on_focus');}).blur( function (){$('#header input#srcbtn').removeClass('on_focus');}
		);
		// header category
		$('#header .sub-nav').hover(
			function(){$('#header .dropdown').addClass('on_hover');},
			function(){$('#header .dropdown').removeClass('on_hover');}
		);
		// header search for smartphone
		$('#header #src-action').click(
			function(){$('#header #src-action').addClass('on_src');},
			function(){$('#header #search').addClass('on_click');}
		);
		$('#header #src-cancel span').click(
			function(){$('#header #src-action').removeClass('on_src');},
			function(){$('#header #search').removeClass('on_click');}
		);
		// Filter area toggle for smartphone
		$('#catfilter').click(
			function(){$('#subcat').toggleClass('on');}
		);
	});
</script>

<!-- JS for page top scroll -->
<script>
    $(document).ready(function() {
        $('#btt').click(function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, 300);
        })
    });
</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-38324797-6', 'minnano-shopping.com');
  ga('send', 'pageview');

</script>