<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="#" class="stext-109 cl8 hov-cl1 trans-04">
			Blog
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="#" class="stext-109 cl8 hov-cl1 trans-04">
			Blog-detail
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
	</div>
</div>

<!-- Content page -->
<?php if (!empty($blog) && is_array($blog)) : ?>
	<?php foreach ($blog as $blog_item) : ?>
		<?php if (!empty($id_par) && $id_par == $blog_item['id']) : ?>
			<section class="bg0 p-t-52 p-b-20">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-lg-9 p-b-80">
							<div class="p-r-45 p-r-0-lg">
								<!--  -->
								<div class="wrap-pic-w how-pos5-parent">
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
								</div>

								<div class="p-t-32">
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
									<h4 class="ltext-109 cl2 p-b-28">
										<?= esc($blog_item['title']) ?>
									</h4>
									<p class="stext-117 cl6 p-b-26">
										<?= esc($blog_item['detail']) ?>
									</p>
								</div>

								<hr>
								<?php if (!empty($comment) && is_array($comment)) : ?>
									<?php foreach ($comment as $comment_item) : ?>
										<?php if ($comment_item['blog_id'] ==  $blog_item['id']) : ?>

											<div class="flex-w flex-t p-b-68">
												<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
													<img src="<?= base_url('client/assets/images/avatar-comment.png'); ?>" alt="AVATAR">
												</div>
												<div class="size-207">
													<div class="flex-w flex-sb-m p-b-17">
														<span class="mtext-107 cl2 p-r-20">
															<?= esc($comment_item['name']) ?>
														</span>
														<?php
														$createdAt = new DateTime($comment_item['created_at']);
														?>
														<span class="stext-109 cl3 txt-center">
															<?= esc($createdAt->format('d F Y')); ?>
														</span>
													</div>
													<p class="stext-102 cl6">
														<?= esc($comment_item['cmt']) ?>
													</p>
												</div>
											</div>
											<hr>
										<?php endif ?>
									<?php endforeach ?>
								<?php endif ?>

								<!--  -->
								<div class="p-t-40">
									<h5 class="mtext-113 cl2 p-b-12">
										Leave a Comment
									</h5>
									<p class="stext-107 cl6 p-b-40">
										Your email address will not be published. Required fields are marked *
									</p>
									<form action="<?php echo base_url('/blog_detail_c/comment') ?>" method="POST">
										<?= csrf_field() ?>
										<div class="bor19 m-b-20">
											<textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="cmt" placeholder="Comment..."></textarea>
										</div>
										<div class="bor19 size-218 m-b-20">
											<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="name" placeholder="Name *">
										</div>
										<div class="bor19 size-218 m-b-20">
											<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="email" placeholder="Email *">
										</div>
										<input type="hidden" name="blog_id" value="<?= esc($blog_item['id']) ?>">
										<input type="hidden" name="created_at" value="<?= date('Y-m-d'); ?>">
										<button class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
											Post Comment
										</button>
									</form>
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
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif ?>
	<?php endforeach ?>
<?php endif ?>