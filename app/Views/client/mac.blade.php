<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../fontend/images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fontend/css/util.css">
	<link rel="stylesheet" type="text/css" href="../fontend/css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">


			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index">Home</a>
							</li>
							<li>
								<a href="mac">Mac</a>
							</li>
							<li>
								<a href="ipad">iPad</a>
							</li>
							<li>
								<a href="iphone">iPhone</a>
							</li>
						</ul>
					</div>
					<div class="wrap-icon-header flex-w flex-r-m">
						<ul class="main-menu">
							<li>
								<a href="contact">Contact</a>
							</li>
						</ul>
						<a href="cart">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart mr-5" data-notify="{{$quantity_cart}}">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</a>

					</div>
				</nav>
			</div>
		</div>

	</header>
	@foreach($macs as $mac)

	<!-- Shoping Cart -->
	<!-- include('fontend.includes.header_cart') -->
	@endforeach
	<!-- Product -->

	<div class="bg0 m-t-23 p-b-140">
		<h3 class="	text-center mb-5">Mac</h3>
		<div class="container">

			<div class="row isotope-grid">
				@foreach($macs as $mac)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">

					<div class="block2 border border-info rounded p-3 ">

						<div class="block2-pic hov-img0">
							<img src="{{ asset('storage/upload_macs/' . $mac->picture) }}" height="100%" width="100%" alt="IMG-PRODUCT">

							<!-- <a href="" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a> -->
							<a class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								<form action="/cart.add.mac" method="POST">
									@csrf
									<input type="hidden" value="mac" name="type">
									<input type="hidden" value="{{$mac->id}}" name="id">
									<input type="hidden" value="{{$mac->name}}" name="name">
									<input type="hidden" value="{{$mac->price}}" name="price">
									<input type="hidden" value="1" name="quantity">
									<input type="hidden" value="{{$mac->picture}}" name="picture">
									<button type="submit" class="btn_hover">
										Add to cart
									</button>
								</form>
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="/mac-{{$mac->id}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<strong>{{$mac->name}}</strong>
								</a>

								<span class="stext-105 cl3">
									${{$mac->price}}
								</span>
							</div>
						</div>

					</div>

				</div>
				@endforeach
			</div>

		</div>
	</div>


	<!-- Footer -->
	@include('fontend.includes.footer')


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>




	<!--===============================================================================================-->
	<script src="../fontend/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../fontend/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../fontend/vendor/bootstrap/js/popper.js"></script>
	<script src="../fontend/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../fontend/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="../fontend/vendor/daterangepicker/moment.min.js"></script>
	<script src="../fontend/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../fontend/vendor/slick/slick.min.js"></script>
	<script src="../fontend/js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="../fontend/vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="../fontend/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="../fontend/vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="../fontend/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="../fontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="../fontend/js/main.js"></script>

</body>

</html>