<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Product</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_products; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Pelanggan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_customers; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								Pesanan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_order; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								Pendapatan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo format_rupiah($total_income); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<!-- Basic Card Example -->
		<div class="col-md-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">New Customer</h6>
				</div>
				<div class="card-body">
					<!-- List group -->
					<ul class="list-group list-group-flush list">
						<?php foreach ($customers as $customer) : ?>
							<li class="list-group-item px-0">
								<div class="row align-items-center">
									<div class="col-auto">
										<!-- Avatar -->
										<a href="#" class="avatar rounded-circle">
											<img alt="Pict Profile" class="img-profile rounded-circle" style="width: 48px" src="<?php echo base_url('assets/uploads/users/' . $customer->profile_picture); ?>">
										</a>
									</div>
									<div class="col ml-2">
										<p class="mb-0">
											<a href="#!"><?php echo $customer->name; ?></a>
										</p>
									</div>
									<div class="col-auto">
										<a href="<?php echo site_url('admin/customers/view/' . $customer->id); ?>" class="btn btn-sm btn-primary">Profil</a>
									</div>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- Basic Card Example -->
		<div class="col-md-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Awaiting Payments</h6>
				</div>
				<div class="card-body">
					<!-- List group -->
					<ul class="list-group list-group-flush list my--3">
						<?php foreach ($payments as $payment) : ?>
							<li class="list-group-item px-0">
								<div class="row align-items-center">
									<div class="col">
										<h5>Order #<?php echo $payment->order_number; ?></h5>
										<div>
											Rp <?php echo format_rupiah($payment->payment_price); ?>
										</div>
									</div>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<!-- Card New Order -->
	<div class="py-2">
		<!-- Basic Card Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">New Order</h6>
			</div>
			<div class="card-body">
				<ul class="list-group list-group-flush" data-toggle="checklist">
					<?php foreach ($orders as $order) : ?>
						<li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">
							<div class="checklist-item checklist-item-info">
								<div class="checklist-info">
									<h5 class="checklist-title mb-0"><?php echo anchor('admin/orders/view/' . $order->id, 'Order #' . $order->order_number); ?></h5>
									<small><?php echo $order->total_items; ?></small> | <small>Rp <?php echo format_rupiah($order->total_price); ?></small>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- End Card New Order -->
</div>






<script src="<?php echo base_url('assets/asset_admin/vendor/chart.js/Chart.min.js', 'argon'); ?>"></script>
<script>
	//
	// Charts
	//

	'use strict';

	var Charts = (function() {

		// Variable

		var $toggle = $('[data-toggle="chart"]');
		var mode = 'light'; //(themeMode) ? themeMode : 'light';
		var fonts = {
			base: 'Open Sans'
		}

		// Colors
		var colors = {
			gray: {
				100: '#f6f9fc',
				200: '#e9ecef',
				300: '#dee2e6',
				400: '#ced4da',
				500: '#adb5bd',
				600: '#8898aa',
				700: '#525f7f',
				800: '#32325d',
				900: '#212529'
			},
			theme: {
				'default': '#14147a',
				'primary': '#4535b7',
				'secondary': '#f4f5f7',
				'info': '#11cdef',
				'success': '#2de8c4',
				'danger': '#f5365c',
				'warning': '#ffc410'
			},
			black: '#12263F',
			white: '#FFFFFF',
			transparent: 'transparent',
		};


		// Methods

		// Chart.js global options
		function chartOptions() {

			// Options
			var options = {
				defaults: {
					global: {
						responsive: true,
						maintainAspectRatio: false,
						defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
						defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
						defaultFontFamily: fonts.base,
						defaultFontSize: 13,
						layout: {
							padding: 0
						},
						legend: {
							display: false,
							position: 'bottom',
							labels: {
								usePointStyle: true,
								padding: 16
							}
						},
						elements: {
							point: {
								radius: 0,
								backgroundColor: colors.theme['primary']
							},
							line: {
								tension: .4,
								borderWidth: 4,
								borderColor: colors.theme['primary'],
								backgroundColor: colors.transparent,
								borderCapStyle: 'rounded'
							},
							rectangle: {
								backgroundColor: colors.theme['warning']
							},
							arc: {
								backgroundColor: colors.theme['primary'],
								borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
								borderWidth: 4
							}
						},
						tooltips: {
							enabled: true,
							mode: 'index',
							intersect: false,
						}
					},
					doughnut: {
						cutoutPercentage: 83,
						legendCallback: function(chart) {
							var data = chart.data;
							var content = '';

							data.labels.forEach(function(label, index) {
								var bgColor = data.datasets[0].backgroundColor[index];

								content += '<span class="chart-legend-item">';
								content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
								content += label;
								content += '</span>';
							});

							return content;
						}
					}
				}
			}

			// yAxes
			Chart.scaleService.updateScaleDefaults('linear', {
				gridLines: {
					borderDash: [2],
					borderDashOffset: [2],
					color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
					drawBorder: false,
					drawTicks: false,
					drawOnChartArea: true,
					zeroLineWidth: 0,
					zeroLineColor: 'rgba(0,0,0,0)',
					zeroLineBorderDash: [2],
					zeroLineBorderDashOffset: [2]
				},
				ticks: {
					beginAtZero: true,
					padding: 10,
					callback: function(value) {
						if (!(value % 10)) {
							return value
						}
					}
				}
			});

			// xAxes
			Chart.scaleService.updateScaleDefaults('category', {
				gridLines: {
					drawBorder: false,
					drawOnChartArea: false,
					drawTicks: false
				},
				ticks: {
					padding: 20
				},
				maxBarThickness: 10
			});

			return options;

		}

		// Parse global options
		function parseOptions(parent, options) {
			for (var item in options) {
				if (typeof options[item] !== 'object') {
					parent[item] = options[item];
				} else {
					parseOptions(parent[item], options[item]);
				}
			}
		}

		// Push options
		function pushOptions(parent, options) {
			for (var item in options) {
				if (Array.isArray(options[item])) {
					options[item].forEach(function(data) {
						parent[item].push(data);
					});
				} else {
					pushOptions(parent[item], options[item]);
				}
			}
		}

		// Pop options
		function popOptions(parent, options) {
			for (var item in options) {
				if (Array.isArray(options[item])) {
					options[item].forEach(function(data) {
						parent[item].pop();
					});
				} else {
					popOptions(parent[item], options[item]);
				}
			}
		}

		// Toggle options
		function toggleOptions(elem) {
			var options = elem.data('add');
			var $target = $(elem.data('target'));
			var $chart = $target.data('chart');

			if (elem.is(':checked')) {

				// Add options
				pushOptions($chart, options);

				// Update chart
				$chart.update();
			} else {

				// Remove options
				popOptions($chart, options);

				// Update chart
				$chart.update();
			}
		}

		// Update options
		function updateOptions(elem) {
			var options = elem.data('update');
			var $target = $(elem.data('target'));
			var $chart = $target.data('chart');

			// Parse options
			parseOptions($chart, options);

			// Toggle ticks
			toggleTicks(elem, $chart);

			// Update chart
			$chart.update();
		}

		// Toggle ticks
		function toggleTicks(elem, $chart) {

			if (elem.data('prefix') !== undefined || elem.data('prefix') !== undefined) {
				var prefix = elem.data('prefix') ? elem.data('prefix') : '';
				var suffix = elem.data('suffix') ? elem.data('suffix') : '';

				// Update ticks
				$chart.options.scales.yAxes[0].ticks.callback = function(value) {
					if (!(value % 10)) {
						return prefix + value + suffix;
					}
				}

				// Update tooltips
				$chart.options.tooltips.callbacks.label = function(item, data) {
					var label = data.datasets[item.datasetIndex].label || '';
					var yLabel = item.yLabel;
					var content = '';

					if (data.datasets.length > 1) {
						content += '<span class="popover-body-label mr-auto">' + label + '</span>';
					}

					content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
					return content;
				}

			}
		}


		// Events

		// Parse global options
		if (window.Chart) {
			parseOptions(Chart, chartOptions());
		}

		// Toggle options
		$toggle.on({
			'change': function() {
				var $this = $(this);

				if ($this.is('[data-add]')) {
					toggleOptions($this);
				}
			},
			'click': function() {
				var $this = $(this);

				if ($this.is('[data-update]')) {
					updateOptions($this);
				}
			}
		});


		// Return

		return {
			colors: colors,
			fonts: fonts,
			mode: mode
		};

	})();

	'use strict';

	//
	// Sales chart
	//

	var SalesChart = (function() {

		// Variables

		var $chart = $('#chart-sales-dark');


		// Methods

		function init($this) {
			var salesChart = new Chart($this, {
				type: 'line',
				options: {
					scales: {
						yAxes: [{
							gridLines: {
								color: Charts.colors.gray[700],
								zeroLineColor: Charts.colors.gray[700]
							},
							ticks: {

							}
						}]
					}
				},
				data: {
					labels: [
						<?php foreach ($order_overviews as $order) : ?> '<?php echo get_month($order->month); ?>',
						<?php endforeach; ?>
					],
					datasets: [{
						label: 'Order',
						data: [
							<?php foreach ($order_overviews as $order) : ?>
								<?php echo $order->sale; ?>,
							<?php endforeach; ?>
						]
					}]
				}
			});

			// Save to jQuery object

			$this.data('chart', salesChart);

		};


		// Events

		if ($chart.length) {
			init($chart);
		}

	})();



	var BarsChart = (function() {

		//
		// Variables
		//

		var $chart = $('#chart-bars');


		//
		// Methods
		//

		// Init chart
		function initChart($chart) {

			// Create chart
			var ordersChart = new Chart($chart, {
				type: 'bar',
				data: {
					labels: [
						<?php foreach ($income_overviews as $income) : ?> '<?php echo get_month($income->month); ?>',
						<?php endforeach; ?>
					],
					datasets: [{
						label: 'Pendapatan',
						data: [
							<?php foreach ($income_overviews as $income) : ?> '<?php echo $income->income; ?>',
							<?php endforeach; ?>
						]
					}]
				}
			});

			// Save to jQuery object
			$chart.data('chart', ordersChart);
		}


		// Init chart
		if ($chart.length) {
			initChart($chart);
		}

	})();
</script>
