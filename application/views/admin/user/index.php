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
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">User List</h3>
						</div><!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover">
								<tr>
									<th></th>
									<th>name</th>
									<th>last logined at</th>
									<th>created at</th>
								</tr>
								<?php foreach ($users as $user) { ?>
								<tr>
									<td><img class="img-circle" src="<?php out(admin_image($user['image'])); ?>" /></td>
									<td><a href="/admin/user/edit/<?php out($user['id']); ?>"><?php out($user['admin_name']); ?></a></td>
									<td><?php out($user['last_logined_at']); ?>
									<td><?php out($user['created_at']); ?></td>
								</tr>
								<?php } ?>
							</table>
						</div><!-- /.box-body -->
					</div> <!-- /.box -->
				</div> <!-- /.col-xs-12 -->
			</div> <!-- /.row -->
			<?php } ?>
		</section>
		<!-- /.content -->
</div>
<!-- /.content-wrapper -->