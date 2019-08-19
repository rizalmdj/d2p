<div class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Add Request D2P</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->
	<?php 
	echo $this->session->flashdata("k");
	$var = $this->session->userdata;
	?>
	<form action="<?php echo base_URL(); ?>index.php/request_d2p/do_add_requestd2p" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		
	<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="200%" class="table-form">

			<tr><td width="35%">Name</td><td><b><input type="text" name="name" value="<?php echo $var['nama']; ?>" disabled style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">Project Name</td><td><b><textarea name="project_name" required style="width: 400px; height: 85px" class="form-control"></textarea></b></td></tr>			

			<tr><td width="35%">Project ID</td><td><b><input type="text" name="project_id" required style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">Project Manager</td><td><b><input type="text" name="project_manager" required  style="width: 400px" class="form-control"></b></td></tr></tr>			

			<tr><td width="35%">Keterangan</td><td><b><input type="text" name="keterangan" style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">Date</td><td><b><input type="date" name="req_date" placeholder="DD-MM-YYYY" required style="width: 400px" class="form-control"></b></td></tr>		
			
		</table>

	</div>
	
	<div class="col-lg-6">	


		<table width="200%" class="table-form">		


			<tr><td width="35%">(1) Dokumen SIT</b></td><td><input type="file" name="upload_file1"  style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">(2) Dokumen UAT</td><td><b><input type="file" name="upload_file2"  style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">(3) List Object</td><td><b><input type="file" name="upload_file3"  style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">(4) Deployment Guide</td><td><b><input type="file" name="upload_file4"  style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">(5) Rollback Plan</td><td><b><input type="file" name="upload_file5"  style="width: 400px" class="form-control"></b></td></tr>

			<tr><td width="35%">(6) Release Notes</td><td><b><input type="file" name="upload_file6"  style="width: 400px" class="form-control"></b></td></tr>

		</table>

		<table>

			<tr><td width="200%"><b><i><text style="color: red;" >*File Upload Only GIF, JPEG, JPG, PNG, PDF</i></b></td></tr>

			<tr><td colspan="2">
			
			<br><button type="submit" class="btn btn-success"><i class="icon icon-ok icon-white"></i> Save</button>
			<a href="<?php echo base_URL(); ?>index.php/request_d2p/request_d2p_list" class="btn btn-danger"><i class="icon icon-arrow-left icon-white"></i> Back</a></td>
		</table>

	</div>	
	</div>



	</form>


