<div class="row">
    <div class="col-12">
    	<div class="card">
        	<div class="card-header">
            	<div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Data History</h5>
                    <h2 class="card-title">Histori Tiket Perbaikan</h2>
                  </div>
                  <div class="col-sm-6 text-right"></div>
                </div>
            </div>
            <div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tgl. Submit</th>
								<th>Tgl. Deadline</th>
								<th>Model</th>
								<th>S/N</th>
								<th>Depo</th>
								<th>Divisi</th>
								<th>Keterangan</th>
								<th>Status</th>
								<th>Action</th>
								<th>Tgl. Closing</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i=0;
							foreach($tiket as $row){
							$i++;	
							$tgl = date_create($row->tgl);
							$tgldl = date_create($row->tgldeadline);
							$tglcl = date_create($row->tglclose);
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo date_format($tgl, "d M Y");?></td>
								<td><?php 
									if($row->status == "Pending" || $row->status == "Open"){
										echo "00-00-0000";
									}else{
										echo date_format($tgldl, "d M Y");										
									}?>
								</td>
								<td><?php echo $row->model?></td>
								<td><?php echo $row->serialnumber?></td>
								<td><?php echo $row->fromdepo?></td>
								<td><?php echo $row->divisi?></td>
								<td><?php echo $row->keterangan?></td>
								<td>
								<?php if($row->status == "Open"){?>
									<span class="badge badge-default"><?php echo $row->status?></span>
								<?php }elseif($row->status == "On Progress" || $row->status == "Continue"){?>
									<span class="badge badge-primary"><?php echo $row->status?></span>
								<?php }elseif($row->status == "Pending"){?>
									<span class="badge badge-danger"><?php echo $row->status?></span>
								<?php }else{?>
									<span class="badge badge-success"><?php echo $row->status?></span>
								<?php } ?>
								</td>
								<td>
								<?php if(($row->status == "Open" || $row->status == "Pending" || $row->status == "On Progress"|| $row->status == "Continue")) { ?>
									<button class="btn btn-primary btn-sm" title="Edit" id="editprint" data-toggle="modal" data-target="#editmodal" data="<?php echo $row->serialnumber?>" style="color: #fff">
										<i class="fas fa-edit"></i>
									</button>
								<?php }else{
									echo $row->action;
									}
									?>
								
								
								</td>
								<td><?php 
									if($row->status == "Fixed"){
										echo date_format($tglcl, "d M Y");
									}else{
										echo "00-00-0000";
									}?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>
