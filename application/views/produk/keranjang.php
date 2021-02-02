	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url() ?>assets/images/sepatu.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1">No.</th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Subtotal</th>
						</tr>

						<tr class="table-row">
						<?php
						$no=1;
						foreach ($this->cart->contents() as $items) : ?>
							<td class="column-1">
								<?= $no++ ?>
							</td>
							<td class="column-2"><?= $items['name'] ?></td>
							<td class="column-3">Rp.<?= number_format($items['price'], 0,',','.')  ?></td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="<?= $items['qty'] ?>">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">Rp.<?= number_format($items['subtotal'], 0,',','.')  ?></td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<a href="<?= base_url('dashboard/hapus_keranjang') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" style="background-color: #bb2124;">
						Delete Cart
					</a>
				</div>

				<div class="size12 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<a href="<?= base_url('dashboard') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Continue to shop
					</a>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
				<?php
				$no=1;
				foreach ($this->cart->contents() as $items) : ?>
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						Rp.<?= number_format($items['subtotal'], 0,',','.')  ?>
					</span>
				<?php endforeach; ?>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						Rp.<?= number_format($this->cart->total(), 0,',','.')  ?>
					</span>
				</div>
				<div class="size15 trans-0-4 mb-5">
					<!-- Button -->
					<a href="<?= base_url('dashboard/pembayaran') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</a>
				</div>
			</div>
		</div>
	</section>


