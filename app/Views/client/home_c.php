<?php if (!empty($product) && is_array($product)) : ?>
	<!-- Product -->
	<section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Store Overview
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link active" data-toggle="tab" href="#all" role="tab">All product</a>
					</li>
					<?php if (!empty($category) && is_array($category)) : ?>
						<?php foreach ($category as $category_item) : ?>
							<li class="nav-item p-b-10">
								<a class="nav-link" data-toggle="tab" href="#<?= esc($category_item['id']) ?>" role="tab"><?= esc($category_item['name_category']) ?></a>
							</li>
						<?php endforeach ?>
					<?php endif ?>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-50">
					<!-- - -->
					<div class="tab-pane fade show active" id="all" role="tabpanel">
						<!-- Slide2 -->
						<div class="wrap-slick2">
							<div class="slick2">
								<?php foreach ($product as $product_item) : ?>
									<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
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
													<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
						</div>
					</div>

					<!-- - -->
					<?php foreach ($category as $category_item) : ?>
						<div class="tab-pane fade" id="<?= esc($category_item['id']) ?>" role="tabpanel">
							<!-- Slide2 -->
							<div class="wrap-slick2">
								<div class="slick2">
									<?php foreach ($product as $product_item) : ?>
										<?php if ($product_item['slug_category'] == $category_item['slug']) : ?>
											<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
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
															<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
										<?php endif ?>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Blog -->
	<section class="sec-blog bg0 p-t-60 p-b-90">
		<div class="container">
			<div class="p-b-66">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Our Blogs
				</h3>
			</div>
			<div class="row">
				<?php if (!empty($blog) && is_array($blog)) : ?>
					<?php foreach ($blog as $blog_item) : ?>
						<div class="col-sm-6 col-md-4 p-b-40">
							<div class="blog-item">
								<div class="hov-img0">
									<a href="<?php echo base_url('blog_detail_c/') . esc($blog_item['id']) ?>">
										<img src="<?= base_url('uploads/blogs/' . esc($blog_item['img'])) ?>" alt="IMG-BLOG">
									</a>
								</div>
								<div class="p-t-15">
									<div class="stext-107 flex-w p-b-14">
										<span class="m-r-3">
											<span class="cl4">
												By
											</span>
											<?php if (!empty($user) && is_array($user)) : ?>
												<?php foreach ($user as $user_item) : ?>
													<?php if ($blog_item['auther'] ==  $user_item['user_name']) : ?>
														<span class="cl5">
															<?= esc($user_item['user_fullname']) ?>
														</span>
													<?php endif ?>
												<?php endforeach ?>
											<?php endif ?>
										</span>
										<span>
											<span class="cl4">
												on
											</span>

											<?php
											$createdAt = new DateTime($blog_item['created_at']);
											?>

											<span class="cl5">
												<?= esc($createdAt->format('F d, Y')); ?>
											</span>
										</span>
									</div>
									<h4 class="p-b-12">
										<a href="<?php echo base_url('blog_detail_c/') . esc($blog_item['id']) ?>" class="mtext-101 cl2 hov-cl1 trans-04">
											<?= esc($blog_item['title']) ?>
										</a>
									</h4>
									<p class="stext-108 cl6">
										<?= esc($blog_item['description']) ?>
									</p>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</section>
<?php endif ?>