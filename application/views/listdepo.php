<div class="row">
	<div class="col-12">
    	<div class="card">
        	<div class="card-header">
            	<div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">List Depo</h5>
                    <h2 class="card-title">Data ISP TVIP Group</h2>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach($fastel as $row){?>
    <div class="col-md-4">
    	<div class="card">
  			<div class="card-body">
    			<h4 class="card-title"><?php echo $row->namadepo?></h4>
			    <p class="card-text"  style="height: 70px"><?php echo $row->alamat?></p>
			    <div class="row">
			    	<div class="col-md-6 text-left">
			    		<button class="btn btn-primary" id="showdetail" data-toggle="modal" data-target="#detailmodal" data="<?php echo $row->iddepo?>" >
					    	Detail
					    </button>
			    	</div>
			    	<div class="col-md-6 text-right">
			    		<button class="btn btn-primary " id="editdetail" data-toggle="modal" data-target="#editmodal" data="<?php echo $row->iddepo?>">
					    	<i class="fa fa-edit"></i> Edit
					    </button>	
			    	</div>
			    </div>	   
			</div>
		</div>
    </div>
    <?php } ?>
</div>
      
<div class="modal fade " id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h2 class="modal-title" id="exampleModalLabel">Detail</h2>
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          		<i class="tim-icons icon-simple-remove"></i>
        		</button>
      		</div>
      		<div class="modal-body">
				<div class="container-fluid">
					<table border="0" id="depo">
						<thead>
							<tr>
								<th  width="30%" >Depo</th>
								<td id="namadepo" style="font-size: 20px"></td>
							</tr>
							<tr>
								<th >Alamat</th>
								<td id="alamat"></td>
							</tr>
							<tr>
								<th>Nama PIC</th>
								<td id="namapic" style="font-size: 20px"></td>
							</tr>	
							<tr>
								<th >No. Telp PIC</th>
								<td id="telppic" style="font-size: 20px"></td>
							</tr>
						</thead>
					</table>
					<br />
					<table class="table table-striped table-borderless" id="tdetail" border="0">
						<thead>
						<tr>
							<th>No.</th>
							<th>Nama Layanan</th>
							<th>No. SID</th>
						</tr>
						</thead>
						<tbody></tbody>
						
					</table>	
				</div>
      		</div>
     		
    	</div>
  	</div>
</div> 
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
	<div class="modal-dialog  ">
		<div class="modal-content">
    		<form>
      		<div class="modal-header">
        		<h3 class="modal-title" id="exampleModalLabel">Edit Data</h3>
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          			<i class="tim-icons icon-simple-remove"></i>
        		</button>
      		</div>
      		<div class="modal-body">
        		<div class="container-fluid">
        			<div class="row">
		        		<div class="col-sm-12">
		        			<div class="form-group">
				        		<label for="selectsystem">Nama Depo</label>
				        		<input type="text" class="form-control" id="editdepo" name="namadepo"  />
				        		<input type="hidden" class="form-control" id="id_update" name="id_update"  />
			        		</div>
			        	</div>
			        	<div class="col-md-12">
				      		<div class="form-group">
				        		<div class="form-group">
				        		<label for="selectsystem">Alamat</label>
				        		<textarea  class="form-control" id="editalamat" name="alamat" ></textarea>
				      		</div>
				      		</div>
		        		</div>
		        		<div class="col-md-12">
				      		<div class="form-group">
				        		<label for="selectsystem">Nama PIC</label>
				        		<input type="text" class="form-control" id="editpic" name="namapic"  />
				      		</div>
		        		</div>
		        		<div class="col-md-12">
				      		<div class="form-group">
				        		<label for="selectsystem">No. Telp PIC</label>
				        		<input type="text" class="form-control" id="edittelp" name="telppic"  />
				      		</div>
		        		</div>
		        		
	            		<div class="col-12 text-right">
	            			<button type="button" class="btn btn-danger text-right" data-dismiss="modal">Cancel</button>
		      				<a id="update" class="btn btn-fill btn-success">Update</a>
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