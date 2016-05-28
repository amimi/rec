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
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<?php out(form_open('', ['class' => 'form-horizontal']), FALSE); ?>
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-2 control-label" for="login_id">login id</label>
								<div class="col-sm-10">
									<?php out(form_input('login_id', set_value('login_id'), ['id' => 'login_id', 'class' => 'form-control', 'placeholder' => 'login id']), FALSE); ?>
									<?php out(form_error('login_id'), FALSE); ?>
								</div><!-- /.col-sm-10 -->
							</div><!-- /.form-group -->
							<div class="form-group">
								<label class="col-sm-2 control-label" for="password">password</label>
								<div class="col-sm-10">
									<?php out(form_password('password', set_value('password'), ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'password']), FALSE); ?>
									<?php out(form_error('password'), FALSE); ?>
								</div><!-- /.col-sm-10 -->
							</div><!-- /.form-group -->
							<div class="form-group">
								<label class="col-sm-2 control-label" for="admin_name">name</label>
								<div class="col-sm-10">
									<?php out(form_input('admin_name', set_value('admin_name'), ['id' => 'admin_name', 'class' => 'form-control', 'placeholder' => 'name']), FALSE); ?>
									<?php out(form_error('admin_name'), FALSE); ?>
								</div><!-- /.col-sm-10 -->
							</div><!-- /.form-group -->
							<div class="form-group">
								<label class="col-sm-2 control-label" for="image">image</label>
								<div class="col-sm-10">
									<?php out(form_input('image', set_value('image'), ['id' => 'image', 'class' => 'form-control', 'placeholder' => 'image']), FALSE); ?>
									<?php out(form_error('image'), FALSE); ?>
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