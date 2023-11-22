<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cart</title>
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

	<!-- Shoping Cart -->
	<!-- <form class="bg0 p-t-75 p-b-85"> -->
	<h3 class="text-center mt-3 mb-3">Cart</h3>

	@if(session('success'))
	<div class="alert alert-success text-center">{{session('success')}}</div>
	@endif

	<div class="container mt-5">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2"></th>
								<th class="column-3">Price</th>
								<th class="column-4 col-1">Quantity</th>
								<th class="column-5 col-1">Total</th>
								<th class="column-6 col-1">Action</th>
							</tr>
							@php
							$total = 0;
							@endphp
							@foreach($carts as $cart)
							<tr class="table_row">
								<td class="column-1">
									<div class="how-itemcart1">
										<img src="{{ asset('storage/' . $cart->picture) }}" alt="IMG">
									</div>
								</td>
								<td class="column-2">{{$cart->name}}</td>
								<td class="column-3">$ {{$cart->price}}</td>
								<td class="column-4">
									<div class="wrap-num-product flex-w m-l-auto m-r-0">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$cart->quantity}}">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
								</td>
								<td class="column-5">$ {{(int)$cart->price * (int)$cart->quantity}}</td>
								<td class="column-6">
									<form action="/cart-delete-{{$cart->id}}" method="POST">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-outline-danger" data-bs-dismiss="modal">Delete</button>
									</form>
								</td>

							</tr>
							@php
							$total = $total + (int)$cart->price * (int)$cart->quantity
							@endphp
							@endforeach
						</table>
					</div>

					<!-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

							<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								Apply coupon
							</div>
						</div>

						<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							Update Cart
						</div>
					</div> -->
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Order
					</h4>
					<form action="/order.add" method="POST">
						@csrf
						<div class="mb-3">
							<input type="text" name="name" value="" class="form-control" placeholder="Enter your name ..." />
						</div>
						<div class="mb-3">
							<input type="email" name="email" value="" class="form-control" placeholder="Enter your email ..." />
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									$ <span style="color: red; font-size:x-large">{{$total}}</span>
								</span>
							</div>
						</div>

						<textarea style="display: none;" name="content" id="content" cols="30" rows="10">
						@foreach($carts as $cart)
							ID: {{$cart->id}} - {{$cart->name}} - Price {{$cart->price}} - Quantity: {{$cart->quantity}}
						@endforeach
						</textarea>
						<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Sent to Order
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- </form> -->

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
	<script src="../fontend/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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