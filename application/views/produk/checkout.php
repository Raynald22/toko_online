<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
	style="background-image: url(<?= base_url() ?>assets/images/sepatu.jpg);">
	<h2 class="l-text2 t-center">
		Checkout
	</h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<form action="<?php echo site_url('shop/checkout/order'); ?>" method="POST">
			<div class="row">
				<div class="col-md-7">
					<h3 class="mb-4 billing-heading">Alamat Pengiriman</h3>

					<div class="form-group">
						<label for="name" class="form-control-label">Pengiriman untuk (nama):</label>
						<input type="text" name="name" value="<?php echo $customer->name; ?>" class="form-control"
							id="name" required>
					</div>

					<div class="form-group">
						<label for="hp" class="form-control-label">No. HP:</label>
						<input type="text" name="phone_number" value="<?php echo $customer->phone_number; ?>"
							class="form-control" id="hp" required>
					</div>

					<div class="form-group">
						<label for="address" class="form-control-label">Alamat:</label>
						<textarea name="address" class="form-control" id="address"
							required><?php echo $customer->address; ?></textarea>
					</div>

					<div class="form-group">
						<label for="note" class="form-control-label">Catatan:</label>
						<textarea name="note" class="form-control" id="note"></textarea>
					</div>
				</div>

				<div class="col-md-4 ml-5">
					<div class="cart-detail cart-total">
						<h3 class="billing-heading mb-4">Rincian Belanja</h3>
						<p class="d-flex mb-2">
							<span class="mr-2">Subtotal</span>
							<span class="mr-2"> : </span>
							<span>Rp <?php echo format_rupiah($subtotal); ?></span>
						</p>
						<p class="d-flex mb-2">
							<span class="mr-2">Ongkos kirim</span>
							<span class="mr-2"> : </span>
							<span><?php echo $ongkir; ?></span>
						</p>
						<p class="d-flex">
							<span class="mr-2">Kupon</span>
							<span class="mr-2"> : </span>
							<span><?php echo $discount; ?></span>
						</p>
						<hr>
						<p class="d-flex total-price">
							<span>Total</span>
							<span>Rp <?php echo format_rupiah($total); ?></span>
						</p>
					</div>

					<div class="cart-detail pt-5">
						<h3 class="billing-heading mb-4">Metode Pembayaran</h3>
						<div class="form-group">
							<div class="col-md-12">
								<div class="radio">
									<label><input type="radio" name="payment" class="mr-2" value="1"> 
									Transfer bank
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<div class="radio">
									<label><input type="radio" name="payment" class="mr-2" value="2" checked>
										Bayar ditempat
									</label>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group text-left" style="margin-top: 10px;">
						<input type="submit" class="btn btn-primary py-2 px-2 flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" value="Buat Pesanan">
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
