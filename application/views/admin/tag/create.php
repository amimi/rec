<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tag
			<small>Tag create</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
			<li class="active">Here</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<?php out($alert_message, FALSE); ?>
		<!-- Your Page Content Here -->
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<?php out(form_open_multipart('', ['class' => 'form-horizontal']), FALSE); ?>
						<div class="box-header">
							<h3 class="box-title">Create New Tag</h3>
						</div><!-- /.box-header -->
						<div class="box-body">
							<div class="form-group <?php out(has_error('tag_name')); ?>">
								<label class="col-sm-2 control-label" for="category_name">name</label>
								<div class="col-sm-10">
									<?php out(form_input('tag_name', set_value('tag_name'), ['id' => 'tag_name', 'class' => 'form-control', 'placeholder' => 'tag name']), FALSE); ?>
									<?php out(form_error('tag_name'), FALSE); ?>
								</div><!-- /.col-sm-10 -->
							</div><!-- /.form-group -->
							<div class="form-group <?php out(has_error('segment')); ?>">
								<label class="col-sm-2 control-label" for="segment">segment</label>
								<div class="col-sm-10">
									<?php out(form_input('segment', set_value('segment'), ['id' => 'segment', 'class' => 'form-control', 'placeholder' => 'segment']), FALSE); ?>
									<?php out(form_error('segment'), FALSE); ?>
								</div><!-- /.col-sm-10 -->
							</div><!-- /.form-group -->
						</div><!-- /.box-body -->
						<div class="box-footer">
							<?php out(form_submit('submit', 'submit', ['class' => 'btn btn-info pull-right']), FALSE); ?>
						</div><!-- /.box-footer -->
					<?php out(form_close(), FALSE); ?>
				</div> <!-- /.box -->
			</div> <!-- /.col-xs-12 -->
		</div> <!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->