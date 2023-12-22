<!-- Title page -->
<!-- <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Blog
	</h2>
</section> -->


<!-- Content page -->
<section class="bg0 p-t-62 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9 p-b-80">
				<div class="p-r-45 p-r-0-lg">

					<?php if (!empty($blog) && is_array($blog)) : ?>
						<?php foreach ($blog as $blog_item) : ?>
							<!-- item blog -->
							<div class="p-b-63">
								<a href="<?php echo base_url('blog_detail_c/') . esc($blog_item['id']) ?>" class="hov-img0 how-pos5-parent">
									<img src="<?= base_url('uploads/blogs/' . esc($blog_item['img'])) ?>" alt="IMG-BLOG">

									<div class="flex-col-c-m size-256 bg9 how-pos5">
										<?php
										$createdAt = new DateTime($blog_item['created_at']);
										?>

										<span class="ltext-107 cl2 txt-center">
											<?= esc($createdAt->format('d')); ?>
										</span>

										<span class="stext-109 cl3 txt-center">
											<?= esc($createdAt->format('F Y')); ?>
										</span>
									</div>
								</a>

								<div class="p-t-32">
									<h4 class="p-b-15">
										<a href="<?php echo base_url('blog_detail_c/') . esc($blog_item['id']) ?>" class="ltext-108 cl2 hov-cl1 trans-04">
											<?= esc($blog_item['title']) ?>
										</a>
									</h4>

									<p class="stext-117 cl6">
										<?= esc($blog_item['description']) ?>
									</p>

									<div class="flex-w flex-sb-m p-t-18">
										<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
											<?php if (!empty($user) && is_array($user)) : ?>
												<?php foreach ($user as $user_item) : ?>
													<?php if ($blog_item['auther'] ==  $user_item['user_name']) : ?>
														<span>
															<span class="cl4">By</span>
															<?= esc($user_item['user_fullname']) ?>
															<span class="cl12 m-l-4 m-r-6">|</span>
														</span>
													<?php endif ?>
												<?php endforeach ?>
											<?php endif ?>


											<?php if (!empty($category) && is_array($category)) : ?>
												<?php foreach ($category as $category_item) : ?>
													<?php if ($blog_item['category_id'] ==  $category_item['id']) : ?>
														<span>
															<?= esc($category_item['name_category']) ?>
															<span class="cl12 m-l-4 m-r-6">|</span>
														</span>
													<?php endif ?>
												<?php endforeach ?>
											<?php endif ?>


											<!-- Comment -->
											<?php $count = 0; ?>
											<?php if (!empty($comment) && is_array($comment)) : ?>
												<?php foreach ($comment as $comment_item) : ?>
													<?php if ($comment_item['blog_id'] ==  $blog_item['id']) : ?>
														<?php $count++ ?>
													<?php endif ?>
												<?php endforeach ?>
											<?php endif ?>
											<span>
												<?= esc($count) ?> Comments
											</span>
										</span>

										<a href="<?php echo base_url('blog_detail_c/') . esc($blog_item['id']) ?>" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
											Continue Reading

											<i class="fa fa-long-arrow-right m-l-9"></i>
										</a>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					<?php endif ?>

					<!-- Pagination -->
					<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
						<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
							1
						</a>

						<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
							2
						</a>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3 p-b-80">
				<div class="side-menu">
					<div class="bor17 of-hidden pos-relative">
						<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

						<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
					</div>

					<div class="p-t-55">
						<h4 class="mtext-112 cl2 p-b-33">
							Categories
						</h4>

						<ul>
							<?php if (!empty($category) && is_array($category)) : ?>
								<?php foreach ($category as $category_item) : ?>
									<li class="bor18">
										<a href="<?php echo base_url('product_c') ?>" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
											<?= esc($category_item['name_category']) ?>
										</a>
									</li>
								<?php endforeach ?>
							<?php endif ?>
						</ul>
					</div>

					<div class="p-t-65">
						<h4 class="mtext-112 cl2 p-b-33">
							Latest Products
						</h4>

						<ul>
							<?php $i = 0 ?>
							<?php foreach ($product as $product_item) : ?>
								<?php if ($i < 3) : ?>
									<li class="flex-w flex-t p-b-30">
										<a href="<?php echo base_url('product_detail_c/') . esc($product_item['slug']) ?>" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
											<img src="<?= base_url('uploads/products/' . esc($product_item['img'])) ?>" style="width: 100px; height: 100px;" alt="PRODUCT">
										</a>

										<div class="size-215 flex-col-t p-t-8">
											<a href="<?php echo base_url('product_detail_c/') . esc($product_item['slug']) ?>" class="stext-116 cl8 hov-cl1 trans-04">
												<?= esc($product_item['name_product']) ?> 
											</a>

											<span class="stext-116 cl6 p-t-20">
												$<?= esc($product_item['price']) ?>
											</span>
										</div>
									</li>
									<?php $i++ ?>
								<?php endif ?>
							<?php endforeach ?>
						</ul>
					</div>

					<!-- <div class="p-t-55">
						<h4 class="mtext-112 cl2 p-b-20">
							Archive
						</h4>

						<ul>
							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										July 2018
									</span>

									<span>
										(9)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										June 2018
									</span>

									<span>
										(39)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										May 2018
									</span>

									<span>
										(29)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										April 2018
									</span>

									<span>
										(35)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										March 2018
									</span>

									<span>
										(22)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										February 2018
									</span>

									<span>
										(32)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										January 2018
									</span>

									<span>
										(21)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										December 2017
									</span>

									<span>
										(26)
									</span>
								</a>
							</li>
						</ul>
					</div> -->

					<!-- <div class="p-t-50">
						<h4 class="mtext-112 cl2 p-b-27">
							Tags
						</h4>

						<div class="flex-w m-r--5">
							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Fashion
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Lifestyle
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Denim
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Streetstyle
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Crafts
							</a>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>