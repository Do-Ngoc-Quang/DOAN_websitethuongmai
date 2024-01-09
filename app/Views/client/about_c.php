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
				<?php if ($index == 1) $index = 0 ?>
			<?php endforeach ?>

		</div>
	</section>
<?php endif ?>