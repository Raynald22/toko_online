<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url() ?>assets/images/sepatu.jpg);">
		<h2 class="l-text2 t-center">
			Checkout
		</h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
	<div class="row">
		<div class="col-md-2">

		</div>
		
		<div class="col-md-8">
			<div class="text-success">
				<!-- Untuk mengambil total  -->
				<?php
				$grand_total = 0;
				// Apabila ada isinya
				if ($keranjang = $this->cart->contents()) 
				{
					foreach ($keranjang as $item)
					{
						$grand_total = $grand_total + $item['subtotal'];
					}
					echo "<h4>Your total cart : Rp.".number_format($grand_total,0,',','.');
				?>
			</div>
			<br>
			<br>
			<h3 class="mb-3">Input alamat pengiriman dan pembayaran</h3>
			<form  action="<?php echo base_url('dashboard/proses_pesanan');?>" method="post">
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input class="form-control" type="text" name="nama" placeholder="Nama Lengkap Anda">
				</div>

				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input class="form-control" type="text" name="alamat" placeholder="Alamat Lengkap Anda">
				</div>

				<div class="form-group">
					<label>No. Telp</label>
					<input class="form-control" type="tel" name="no_telp" placeholder="Nomor Telepon Anda">
				</div>

				<div class="form-group">
					<label>Jasa Pengiriman</label>
					<select class="form-control">
						<option>JNE</option>
						<option>TIKI</option>
						<option>Pos Indonesia</option>
						<option>Gojek</option>
					</select>
				</div>

				<div class="form-group mb-5">
					<label>Pilih Bank</label>
					<select class="form-control">
						<option>BCA - XXXXXXXXX</option>
						<option>BRI - XXXXXXXXX</option>
						<option>MANDIRI - XXXXXXXXX</option>
						<option>BNI - XXXXXXXXX</option>
					</select>
				</div>

				<div class="size15 trans-0-4 mb-5">
					<!-- Button -->
					<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Checkout
					</button>
				</div>
			</form>
			<?php
			}else{
				echo '<div class="content-container">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="main-content">
								<div class="commerce">
									<h3 class="t-center mb-2">Your cart is currently empty.</h3>
									<h6 class="t-center mb-2">Add something that makes u happy.</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
			}
			?>
		</div>

		<div class="col-md-2">
			
		</div>
	</div>
</div>
</section>
