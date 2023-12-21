<div class="sidebar" data="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            <img src="<?=base_url()?>assets/img/tvip.png" width="32px">
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Service Printer
          </a>
        </div>
        <ul class="nav">
        	<li class="<?=($this->uri->segment(1)=== NULL)?'active':''?>">
            <a href="<?=base_url()?>">
              <i class="fas fa-tachometer-alt"></i>
              <p style="font-size: 14px">Dashboard</p>
            </a>
          </li> 
        <?php if($this->session->userdata('nik') == "0100044200" || $this->session->userdata('nik') == "0100034100"){?>
          <li class="<?=($this->uri->segment(1)=== 'master')?'active':''?>">
            <a href="<?=base_url('master')?>">
              <i class="fa fa-print"></i>
              <p style="font-size: 14px">Master</p>
            </a>
          </li> 
          <li class="<?=($this->uri->segment(1)=== 'service')?'active':''?>">
            <a href="<?=base_url('service')?>">
              <i class="fas fa-wrench"></i>
              <p style="font-size: 14px">Service</p>
            </a>
          </li>
          <li class="<?=($this->uri->segment(1)=== 'alokasi')?'active':''?>">
            <a href="<?=base_url('alokasi')?>">
              <i class="fas fa-exchange-alt"></i>
              <p style="font-size: 14px">Alokasi</p>
            </a>
          </li>
		  <li class="<?=($this->uri->segment(1)=== 'tiket')?'active':''?>">
            <a href="<?=base_url('tiket')?>">
              <i class="fas fa-history"></i>
              <p style="font-size: 14px">Histori Tiket</p>
            </a>
          </li>
        <?php }else{?>
          <li class="<?=($this->uri->segment(1)=== 'service')?'active':''?>">
            <a href="<?=base_url('service')?>">
              <i class="fas fa-wrench"></i>
              <p style="font-size: 14px">Data Service</p>
            </a>
          </li>
          <li class="<?=($this->uri->segment(1)=== 'tiket')?'active':''?>">
            <a href="<?=base_url('tiket')?>">
              <i class="fas fa-history"></i>
              <p style="font-size: 14px">Histori Tiket</p>
            </a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>