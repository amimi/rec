<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Record
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
			<?php if(empty($records)) { ?>
				No Record.
			<?php } else { ?>
			<div class="row">
				<div class="col-xs-12">
					<?php foreach ($records as $record) { ?>
					<div class="box box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">User List</h3>
						</div><!-- /.box-header -->
						<div class="box-body">

						</div><!-- /.box-body -->
					</div> <!-- /.box -->
					<?php } ?>
				</div> <!-- /.col-xs-12 -->
			</div> <!-- /.row -->
			<?php } ?>
		</section>
		<!-- /.content -->
</div>
<!-- /.content-wrapper -->