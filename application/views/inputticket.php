<div class="row">
	<div class="col-12">
    	<div class="card">
        	<form class="form-horizontal" method="POST" action="<?php //base_url()?>submitdata">
        	<div class="card-header">
            	<div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Input Ticket</h5>
                    <h2 class="card-title">Input Tiket Laporan Gangguan</h2>
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
                   		<label>Nama Depo</label>
                       	<select class="form-control" name="iddepo" id="iddepo" required>
          					<option value="">--Pilih--</option>
          					<?php foreach($fastel as $row){?>
          					<option value="<?php echo $row->iddepo?>"><?php echo $row->namadepo?></option>
          					<?php } ?>
          				</select>
                   		</div>
                   	</div>
            	</div>
                <div class="row">
                   	<div class="col-md-6">
                   		<div class="form-group">
                   		<label>Jenis Layanan</label>
                       	<select class="form-control" name="jenislay" id="jenislay" required>
          					<option value="">--Pilih--</option>
          				</select>
                   		</div>
                   	</div>
                   	<div class="col-md-6">
                   	  	<div class="form-group">
	                       	<label>No. SID</label>
	                       	<input type="text" class="form-control" id="nosid"  name="nosid" readonly>
	                   	</div>
	               	</div>
	            </div>
                <div class="row">
	               	<div class="col-md-6">
                   	  	<div class="form-group">
	                       	<label>No. Ticket Laporan</label>
	                       	<input type="text" class="form-control" id="notiket"  name="notiket" required>
	                   	</div>
	               	</div>
	            </div>
                <div class="row">
	               	<div class="col-md-8">
      					<div class="form-group">
                       		<label>Keterangan </label>
                       		<textarea rows="10" cols="60" class="form-control" placeholder="Here can be your description" name="keterangan" required=""></textarea>
                    	</div>
                    </div >
                    <div class="col-md-8 text-left">
                      	<button type="submit" id="submitdata"  class="btn btn-fill btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>