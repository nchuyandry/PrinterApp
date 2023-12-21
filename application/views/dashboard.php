<div class="row">
	<div class="col-md-12">
		<div class="card-stats card">
			<div class="card-body">
				<h3 class="text-center mb-0"><?php echo date("D, d M Y H:i:s");?></h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-lg-3">
		<div class="card-stats card">
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						<div class="info-icon text-center icon-danger">
							<i class="fa fa-print"></i>
						</div>
					</div>
					<div class="col-8">
						<div class="numbers text-right">
							<p class="card-category">Total Printer</p>
							<h3 class="card-title"><?php echo $totalp?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="card-stats card">
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						<div class="info-icon text-center icon-success">
							<i class="fa fa-print"></i>
						</div>
					</div>
					<div class="col-8">
						<div class="numbers text-right">
							<p class="card-category">Printer Fixed</p>
							<h3 class="card-title"><?php echo $totalFixed?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="card-stats card">
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						<div class="info-icon text-center icon-warning">
							<i class="fa fa-print"></i>
						</div>
					</div>
					<div class="col-8">
						<div class="numbers text-right">
							<p class="card-category">Printer Pending</p>
							<h3 class="card-title"><?php echo $totalPend?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-lg-3">
		<div class="card-stats card">
			<div class="card-body">
				<div class="row">
					<div class="col-4">
						<div class="info-icon text-center icon-primary">
							<i class="fa fa-print"></i>
						</div>
					</div>
					<div class="col-8">
						<div class="numbers text-right">
							<p class="card-category">Printer On Progress</p>
							<h3 class="card-title"><?php echo $totalProg?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="card-chart card">
			<div class="card-header">
				<h5 class="card-category">Total Printers</h5>
				<!--<h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>-->
			</div>
			<div class="card-body">
                <div class="chart-area">
                  <canvas id="TotalP"></canvas>
                </div>
              </div>
		</div>
	</div>
</div>