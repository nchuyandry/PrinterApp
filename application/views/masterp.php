<div class="row">
    <div class="col-12">
    	<div class="card">
        	<div class="card-header">
            	<div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Master Data</h5>
                    <h2 class="card-title">Data Printer</h2>
                  </div>
                  <div class="col-sm-6 text-right">
                  	<a class="btn btn-primary card-title" href="#" id="adddata" data-toggle="modal" data-target="#addmodal" style="color: #fff"><i class="fas fa-plus"></i><b> Add Printer</b></a>
                  </div>
                </div>
            </div>
            <div class="card-body">
				<div class="table-responsive">
					<table id="dataTable" class="table table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tanggal</th>
								<th>Kode</th>
								<th>Merk / Model</th>
								<th>Jenis</th>
								<th>S/N</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i=0;
							foreach($report as $row){
							$i++;	
							$tgl = date_create($row->tgl);
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo date_format($tgl, 'd M Y')?></td>
								<td><?php echo $row->kodebrg?></td>
								<td><?php echo $row->model?></td>
								<td><?php echo $row->tipe?></td>
								<td>
									<a href="#" id="detailpr" data-toggle="modal" data-target="#detailmodal" data="<?php echo $row->serialnumber?>"><?php echo $row->serialnumber?></a>
								</td>
								<td><?php echo $row->status?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">
    		<form class="form-horizontal" method="post" action="<?php echo base_url()?>submitdata">
      		<div class="modal-header">
        		<h3 class="modal-title" id="exampleModalLabel">Add Data</h3>
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          			<i class="tim-icons icon-simple-remove"></i>
        		</button>
      		</div>
      		<div class="modal-body">
        		<div class="container-fluid">
        			<div class="row">
		        		<div class="col-md-4">
                   	  		<div class="form-group">
		                       	<label>Tanggal</label>
		                       	<input type="datetime-local" class="form-control " id="tgl"  name="tgl" value="" required>
		                   	</div>
	               		</div>
	               		<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Kode</label>
		                       	<input type="text" class="form-control " id="kode"  name="kode" value="<?php echo $nomor?>" readonly>
		                   	</div>
		               	</div>
		               	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Merk / Model</label>
		                       	<input type="text" class="form-control " id="model"  name="model" value="" required>
		                   	</div>
		               	</div>	
		               	<div class="col-md-6">
	                   	  	<div class="form-group">
		                       	<label>Jenis</label>
		                       	<select class="form-control" name="tipe" id="tipe" required>
	          					<option value="">--Pilih--</option>
	          					<option value="Dotmatrik">Dotmatrix</option>
	          					<option value="Toner">Toner</option>
	          					<option value="Toner">Thermal</option>
	          				</select>
		                   	</div>
		               	</div>
		               	<div class="col-md-6">
	                   	  	<div class="form-group">
		                       	<label>Serial Number</label>
		                       	<input type="text" class="form-control " id="sn"  name="sn" value="" required>
		                   	</div>
		               	</div>
		               	<!--<div class="col-md-4">
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
		                       	<input type="text" class="form-control" id="divisi"  name="divisi" />
		                   	</div>
		               	</div>-->
        			</div>
        			<div class="row">
	                    <div class="col-md-12 text-right">
	                      	<button type="submit" class="btn btn-fill btn-primary">Submit</button><!-- id="submitdata"--> 
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


<div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
      		<div class="modal-header">
        		<h3 class="modal-title" id="exampleModalLabel">Printer History</h3>
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          			<i class="tim-icons icon-simple-remove"></i>
        		</button>
      		</div>
      		<div class="modal-body">
        		<div class="container-fluid" id="title">
        			<div class="row" >
						
					</div>
        			<div class="row" >        				
		               <div class="col-md-12" id="timeline">
		                  <ul class="timeline-list" >
		                  	
		                  </ul>
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