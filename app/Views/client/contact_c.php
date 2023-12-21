<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
	<h2 class="ltext-105 cl0 txt-center" style="color: black;">
		Contact
	</h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-30 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<form action="<?php echo base_url('contact_c') ?>" method="POST">
					<?= csrf_field() ?>
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Send Us A Message
					</h4>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
						<img class="how-pos4 pointer-none" src="<?= base_url('client/assets/images/icons/icon-email.png'); ?>" alt="ICON">
					</div>

					<div class="bor8 m-b-30">
						<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
					</div>

					<input type="hidden" name="created_at" value="<?= date('Y-m-d'); ?>">

					<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
						Submit
					</button>
				</form>
			</div>

			<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-map-marker"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Address
						</span>

						<p class="stext-115 cl6 size-213 p-t-18">
							Ho Chi Minh College of Economics, Viet Nam
						</p>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-phone-handset"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Lets Talk
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							+84 393939393
						</p>
					</div>
				</div>

				<div class="flex-w w-full">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-envelope"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Sale Support
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							contact@cozastore.com
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Map -->
<div class="map">
	<!-- <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div> -->
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6053207084037!2d106.67075587480468!3d10.764870089383216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10bef3c07%3A0xfd59127e8c2a3e0!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEtpbmggVOG6vyBUUC5IQ00!5e0!3m2!1svi!2s!4v1703144284913!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>