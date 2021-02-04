	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(<?= base_url() ?>assets/images/sepatu.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<?php if (count($carts) > 0) : ?>
				<form action="<?php echo site_url('shop/checkout'); ?>" method="POST">
					<!-- Cart item -->
					<div class="container-table-cart pos-relative">
						<div class="wrap-table-shopping-cart bgwhite">
							<table class="table-shopping-cart">
								<tr class="table-head">
									<th class="column-1">No.</th>
									<th class="column-2">Product</th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Subtotal</th>
								</tr>


								<?php
								foreach ($carts as $item) : ?>
									<tbody class="table-row">
										<tr class="cart-<?php echo $item['rowid']; ?>">
											<td class="column-1 product-remove"><a href="#" class="remove-item" data-rowid="<?php echo $item['rowid']; ?>"><i class="fa fa-trash"></i></a></td>
											<td class="column-2 product-name"><?= $item['name'] ?></td>
											<td class="column-3 price">Rp.<?= number_format($item['price'], 0, ',', '.')  ?></td>
											<td class="column-4 quantity">
												<div class="flex-w bo5 of-hidden w-size17 input-group">
													<input class="size8 m-text18 t-center num-product quantity input-number" type="number" name="quantity[<?php echo $item['rowid']; ?>]" value="<?php echo $item['qty']; ?>" min="1" max="100">
												</div>
											</td>
											<td class="column-5 total">Rp.<?= number_format($item['subtotal'], 0, ',', '.')  ?></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
							</table>
						</div>
					</div>

					<div class="flex-w flex-sb-m p-t-25 p-b-120 bo8 p-l-35 p-r-60 p-lr-15-sm">

						<div class="flex-w flex-m w-full-sm cart-wrap ftco-animate">
							<div class="size11 bo4 m-r-10">
								<input class="form-control sizefull s-text7 p-l-22 p-r-22" type="text" id="code" name="coupon_code" placeholder="Coupon Code">
								<label for="code"></label>
								<p class="s-text8 flex-w p-t-2 p-b-20">
									Punya kode kupon? Gunakan kupon kamu untuk mendapatkan potongan harga menarik
								</p>
							</div>
						</div>

						<div class="size12 trans-0-4 m-t-10 m-b-10">
							<!-- Button -->
							<a href="<?= base_url('dashboard') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Continue to shop
							</a>
						</div>
						<div class="size12 trans-0-4 m-t-10 m-b-10">
							<!-- Button -->
							<button href="<?= base_url('shop/cart') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" value="update">
								Update
							</button>

						</div>

					</div>

					<!-- Total -->
					<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm cart-total">
						<h5 class="m-text20 p-b-24">
							Cart Totals
						</h5>

						<!--  -->
						<div class="flex-w flex-sb-m p-b-12">
							<span class="s-text18 w-size19 w-full-sm n-subtotal">
								Subtotal:
							</span>

							<span class="m-text21 w-size20 w-full-sm n-subtotal">
								Rp <?php echo format_rupiah($total_cart); ?>
							</span>
						</div>

						<div class="flex-w flex-sb-m p-b-12">
							<span class="s-text18 w-size19 w-full-sm">
								Biaya pengiriman
							</span>

							<span class="m-text21 w-size20 w-full-sm n-subtotal">
								<?php if ($total_cart >= get_settings('min_shop_to_free_shipping_cost')) : ?>
									<span class="n-ongkir font-weight-bold">Gratis</span>
								<?php else : ?>
									<span class="n-ongkir font-weight-bold">Rp
										<?php echo format_rupiah(get_settings('shipping_cost')); ?></span>
								<?php endif; ?>
							</span>
						</div>


						<!--  -->
						<div class="flex-w flex-sb-m p-t-26 p-b-30">
							<span class="m-text22 w-size19 w-full-sm total-price">
								Total:
							</span>

							<span class="m-text21 w-size20 w-full-sm n-total">
								Rp <?php echo format_rupiah($total_price); ?>
							</span>
						</div>
						<div class="size15 trans-0-4 mb-5">
							<!-- Button -->
							<button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 btn btn-primary">
								Proceed to Checkout
							</button>
						</div>
					</div>
				</form>
			<?php else : ?>
				<div class="row">
					<div class="col-md-12 ftco-animate">
						<div class="alert alert-info">Your cart is currently empty
							<br>
							<?php echo anchor('produk', 'Add something'); ?> that makes u happy ^^
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>


	<script>
		$('.remove-item').click(function(e) {
			e.preventDefault();

			var rowid = $(this).data('rowid');
			var tr = $('.cart-' + rowid);

			$('.product-name', tr).html('<i class="fa fa-spin fa-spinner"></i> Deleting...');

			$.ajax({
				method: 'POST',
				url: '<?php echo site_url('shop/cart_api?action=remove_item'); ?>',
				data: {
					rowid: rowid
				},
				success: function(res) {
					if (res.code == 204) {
						tr.addClass('alert alert-danger');

						setTimeout(function(e) {
							tr.hide('fade');

							$('.n-subtotal').text(res.total.subtotal);
							$('.n-ongkir').text(res.total.ongkir);
							$('.n-total').text(res.total.total);
						}, 2000);
					}
				}
			})
		})
	</script>

	<script>
		window.onbeforeunload = function() {
			$('.back').submit();
			return redirect('shop/cart');
		};
	</script>

	<script>
		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}

		$.ajax({
			method: 'GET',
			url: '<?php echo site_url('shop/cart_api?action=cart_info'); ?>',
			success: function(res) {
				var data = res.data;

				var total_item = data.total_item;
				$('.cart-item-total').text(total_item);
			}
		});

		$('.add-cart').click(function(e) {
			e.preventDefault();

			var id = $(this).data('id');
			var sku = $(this).data('sku');
			var qty = $(this).data('qty');
			qty = (qty > 0) ? qty : 1;
			var price = $(this).data('price');
			var name = $(this).data('name');

			$.ajax({
				method: 'POST',
				url: '<?php echo site_url('shop/cart_api?action=add_item'); ?>',
				data: {
					id: id,
					sku: sku,
					qty: qty,
					price: price,
					name: name
				},
				success: function(res) {
					if (res.code == 200) {
						var totalItem = res.total_item;

						$('.cart-item-total').text(totalItem);
						toastr.info('Item ditambahkan dalam keranjang');
					} else {
						console.log('Terjadi kesalahan');
					}
				}
			});
		});
	</script>
