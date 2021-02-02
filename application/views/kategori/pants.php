	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?= base_url() ?>assets/images/sepatu.jpg);">
		<h2 class="l-text2 t-center">
			Shoes
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Shoes Collection 2021
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">
								<a href="<?= base_url('produk') ?>" class="s-text13 active1">
									All
								</a>
							</li>

							<li class="p-t-4">
								<a href="<?= base_url('kategori/sepatu') ?>" class="s-text13">
									Shoes
								</a>
							</li>

							<li class="p-t-4">
								<a href="<?= base_url('kategori/hoodie') ?>" class="s-text13">
									Hoodie
								</a>
							</li>

							<li class="p-t-4">
								<a href="<?= base_url('kategori/tshirt') ?>" class="s-text13">
									T-Shirt
								</a>
							</li>

							<li class="p-t-4">
								<a href="<?= base_url('kategori/pants') ?>" class="s-text13">
									Pants
								</a>
							</li>
						</ul>

					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Default Sorting</option>
									<option>Popularity</option>
									<option>Price: low to high</option>
									<option>Price: high to low</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Price</option>
									<option>$0.00 - $50.00</option>
									<option>$50.00 - $100.00</option>
									<option>$100.00 - $150.00</option>
									<option>$150.00 - $200.00</option>
									<option>$200.00+</option>

								</select>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
					</div>

					<!-- Product -->
					<div class="row">
					<?php foreach ($pants as $brg) : ?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50 h-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?= base_url(). '/uploads/'.$brg->gambar ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<?= anchor('dashboard/tambah_ke_keranjang/'.$brg->id_barang, '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 mb-2">
												Add to Cart
											</button>') ?> 

											<?= anchor('produk/detail/'.$brg->id_barang, '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 mb-2">
												Detail
											</button>') ?> 
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
										<?= $brg->nama_barang ?>
									</a>

									<span class="block2-price p-r-5">
										Rp. <?= number_format($brg->harga, 0,',','.')  ?>
									</span>
									<span class="block2-price m-text6 p-r-5 ml-5">
										Stok :
										<?= $brg->stok ?>
									</span>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	</section>


	