 <!-- Main content -->
 <section class="cart bgwhite p-t-70 p-b-100">
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-md-3">
 				<?php if ($flash) : ?>
 					<div class="text-success font-weight-bold"><?php echo $flash; ?></div>
 				<?php endif; ?>
 			</div>
 		</div>
 	</div>

 	<!-- Page Wrapper -->
 	<div>
 		<!-- Content Wrapper -->
 		<div id="content-wrapper" class="d-flex flex-column">

 			<!-- Main Content -->
 			<div id="content">
 				<!-- Begin Page Content -->
 				<div class="container-fluid">

 					<!-- Page Heading -->
 					<div class="d-sm-flex align-items-center justify-content-between mb-4">

 					</div>

 					<!-- Content Row -->
 					<div class="row">

 						<!-- Order Card Example -->
 						<div class="col-xl-3 col-md-6 mb-4">
 							<div class="card border-left-primary shadow h-100 py-2">
 								<div class="card-body">
 									<div class="row no-gutters align-items-center">
 										<div class="col mr-2">
 											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
 												History Order</div>
 											<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_order; ?></div>
 										</div>
 										<div class="col-auto">
 											<i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
 										</div>
 									</div>
 									<div class="mt-2">
 										<a href="<?php echo base_url('order'); ?>" class="text-xs font-weight-bold text-primary text-uppercase mt-4">
 											View
 											<i class="fas fa-arrow-right fa-1x text-gray ml-3"></i>
 										</a>
 									</div>
 								</div>
 							</div>
 						</div>

 						<!-- Order Card Example -->
 						<div class="col-xl-3 col-md-6 mb-4">
 							<div class="card border-left-info shadow h-100 py-2">
 								<div class="card-body">
 									<div class="row no-gutters align-items-center">
 										<div class="col mr-2">
 											<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
 												Order in Process</div>
 											<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_process_order; ?></div>
 										</div>
 										<div class="col-auto">
 											<i class="fas fa-box fa-2x text-gray-300"></i>
 										</div>
 									</div>
 									<div class="mt-2">
 										<a href="" class="text-xs font-weight-bold text-primary text-uppercase mt-4">
 											View
 											<i class="fas fa-arrow-right fa-1x text-gray ml-3"></i>
 										</a>
 									</div>
 								</div>
 							</div>
 						</div>

 						<!-- Order Card Example -->
 						<div class="col-xl-3 col-md-6 mb-4">
 							<div class="card border-left-warning shadow h-100 py-2">
 								<div class="card-body">
 									<div class="row no-gutters align-items-center">
 										<div class="col mr-2">
 											<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
 												Shippings</div>
 											<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_shipping_order; ?></div>
 										</div>
 										<div class="col-auto">
 											<i class="fas fa-shipping-fast fa-2x text-gray-300"></i>
 										</div>
 									</div>
 									<div class="mt-2">
 										<a href="" class="text-xs font-weight-bold text-primary text-uppercase mt-4">
 											View
 											<i class="fas fa-arrow-right fa-1x text-gray ml-3"></i>
 										</a>
 									</div>
 								</div>
 							</div>
 						</div>

 						<!-- Order Card Example -->
 						<div class="col-xl-3 col-md-6 mb-4">
 							<div class="card border-left-success shadow h-100 py-2">
 								<div class="card-body">
 									<div class="row no-gutters align-items-center">
 										<div class="col mr-2">
 											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
 												Delivered Order</div>
 											<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_delivered_order; ?></div>
 										</div>
 										<div class="col-auto">
 											<i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
 										</div>
 									</div>
 									<div class="mt-2">
 										<a href="" class="text-xs font-weight-bold text-primary text-uppercase mt-4">
 											View
 											<i class="fas fa-arrow-right fa-1x text-gray ml-3"></i>
 										</a>
 									</div>
 								</div>
 							</div>
 						</div>


 						<!-- Order Card Example -->
 						<div class="col-xl-3 col-md-6 mb-4">
 							<div class="card border-left-danger shadow h-100 py-2">
 								<div class="card-body">
 									<div class="row no-gutters align-items-center">
 										<div class="col mr-2">
 											<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
 												Cancelled Order</div>
 											<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_cancelled_order; ?></div>
 										</div>
 										<div class="col-auto">
 											<i class="fas fa-window-close fa-2x text-gray-300"></i>
 										</div>
 									</div>
 									<div class="mt-2">
 										<a href="" class="text-xs font-weight-bold text-primary text-uppercase mt-4">
 											View
 											<i class="fas fa-arrow-right fa-1x text-gray ml-3"></i>
 										</a>
 									</div>
 								</div>
 							</div>
 						</div>


 					</div>

 				</div>
 				<!-- /.container-fluid -->

 			</div>
 			<!-- End of Main Content -->

 </section>
