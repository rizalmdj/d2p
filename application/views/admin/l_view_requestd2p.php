<div class="clearfix">
<div class="row">
  <div class="col-lg-12">
  	<div class="row">
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">List View Request</a>
			</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
			<ul class="nav navbar-nav navbar-right">
				<form class="navbar-form navbar-left" method="post">
					<input type="text" class="form-control" name="q" style="width: 200px" placeholder= "Keyword . . . . ">
					<button type="submit" class="btn btn-success"><i class="icon-search icon-white"> </i> Search</button>
				</form>
			</ul>
		</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->

  </div>
</div>

<?php echo $this->session->flashdata("k");?>
	
<!--	
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Well done!</strong> You successfully read <a href="http://bootswatch.com/amelia/#" class="alert-link">this important alert message</a>.
</div>
	
<div class="alert alert-dismissable alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Oh snap!</strong> <a href="http://bootswatch.com/amelia/#" class="alert-link">Change a few things up</a> and try submitting again.
</div>	
-->

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="3%">NO</th>
			<th width="10%">NAME</th>
			<th width="18%">PROJECT NAME</th>
			<th width="10%">PROJECT ID</th>
			<th width="10%">DATE</th>
			<th width="8%">STATUS</th>
			<th width="15%">OPTION</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
		if (empty($view_request)) {
			echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
		} 
		else 
		{
			$no 	= ($this->uri->segment(4) + 1);
			$i = 1;
			// var_dump($view_request);
			foreach ($view_request as $b) {
		?>
		<tr align="center">

			<td><?php echo $i++; ?></td>
			<td><?php echo $b->name; ?></td>
			<td><?php echo $b->project_name; ?></td>
			<td><?php echo $b->project_id; ?></td>
			<td><?php echo $b->req_date; ?></td>
			<td><?php echo $b->status_name; ?></td>
			
			<?php if ($this->session->userdata('admin_level')) {?>
			

			<td class="ctr">
					<div class="btn-group">
						<a href="<?php echo base_URL(); ?>index.php/view_requestd2p/approval_request_d2p/<?php echo $b->id; ?>/<?php echo $this->session->userdata('admin_level'); ?>" 
							class="btn btn-success btn-sm" onclick="return confirm('Are you sure want to approve?')"><i 
						class="icon-ok icon-white"> </i> Approval</a>
					</div>					

					<div class="btn-group">
						<a href="<?php echo base_URL(); ?>index.php/view_requestd2p/reject_request_d2p/<?php echo $b->id; ?>" 
							class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to reject?')"><i
						class="icon-remove-circle icon-white"></i> Reject</a>	 
					</div>
				
				</div>					


			</td>
			<?php 
				} 
				else 
					{
						echo "<td class='ctr'> -- </td>";
					}
			?>
		</tr>
		<?php 
			$no++;
			}
		}
		?>
	</tbody>
</table>
<!-- <center><ul class="pagination"><?php echo $pagi; ?></ul></center> -->
</div>

