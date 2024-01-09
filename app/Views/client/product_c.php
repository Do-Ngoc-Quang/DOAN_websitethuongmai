<?php if (!empty($product) && is_array($product)) : ?>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<?php if (!empty($category) && is_array($category)) : ?>
						<?php foreach ($category as $category_item) : ?>
							<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?= esc($category_item['slug']) ?>">
								<?= esc($category_item['name_category']) ?>
							</button>
						<?php endforeach ?>
					<?php endif ?>

				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<form action="<?php echo base_url('/product_detail_c/search_product') ?>" method="POST">
						<?= csrf_field() ?>
						<div class="bor8 dis-flex p-l-15">
							<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search_product" placeholder="Search">
							<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" type="submit">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="row isotope-grid">
				<?php foreach ($product as $product_item) : ?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?= esc($product_item['slug_category']) ?>">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="<?= base_url('uploads/products/' . esc($product_item['img'])) ?>" alt="IMG-PRODUCT">

								<a href="<?php echo base_url('product_detail_c/') . esc($product_item['slug']) ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Detail View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="<?php echo base_url('product_detail_c/') . esc($product_item['slug']) ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?= esc($product_item['name_product']) ?>
									</a>

									<span class="stext-105 cl3">
										$<?= esc($product_item['price']) ?>
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="<?= base_url('client/assets/images/icons/icon-heart-01.png'); ?>" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?= base_url('client/assets/images/icons/icon-heart-02.png'); ?>" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>

<?php endif ?>