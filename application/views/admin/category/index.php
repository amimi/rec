<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Category
				<small>Category List</small>
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
						<div class="box-header">
							<h3 class="box-title">Create New User</h3>
						</div><!-- /.box-header -->
						<div class="box-body">
							<div class="col-sm-6 <?php out(has_error('category_name')); ?>">
								<label class="control-label" for="category_name">name</label>
									<?php out(form_input('category_name', set_value('category_name'), ['id' => 'category_name', 'class' => 'form-control', 'placeholder' => 'category name']), FALSE); ?>
									<?php out(form_error('category_name'), FALSE); ?>
							</div><!-- /.col-sm-6 -->
							<div class="col-sm-6 <?php out(has_error('segment')); ?>">
								<label class="control-label" for="segment">segment</label>
									<?php out(form_input('segment', set_value('segment'), ['id' => 'segment', 'class' => 'form-control', 'placeholder' => 'segment']), FALSE); ?>
									<?php out(form_error('segment'), FALSE); ?>
							</div><!-- /.col-sm-6 -->
						</div><!-- /.box-body -->
						<div class="box-footer">
							<?php out(form_submit('submit', 'submit', ['class' => 'btn btn-info pull-right']), FALSE); ?>
						</div><!-- /.box-footer -->
					<?php out(form_close(), FALSE); ?>
					</div> <!-- /.box -->
					
					<div class="box">
						<?php if(empty($categories)) { ?>
						No Category.
						<?php } else { ?>
				
						<div class="box-body table-responsive no-padding">
							<table class="table table-hover">
								<tr>
									<th>name</th>
									<th>segment</th>
									<th>created at</th>
								</tr>
								<?php foreach ($categories as $category) { ?>
								<tr>
									<td><a href="/admin/category/edit/<?php out($category['id']); ?>"><?php out($category['category_name']); ?></a></td>
									<td><?php out($category['segment']); ?></td>
									<td><?php out($category['created_at']); ?></td>
								</tr>
								<?php } ?>
							</table>
						</div><!-- /.box-body -->
						<?php } ?>
					</div> <!-- /.box -->
				</div> <!-- /.col-xs-12 -->
			</div> <!-- /.row -->
		</section>
		<!-- /.content -->
</div>
<!-- /.content-wrapper -->