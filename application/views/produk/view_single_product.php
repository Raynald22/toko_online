<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
	<div class="flex-w flex-sb">
		<div class="w-size13 p-t-30 respon5">
			<div class="wrap-slick3 flex-sb flex-w">

				<div class="slick3">
					<div class="item-slick3" data-thumb="images/thumb-item-01.jpg">
						<div class="wrap-pic-w">
							<img src="<?= base_url() . 'assets/uploads/products/' . $product->picture_name ?>" alt="IMG-PRODUCT">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="w-size14 p-t-30 respon5">
			<h4 class="product-detail-name m-text20 p-b-13">
				<?= $product->name ?>
			</h4>

			<span class="m-text17">
				<?php if ($product->current_discount > 0) : ?>
					<span class="mr-2 price-dc"><strike><small>Rp
								<?php echo format_rupiah($product->price); ?></small></strike></span>
					<span class="price-sale text-success">Rp
						<?php echo format_rupiah($product->price - $product->current_discount); ?></span>
				<?php else : ?>
					<span>Rp <?php echo format_rupiah($product->price); ?></span>
				<?php endif; ?>
			</span>

			<h5 class="w-size14 p-t-10 mt-4">
				Stok : <?= $product->stock ?>
			</h5>

			<!--  -->
			<div class="p-t-33 p-b-60">
				<div class="flex-w p-t-10">
					<div class="w-size16 flex-m flex-w">
						<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
							<button type="button" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 quantity-left-minus btn" data-type="minus" data-field="">
								<i class="fs-12 fa fa-minus"></i>
							</button>

							<input class="size8 m-text18 t-center num-product quantity input-number form-control input-number" type="number" id="quantity" name="quantity" value="1" min="1" max="100">

							<button type="button" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 quantity-right-plus btn" data-type="plus" data-field="">
								<i class="fs-12 fa fa-plus"></i>
							</button>
						</div>

						<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
							<!-- Button -->

							<?php if ($product->stock > 0) : ?>
								<a href="#" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 mb-2 add-cart card-btn" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->current_discount > 0) ? ($product->price - $product->current_discount) : $product->price; ?>" data-id="<?php echo $product->id; ?>">Add to Cart</a>
							<?php else : ?>
								<a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 mb-2">
									Out of stock
								</a>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>

			<div class="p-b-45">
				<span class="s-text8">Categories: </span>
			</div>

			<!--  -->
			<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
				<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
					Description
					<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
					<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
				</h5>

				<div class="dropdown-content dis-none p-t-15 p-b-23">
					<p class="s-text8">
						<?= $product->description; ?>
					</p>
				</div>
			</div>

			<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
				<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
					Additional information
					<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
					<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
				</h5>

				<div class="dropdown-content dis-none p-t-15 p-b-23">
					<p class="s-text8">
						Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed
						velit. Proin gravida arcu nisl, a dignissim mauris placerat
					</p>
				</div>
			</div>

			<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
				<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
					Reviews (0)
					<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
					<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
				</h5>

				<div class="dropdown-content dis-none p-t-15 p-b-23">
					<p class="s-text8">
						Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed
						velit. Proin gravida arcu nisl, a dignissim mauris placerat
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Relate Product -->
<section class="relateproduct bgwhite p-t-45 p-b-138">
	<div class="container">
		<div class="sec-title p-b-60">
			<h3 class="m-text5 t-center">
				Related Products
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">

				<div class="item-slick2 p-l-15 p-r-15">
					<!-- Block2 -->
					<?php if (count($related_products) > 0) : ?>
						<?php foreach ($related_products as $product) : ?>
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<?php if ($product->current_discount > 0) : ?>
										<div class="block2-labelsale">

										</div>
									<?php endif; ?>
									<img src="<?= base_url() . '/uploads/products/' . $product->picture_name ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<?php if ($product->stock > 0) : ?>
												<a href="#" class="add-cart add-to-chart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 mb-2" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->current_discount > 0) ? ($product->price - $product->current_discount) : $product->price; ?>" data-id="<?php echo $product->id; ?>">Add to Cart</a>
											<?php else : ?>
												<a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 mb-2">
													Out of stock
												</a>
											<?php endif; ?>

											<?= anchor('shop/product/' . $product->id . '/' . $product->sku, '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 mb-2">
												Detail
											</button>') ?>

										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
										<?= $product->name ?>
									</a>
									<!--Jika ada diskon -->
									<?php if ($product->current_discount > 0) : ?>
										<span class="block2-oldprice m-text7 p-r-5">
											<!-- Price yang sebenarnya -->
											Rp <?php echo format_rupiah($product->price); ?>
										</span>

										<span class="block2-newprice m-text8 p-r-5">
											<!--Price setelah di diskon -->
											Rp <?php echo format_rupiah($product->price - $product->current_discount); ?>
										</span>
										<!--Jika tidak ada diskon -->
									<?php else : ?>
										<span class="block2-price p-r-5">
											<!--Jika ada diskon -->
											Rp <?php echo format_rupiah($product->price - $product->current_discount); ?>
										</span>
									<?php endif; ?>

									<span class="block2-name dis-block	 mt-1">
										Stok :
										<?= $product->stock ?>
									</span>

									<?php if ($product->current_discount > 0) : ?>
										<span class="block2-name dis-block s-text3 mt-1" style="color: red;">
											Discount <?php echo count_percent_discount($product->current_discount, $product->price, 0); ?>%
										</span>
									<?php endif; ?>


								</div>
							</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
			</div>
		</div>
	</div>
	</div>
	</div>

</section>

<script>
	$(document).ready(function() {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function(e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);
			$('.cart-btn').attr('data-qty', quantity + 1);

			// Increment

		});

		$('.quantity-left-minus').click(function(e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			// Increment
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
				$('.cart-btn').attr('data-qty', quantity - 1);
			}
		});

	});
</script>
