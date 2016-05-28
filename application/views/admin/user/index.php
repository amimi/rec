  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
      <?php if(empty($users)) { ?>
      	No User.
      <?php } else { ?>
      <?php foreach ($users as $user) { ?>
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th></th>
							<th></th>
						</tr>
					</table>
      			</div><!-- /.box-body -->
      		</div> <!-- /.box -->
      	</div> <!-- /.col-xs-12 -->
      </div> <!-- /.row -->
      <?php } ?>
      <?php } ?>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->