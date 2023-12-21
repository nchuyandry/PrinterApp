/*$(document).ready(function()
{
	 $('#model').change(function(){
		var id=$(this).val();
		
		$.ajax({  
	        url:"<?php echo base_url()?>home/getmodel",
	        method:"GET",  
	        dataType:"JSON", 
	        data : {id:id},
	        success: function(data){
	            for(var i=0; i<data.length; i++){
	            	$("#sserial").val(data[i].serialnumber);
	            }
            }
   		});
	});
});*/

$(document).on('change','#status',function(){
	var x = $(this).val();
	if (x == "Fixed") {
		document.getElementById('act').style.display = 'block';
	} else {
		document.getElementById('act').style.display = 'none';
	}
	
	if(x == "Pending"){
		document.getElementById('pend').style.display = 'block';
	} else {
		document.getElementById('pend').style.display = 'none';
	}
});
	
$(document).on('change','#sn',function(){
		var id=$(this).val();
		$.ajax({  
	        url:"<?php echo base_url()?>home/getmodelid",
	        method:"GET",  
	        dataType:"JSON", 
	        data : {id:id},
	        success: function(data){
	        	for(var i=0; i<data.length; i++){
					$('#kode').val(data[i].kodebrg);
					$('#model').val(data[i].model);
					$('#tipe').val(data[i].tipe);
					$('#serial').val(data[i].serialnumber);
					$('#depo').val(data[i].daridepo);
					$('#divisi').val(data[i].divisi);
				}
            }
   		});
});
$(document).on('click','#showdetail',function()
{
	var id=$(this).attr('data');
	$.ajax({
		type : "GET",
		url  : "<?php echo base_url()?>home/getdata",
		dataType : "JSON",
		data : {id:id},
		success: function(data){
			//$("#depo thead").empty();
          
           // for(var i=0; i<data.length; i++){
			//	$("#depo thead").append("<tr><th>Depo</th><td>" + data.namadepo + "</td></tr><tr><th>Alamat </th><td>" + data.alamat + "</td></tr><tr><th>Nama PIC</th><td>" + data.namapic + "</td></tr><tr><th>No. Telp PIC</th><td>" + data.telppic + "</td></tr>");
			//}
			$.each(data,function(iddepo,namadepo, alamat, namapic, telppic){
				$('#detailmodal').modal('show');
	            $('#namadepo').html(data.namadepo);
	            $('#alamat').html(data.alamat);
	            $('#namapic').html(data.namapic);
	            $('#telppic').html(data.telppic);
	            $('#id').val(data.iddepo);
	        });
	    }
	});
});
$(document).on('click','#detailpr',function()
{
	var id=$(this).attr('data');
	$.ajax({
		type : "GET",
		url  : "<?php echo base_url()?>home/getdetaillog",
		dataType : "JSON",
		data : {id:id},
		success: function(data){
			$("#timeline ul").empty();
			for(var i=0; i<data.length; i++){
				$("#timeline ul").append("<li><div class='timeline_content'><span>" + data[i].loguser + "</span><h5><i class='far fa-clock'></i> " + data[i].logtgl + "</h5><p>" + data[i].logdata + "</p></div></li>");
			}
	    }
	});
});


/*$(document).on('click','#showdetail',function()
{
	var id=$(this).attr('data');
	$.ajax({  
        url:"<?php echo base_url() ?>home/getlayanan/",
        method:"GET",  
        dataType:"JSON",          
		data : {id:id},
        success:function(data){
        	$.each(data,function(iddepo,jenis, nosid){  
				$('#detailmodal').modal('show');
	            $('[name="jenis"]').val(data.jenis);
	            $('[name="nosid"]').val(data.nosid);
	            $('#id').val(data.iddepo);
	        });
	    }
	});
});*/

$(document).on('click','#submitdata',function(e){
        e.preventDefault()
        var tgl=$('[name="tgl"]').val();
        var kode=$('[name="kode"]').val();
        var model=$('[name="model"]').val();
        var tipe=$('[name="tipe"]').val();
        var sn=$('[name="sn"]').val();
        
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url()?>submitdata",
            data : {tgl:tgl,kode:kode,model:model,tipe:tipe,sn:sn},
            success: function(data){
            	$.notify({
					icon: "fa fa-check-circle",
					message: "Data Saved!"
				},{
					type: "success",
					timer: 2000,
					allow_dismiss: false,
					placement: {
						from: "top",
						align: "right"
					},
					animate: {
						enter: 'animated fadeInDown',
						exit: 'animated fadeOutUp'
					},
				});
            	setTimeout(function(){ location.reload(); }, 3000);
            }
        });
        
});
$(document).on('click','#savedata',function(e){
        e.preventDefault()
        var tgl=$('[name="tgl"]').val();
        var kode=$('[name="kode"]').val();
        var serial=$('[name="serial"]').val();
        var model=$('[name="model"]').val();
        var depo=$('[name="depo"]').val();
        var divisi=$('[name="divisi"]').val();
        var keterangan=$('[name="keterangan"]').val();
        var status=$('[name="status"]').val();
        
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url()?>savedata",
            data : {tgl:tgl,kode:kode,serial:serial,model:model,status:status,depo:depo,divisi:divisi,keterangan:keterangan,status:status},
            success: function(data){
            	//console.log(data);
            	$.notify({
					icon: "fa fa-check-circle",
					message: "Data Saved!"
				},{
					type: "success",
					timer: 2000,
					allow_dismiss: false,
					placement: {
						from: "top",
						align: "right"
					},
					animate: {
						enter: 'animated fadeInDown',
						exit: 'animated fadeOutUp'
					},
				});
            	setTimeout(function(){ location.reload(); }, 3000);
            }
        });
        
});

$(document).on('click','#submitalokasi',function(e){
        e.preventDefault()
        var tglalokasi=$('[name="tglalokasi"]').val();
        var kode=$('[name="kode"]').val();
        var serial=$('[name="serial"]').val();
        var depo=$('[name="depo"]').val();
        var divisi=$('[name="divisi"]').val();
        
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url()?>savealokasi",
            data : {tglalokasi:tglalokasi,kode:kode,serial:serial,depo:depo,divisi:divisi},
            success: function(data){
            	//console.log(data);
            	$.notify({
					icon: "fa fa-check-circle",
					message: "Data Saved!"
				},{
					type: "success",
					timer: 2000,
					allow_dismiss: false,
					placement: {
						from: "top",
						align: "right"
					},
					animate: {
						enter: 'animated fadeInDown',
						exit: 'animated fadeOutUp'
					},
				});
            	setTimeout(function(){ location.reload(); }, 3000);
            }
        });
        
});

$(document).on('click','#alokasi',function()
{
	var serialnumber=$(this).attr('data');
	$.ajax({
		type : "GET",
		url  : "<?php echo base_url()?>home/getbysn",
		dataType : "JSON",
		data : {serialnumber:serialnumber},
		success: function(data){
			$.each(data,function(kodebrg,model,tipe,serialnumber){
				$('#editmodal').modal('show');
	            $('[name="serial"]').val(data.serialnumber);
	            $('[name="kode"]').val(data.kodebrg);
	            $('[name="model"]').val(data.model);
	            $('#serial').val(data.serialnumber);
	        });
	    }
	});
});

$(document).on('click','#editprint',function()
{
	var serialnumber=$(this).attr('data');
	$.ajax({
		type : "GET",
		url  : "<?php echo base_url()?>home/getbysn",
		dataType : "JSON",
		data : {serialnumber:serialnumber},
		success: function(data){			
				$('#editmodal').modal('show');
	            $('[name="tgl"]').val(data.tgl);
	            $('[name="serial"]').val(data.serialnumber);
	            $('[name="kode"]').val(data.kodebrg);
	            $('[name="model"]').val(data.model);
	            $('[name="depo"]').val(data.fromdepo);
	            $('[name="div"]').val(data.divisi);
	            $('[name="status"]').val(data.status);
	            $('#serial').val(data.serialnumber);
	            if(data.status == "On Progress"){
	            	$("#stats select").empty();
					$("#stats select").append("<option value='' selected>--Pilih--</option><option value='Pending'>Pending</option><option value='Fixed'>Fixed</option>");
				}else if(data.status == "Pending"){
					$("#stats select").empty();
					$("#stats select").append("<option value='' selected>--Pilih--</option><option value='Continue'>Continue</option><option value='Fixed'>Fixed</option>");
				}else if(data.status == "Continue"){
					$("#stats select").empty();
					$("#stats select").append("<option value='' selected>--Pilih--</option><option value='Fixed'>Fixed</option>");
				}else{
					$("#stats select").empty();
					$("#stats select").append("<option value='' selected>--Pilih--</option><option value='On Progress'>On Progress</option><option value='Pending'>Pending</option><option value='Continue'>Continue</option><option value='Fixed'>Fixed</option>");
				}
	    }
	});
});

$(document).on('click','#x',function(){
        $.ajax({
        	url  : "<?php echo base_url()?>home/updatedata",
            type : "POST",
            data : {
            			serialnumber:$('#serial').val(),
            			kodebrg:$('#kode').val(),
            			status:$('#status').val(),
            			action:$('#action').val()
            			
            },
            success: function(data){
            	//console.log({editdepo:editdepo,editalamat:editalamat,editpic:editpic,edittelp:edittelp,id_update:id_update});
                alert(data);
                $.notify({
					icon: "fa fa-check-circle",
					message: "Data Updated!"
				},{
					type: "success",
					allow_dismiss: false,
					placement: {
						from: "top",
						align: "right"
					},
					animate: {
						enter: 'animated fadeInDown',
						exit: 'animated fadeOutUp'
					},
				});
				$('.modal').modal('hide');	
               // alert('Data Updated Successfully !');
              //setTimeout(function(){ location.reload(); }, 3000);
            }
        });
});