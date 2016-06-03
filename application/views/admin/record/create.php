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
		<?php out($alert_message, FALSE); ?>
		<!-- Your Page Content Here -->
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<?php out(form_open_multipart('', ['class' => 'form-horizontal']), FALSE); ?>
						<div class="box-header">
							<h3 class="box-title">Create New Record</h3>
						</div><!-- /.box-header -->
						<div class="box-body">
						<div class="form-group <?php out(has_error('image')); ?>">
								<label class="col-sm-2 control-label" for="image">image</label>
								<div class="col-sm-10">
									<?php out(form_upload('image', set_value('image'), ['id' => 'image', 'class' => '']), FALSE); ?>
									<?php out(form_error('image'), FALSE); ?>
								</div><!-- /.col-sm-10 -->
							</div><!-- /.form-group -->
						<div class="form-group <?php out(has_error('comment')); ?>">
								<label class="col-sm-2 control-label" for="login_id">comment</label>
								<div class="col-sm-10">
									<?php out(form_textarea('comment', set_value('comment'), ['id' => 'comment', 'class' => 'form-control', 'placeholder' => 'comment']), FALSE); ?>
									<?php out(form_error('comment'), FALSE); ?>
								</div><!-- /.col-sm-10 -->
							</div><!-- /.form-group -->
							<div class="form-group <?php out(has_error('published_flag')); ?>">
								<label class="col-sm-2 control-label" for="published_flag">published flag</label>
								<div class="col-sm-10">
									<?php out(form_checkbox('published_flag', 1, set_checkbox('published_flag', 1, TRUE) , ['id' => 'published_flag']), FALSE); ?>
									<?php out(form_error('published_flag'), FALSE); ?>
								</div><!-- /.col-sm-10 -->
							</div><!-- /.form-group -->
							<div class="form-group">
								<label class="col-sm-2 control-label">categories</label>
								<div class="col-sm-10">
								<?php if($categories) { ?>
									<?php foreach ($categories as $category) { ?>
										<label>
											<?php out(form_checkbox('categories[]', $category['id'], set_checkbox('categories[]', $category['id'])), FALSE); ?>
											<?php out($category['category_name']); ?>
										</label>
									<?php } ?>
								<?php } ?>
								</div><!-- /.col-sm-10 -->
							</div><!-- /.form-group -->
							<div class="form-group">
								<label class="col-sm-2 control-label">categories</label>
								<div class="col-sm-10">
								<?php if($tags) { ?>
									<?php foreach ($tags as $tag) { ?>
										<label>
											<?php out(form_checkbox('tags[]', $tag['id'], set_checkbox('tags[]', $tag['id'])), FALSE); ?>
											<?php out($tag['tag_name']); ?>
										</label>
									<?php } ?>
								<?php } ?>
								</div><!-- /.col-sm-10 -->
							</div><!-- /.form-group -->
							<div class="form-group <?php out(has_error('published_at')); ?>">
								<label class="col-sm-2 control-label" for="published_at">published_at</label>
								<div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <?php out(form_input('published_at', set_value('published_at'), ['id' => 'published_at', 'class' => 'form-control pull-right']), FALSE); ?>
                </div>
                <?php out(form_error('published_flag'), FALSE); ?>
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