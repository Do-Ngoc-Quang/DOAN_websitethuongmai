<!-- Title page -->
<!-- <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			About
		</h2>
	</section>	 -->


<!-- Content page -->
<?php if (!empty($about) && is_array($about)) : ?>
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">

			<?php foreach ($about as $about_item) : ?>
				<?php $index = 0 ?>
				<div class="row p-b-148">
					<div class="col-md-7 col-lg-8">
						<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
							<h3 class="mtext-111 cl2 p-b-16">
								<?= esc($about_item['title']) ?>
							</h3>

							<p class="stext-113 cl6 p-b-26">
								<?= esc($about_item['description']) ?>
							</p>

						</div>
					</div>

					<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
						<div class="how-bor1 ">
							<div class="hov-img0">
								<img src="<?= base_url('uploads/abouts/' . esc($about_item['img'])) ?>" alt="IMG">
							</div>
						</div>
					</div>
				</div>
				<?php if($index == 1) $index = 0 ?>
			<?php endforeach ?>

			<!-- <div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Mission
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Mauris non lacinia magna. Sed nec lobortis dolor. Vestibulum rhoncus dignissim risus, sed consectetur erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam maximus mauris sit amet odio convallis, in pharetra magna gravida. Praesent sed nunc fermentum mi molestie tempor. Morbi vitae viverra odio. Pellentesque ac velit egestas, luctus arcu non, laoreet mauris. Sed in ipsum tempor, consequat odio in, porttitor ante. Ut mauris ligula, volutpat in sodales in, porta non odio. Pellentesque tempor urna vitae mi vestibulum, nec venenatis nulla lobortis. Proin at gravida ante. Mauris auctor purus at lacus maximus euismod. Pellentesque vulputate massa ut nisl hendrerit, eget elementum libero iaculis.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
							</p>

							<span class="stext-111 cl8">
								- Steve Job’s
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/about-02.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</section>
<?php endif ?>