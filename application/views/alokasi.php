<div class="row">
<?php 
	$i=0;
	foreach($dataprinter as $row){
		$i++;	
?>
	<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
		<div class="card-stats card">
			<div class="card-header">
				<div class="row">
					<div class="col-4">
						<div class="info-icon text-center icon-success">
							<i class="fa fa-print"></i>
						</div>
					</div>
					<div class="col-8">
						<div class="numbers text-right">
							<p class="card-category"><a href="javascript:void(0)" id="alokasi" data-toggle="modal" data-target="#alokasimodal" data="<?php echo $row->serialnumber?>">SN : <?php echo $row->serialnumber?></a></p>
							<h5 class="card-title"><?php echo $row->model?></h5>
						</div>
					</div>
				</div>
			</div>
			<hr class="my-0">
            <div class="card-footer text-right p-2">
              <p class="m-0"><span class="text-primary  text-sm font-weight-bolder">Status : </span><?php echo $row->status?></p>
            </div>
		</div>
	</div>
<?php } ?>
</div>



<div class="modal fade" id="alokasimodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">
    		<form class="form-horizontal" method="post" action="<?php echo base_url()?>home/updatedata">
      		<div class="modal-header">
        		<h3 class="modal-title" id="exampleModalLabel">Alokasi Printer</h3>
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          			<i class="tim-icons icon-simple-remove"></i>
        		</button>
      		</div>
      		<div class="modal-body">
        		<div class="container-fluid">
        			<div class="row">
	                	<div class="col-md-4">
	                   	  	<div class="form-group">
		                       	<label>Tanggal Alokasi</label>
		                       	<input type="datetime-local" class="form-control " id="tglalokasi"  name="tglalokasi" />
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
		                       	<label>Alokasi ke Depo</label>
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
		               	</div>
                    	<div class="col-md-12 text-right">
                      		<button type="submit" id="submitalokasi"  class="btn btn-fill btn-primary">Submit</button>
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