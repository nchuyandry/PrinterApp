<div class="row">
	<div class="col-12">
    	<div class="card">
    	<form class="form-horizontal" method="POST" action="<?php //base_url()?>submitdata">
        	<div class="card-header">
            	<div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Master Data</h5>
                    <h2 class="card-title">Input Data Printer</h2>
                  </div>
                  <div class="col-sm-6 text-right">
                    <h4 class="card-title">Today : <?php echo date('d M Y') ?></h4>
                  </div>
                </div>
            </div>
            <div class="card-body">
				<div class="row">
                	<div class="col-md-6">
                   	  	<div class="form-group">
	                       	<label>Tanggal</label>
	                       	<input type="datetime-local" class="form-control " id="tgl"  name="tgl" value="">
	                   	</div>
	               	</div>
	               	<div class="col-md-6">
                   	  	<div class="form-group">
	                       	<label>Kode</label>
	                       	<input type="text" class="form-control " id="kode"  name="kode" value="<?php echo $nomor?>" readonly>
	                   	</div>
	               	</div>
	               	<div class="col-md-6">
                   	  	<div class="form-group">
	                       	<label>Model</label>
	                       	<input type="text" class="form-control " id="model"  name="model" value="" required>
	                   	</div>
	               	</div>	
	               	<div class="col-md-6">
                   	  	<div class="form-group">
	                       	<label>Tipe</label>
	                       	<select class="form-control" name="tipe" id="tipe" required>
          					<option value="">--Pilih--</option>
          					<option value="Dotmatrik">Dotmatrix</option>
          					<option value="Toner">Toner</option>
          				</select>
	                   	</div>
	               	</div>
	               	<div class="col-md-6">
                   	  	<div class="form-group">
	                       	<label>Serial Number</label>
	                       	<input type="text" class="form-control " id="sn"  name="sn" value="">
	                       	<input type="hidden" class="form-control " id="status"  name="status" value="Masuk Gudang">
	                   	</div>
	               	</div>
	            </div>
                <div class="row">
                    <div class="col-md-8 text-left">
                      	<button type="submit" id="submitdata"  class="btn btn-fill btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>