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
					<ul class="timeline">
					<?php $tmp_date = NULL; ?>
					<?php foreach ($records as $record) { ?>
						<?php if($tmp_date != dformat($record['published_at'], 'Ym')) { ?>
						<li class="time-label">
							<span class="bg-navy"> <?php out(dformat($record['published_at'], 'M.Y')); ?> </span>
						</li>
						<?php } ?>
						<li>
							<?php $day_class = $record['published_flag'] ? 'bg-teal' : ''; ?>
							<span class="day <?php out($day_class); ?>"><?php out(dformat($record['published_at'], 'd')); ?></span>
							<div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php out($record['created_at']); ?></span>

                <h3 class="timeline-header">
                	<?php if($record['categories']) { ?>
                		<?php foreach($record['categories'] as $category) { ?>
                  <span class="btn btn-primary btn-xs category-<?php out($category['id']); ?>"><?php out($category['category_name']); ?></span>
                 		<?php } // end foreach ?>
                  <?php } // end if ?>
                </h3>

                <div class="timeline-body clearfix">
                	<div class="col-sm-2">
                		<img class="margin pull-left" alt="" src="<?php out(record_image($record['image'])); ?>">
                	</div>
                	<div class="col-sm-4"><?php out($record['comment']); ?></div>
                	<div class="col-sm-6">
                		<?php if($record['tags']) { ?>
                			<?php foreach($record['tags'] as $tag) { ?>
                  	<span class="btn btn-primary btn-xs tag-<?php out($tag['id']); ?>"><?php out($tag['tag_name']); ?></span>
                 			<?php } // end foreach ?>
                  	<?php } // end if ?>
                	</div>
                </div>
                <div class="timeline-footer">
                </div>
              </div>
						</li>
						<?php $tmp_date = dformat($record['published_at'], 'Ym'); ?>
					<?php } // end foreach ?>
					</ul>
				</div> <!-- /.col-xs-12 -->
			</div> <!-- /.row -->
			<?php } ?>
		</section>
		<!-- /.content -->
</div>
<!-- /.content-wrapper -->