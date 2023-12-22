
<?php if (!empty($order_success)) : ?>
	<div class="alert alert-success text-center"><?= esc($order_success) ?></div>
<?php endif ?>

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="#" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span class="stext-109 cl4">
			Shoping Cart
		</span>
	</div>
</div>

<?php if (!empty($error_quantity)) : ?>
	<div class="alert alert-danger text-center">
		<?= esc($error_quantity) ?>
		<?php if (!empty($slug_product)) : ?>
			<?php foreach ($product as $product_item) : ?>
				<?php if ($slug_product == $product_item['slug']) : ?>
					<strong><?= esc($product_item['name_product']) ?></strong>
				<?php endif ?>
			<?php endforeach ?>
		<?php endif ?> is 
		<?php if (!empty($available_quantity)) : ?><?= esc($available_quantity) ?><?php endif ?>
	</div>
<?php endif ?>

<!-- Shoping Cart -->
<div class="container">

	<?php if (!empty($cart) && is_array($cart)) : ?>
		<?php $total = 0; ?>
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2"></th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
								<th></th>
							</tr>
							<?php $sub_total = 0; ?>
							<?php foreach ($cart as $cart_item) : ?>
								<?php foreach ($product as $product_item) : ?>
									<?php if ($cart_item['id_product'] == $product_item['id']) : ?>

										<tr class="table_row">
											<td class="column-1">
												<div class="how-itemcart1">
													<img src="<?= base_url('uploads/products/' . esc($product_item['img'])) ?>" alt="IMG">
												</div>
											</td>
											<td class="column-2"><?= esc($product_item['name_product']) ?></td>
											<td class="column-3">$ <?= esc($product_item['price']) ?></td>
											<form action="<?php echo base_url('shoping_cart_c/update_cart_c/' . $cart_item['id_product']) ?>" method="POST">
												<?= csrf_field() ?>
												<td class="column-4">
													<div class="wrap-num-product flex-w m-l-auto m-r-0">
														<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
															<i class="fs-16 zmdi zmdi-minus"></i>
														</div>

														<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="<?= esc($cart_item['quantity']) ?>">

														<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
															<i class="fs-16 zmdi zmdi-plus"></i>
														</div>
													</div>
												</td>
												<?php
												$into_money =  intval($cart_item['quantity']) * floatval($product_item['price']);
												$sub_total += $into_money;
												?>
												<td class="column-5">$ <?= esc($into_money) ?></td>
												<td style="padding-right: 15px;">

													<button type="submit" class="btn">
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
															<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
															<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
														</svg>
													</button>
											</form>
											<hr>
											<form action="<?php echo base_url('shoping_cart_c/delete_cart_c/' . $cart_item['id_product']) ?>" method="POST">
												<?= csrf_field('') ?>
												<button type="submit" class="btn">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
														<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
														<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
													</svg>
												</button>
											</form>
											</td>
										</tr>
									<?php endif ?>
								<?php endforeach ?>
							<?php endforeach ?>
						</table>
					</div>

					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

							<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								Apply coupon
							</div>
						</div>

						<!-- <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div> -->
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<form action="<?php echo base_url('shoping_cart_c/order') ?>" method="POST">
					<?= csrf_field() ?>
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<!-- This is content of order -->

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									$ <?= esc($sub_total) ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="p-r-18 p-r-0-sm w-full-ssm">
								<div class="p-t-5">
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="method_payment">
											<option>Select a method payment ...</option>
											<option>COD</option>
											<option>Banking</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Name">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone_number" placeholder="Phone number">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" placeholder="Email">
									</div>

									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2" style="color: red">
									$ <?= esc($sub_total) ?> Updating
								</span>
							</div>
						</div>

						<input type="hidden" name="total" value="<?= $sub_total ?>">
						<input type="hidden" name="created_at" value="<?= date('Y-m-d'); ?>">

						<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Order this cart
						</button>
					</div>
				</form>
			</div>
		</div>
	<?php endif ?>
</div>