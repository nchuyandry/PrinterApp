<div class="row">
    <div class="col-12">
    	<div class="card">
        	<div class="card-header">
            	<div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Master Data</h5>
                    <h2 class="card-title">Data Service</h2>
                  </div>
                  <div class="col-sm-6 text-right">
                  <?php if($this->session->userdata('nik')=="0100044200" || $this->session->userdata('nik')=="0100034100"){?>
					<a class="btn btn-primary" id="add" data-toggle="modal" data-target="#addservice" style="color: #fff"><i class="fas fa-plus"></i> Add Service</a>
                  <?php } ?>
                  </div>
                </div>
            </div>
            <div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="table table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tgl. Submit</th>
								<th>Tgl. Deadline</th>
								<th>Kode</th>
								<th>Model</th>
								<th>S/N</th>
								<th>Depo</th>
								<th>Divisi</th>
								<th>Keterangan</th>
								<th>Status</th>
								<th>Action</th>
								<th>Keterangan Pending</th>
								<th>Tgl. Closing</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i=0;
							foreach($rekap as $row){
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
								<td><?php echo $row->kodebrg?></td>
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
								<td><?php echo $row->keteranganpend;?></td>
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


<div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">
    		
      		<div class="modal-header">
        		<h3 class="modal-title" id="exampleModalLabel">Add Data Service</h3>
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          			<i class="tim-icons icon-simple-remove"></i>
        		</button>
      		</div>
      		<div class="modal-body">
        		<div class="container-fluid">
        			<form class="form-horizontal" method="post" action="<?php echo base_url()?>savedata">
        			<div class="row">
	                	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Tanggal Submit</label>
		                       	<input type="datetime-local" class="form-control " id="tgl"  name="tgl" value="" required />
		                   	</div>
		               	</div>
		               	<!--<div class="col-md-4">
		               		<div class="form-group">
			               		<label>Choose a browser from this list:
								<input list="browsers" class="form-control" name="myBrowser" /></label>
								<datalist id="browsers" >
		          					<?php foreach($printin as $row){?>
		          					<option value="<?php echo $row->serialnumber?>"><?php echo $row->serialnumber?></option>
		          					<?php } ?>
								</datalist>
		               		</div>
		               	</div>-->
	                	<div class="col-md-4">
	                   		<div class="form-group">
	                   		<label>Serial Number Printer</label>
	                       	<select class="form-control" name="sn" id="sn" required>
	          					<option value="">--Pilih--</option>
	          					<?php foreach($printin as $row){?>
	          					<option value="<?php echo $row->no?>"><?php echo $row->serialnumber?></option>
	          					<?php } ?>
	          				</select>
	                   		</div>
	                   	</div>
	                   	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Kode Printer</label>
		                       	<input type="hidden" class="form-control" id="serial"  name="serial" readonly />
		                       	<input type="text" class="form-control" id="kode"  name="kode" readonly />
		                   	</div>
		               	</div>
		               	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Model Printer</label>
		                       	<input type="text" class="form-control" id="model"  name="model" readonly />
		                   	</div>
		               	</div>
		               	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Tipe Printer</label>
		                       	<input type="text" class="form-control" id="tipe"  name="tipe" readonly />
		                   	</div>
		               	</div>
		               	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Dari Depo</label>
		                       	<select class="form-control" name="depo" id="depo" required>
		          					<option value="">--Pilih--</option>
		          					<?php foreach($depo as $row){?>
		          					<option value="<?php echo $row->namadepo?>"><?php echo $row->namadepo?></option>
		          					<?php } ?>
		          				</select>
		                   	</div>
		               	</div>
		               	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Divisi / Bagian</label>
		                       	<input type="text" class="form-control" id="divisi"  name="divisi" required />
		                   	</div>
		               	</div>
		               	<div class="col-md-4">
	      					<div class="form-group">
	                       		<label>Keterangan Printer</label>
	                       		<textarea rows="10" cols="60" class="form-control" placeholder="Here can be your description" name="keterangan" required></textarea>
	                    	</div>
	                    </div >
	                    <div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Status</label>
		                       	<select class="form-control" name="status" id="status" required>
		          					<option value="">--Pilih--</option>
		          					<option value="Open">Open</option>
		          				</select>
		                   	</div>
		               	</div>
                    	<div class="col-md-12 text-right">
                      		<button type="submit"  class="btn btn-fill btn-primary">Submit</button> <!--id="savedata"-->
                    	</div>
                	</div>
                	</form>
        		</div>
    		</div>
    		<div class="modal-footer">
		      	
		    </div>
	      	
      	</div>
	</div>
</div> 

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">
    		<form class="form-horizontal" method="post" action="<?php echo base_url()?>home/updatedata">
      		<div class="modal-header">
        		<h3 class="modal-title" id="exampleModalLabel">Edit Data</h3>
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          			<i class="tim-icons icon-simple-remove"></i>
        		</button>
      		</div>
      		<div class="modal-body">
        		<div class="container-fluid">
        			<div class="row">
	                	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Tanggal Submit</label>
		                       	<input type="datetime-local" class="form-control " id="tgl"  name="tgl" readonly/>
		                   	</div>
		               	</div>
	                	<div class="col-md-4">
	                   		<div class="form-group">
	                   		<label>Serial Number Printer</label>
		                    <input type="text" class="form-control" id="serial"  name="serial" readonly>
	                   		</div>
	                   	</div>
	                   	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Kode Printer</label>
		                       	<input type="text" class="form-control" id="kode"  name="kode" readonly>
		                   	</div>
		               	</div>
		               	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Model Printer</label>
		                       	<input type="text" class="form-control" id="model"  name="model" readonly>
		                   	</div>
		               	</div>
		               	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Dari Depo</label>
		                       	<input type="text" class="form-control" name="depo" id="depo" readonly/>
		                   	</div>
		               	</div>
		               	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Divisi / Bagian</label>
		                       	<input type="text" class="form-control" id="div"  name="div" readonly />
		                   	</div>
		               	</div>
	                    <div class="col-md-4">
	                   	  	<div class="form-group" id="stats">
		                       	<label>Status</label>
		                       	<select class="form-control" name="status" id="status" required>
		          					<option value="">--Pilih--</option>
		          					<option value="On Progress">On Progress</option>
		          					<option value="Pending">Pending</option>
		          					<option value="Continue">Continue</option>
		          					<option value="Fixed">Fixed</option>
		          				</select>
		                   	</div>
		            	</div>
		                <div class="col-md-8" style="display: none" id="act">
		                   	<div class="form-group" >
		                       	<label>Action Perbaikan</label>
		                       	<textarea rows="10" cols="60" class="form-control" placeholder="Here can be your description" id="action" name="action"></textarea>
		                   	</div>
		               	</div>
		               	<div class="col-md-8" style="display: none" id="pend">
		                   	<div class="form-group" >
		                       	<label>Keterangan Pending</label>
		                       	<textarea rows="10" cols="60" class="form-control" placeholder="Here can be your description" id="ketpending" name="ketpending"></textarea>
		                   	</div>
		               	</div>
                    	<div class="col-md-12 text-right">
                      		<button type="submit" id="updatedata"  class="btn btn-fill btn-primary">Update</button>
                    	</div>
                	</div>
        		</div>
    		</div>
    		<div class="modal-footer">
		      	
		    </div>
	      	</form>
      	</div>
	</div>
</div> 