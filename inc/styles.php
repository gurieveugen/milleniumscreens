<?php $page = get_page_by_title( 'Styles' );
$page_id = $page->ID;
$url = wp_get_attachment_url( get_post_thumbnail_id($page_id) );
?>
<section id="styles" name="styles">
  <div class="styles-featured-image" style="background:url(<?php echo $url; ?>) no-repeat left;"></div>
  <!--/.styles-featured-image -->
  <div class="title-holder">
    <div class="container">
      <h1>
		<?php
				$title = apply_filters('the_title', $page->post_title);
				$status = get_post_status( $page );
				if ( 'publish' == $status ){
					echo $title;
				}
		?>
	  </h1>
    </div>
  </div>
  <!--/.title-holder -->
  <div class="container">
	<?php $args = array('meta_key'=>'meta-checkbox','meta_value'=>'yes','meta_compare'=>'=', 'post_type' => 'styles', 'posts_per_page' =>1,'order'=>'DESC','orderby'=>'id');
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
	$style_id[] = get_the_ID();
	?>
	<div class="nposition" name="<?php the_title();?>"></div>
    <div class="row" >						
      <div class="col-sm-5">
        <div class="popular-wrapper">
          <div class="popular">
            <figure>
				<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
				} else { ?>
				<img src="<?php bloginfo('template_directory'); ?>/img/no-image-large.jpg" alt="<?php the_title(); ?>" />
				<?php } ?>
			</figure>
            <span class="popular-tag"></span>
          </div>
          <!--/.popular -->
        <div class="btn-wrap"> 
			<span class="btn btn-cta btn-lg">POPULAR STYLE</span> 
			<a href="#enquiry" class="btn btn-primary btn-lg smoothScroll">make an enquiry</a> 
		</div>
          <!--/.btn-wrap --> 
        </div>
        <!--/.popular-wrapper --> 
      </div>
      <div class="col-sm-7">
        <div class="popular-detail desc">
          <h2><?php the_title();?></h2>
          <?php the_content();?>
          <ul class="benefits">
			<?php echo apply_filters('the_content', get_post_meta($post->ID, '_custom_editor_1', true)); ?>
          </ul>
          <!--/.benefits --> 
        </div>
        <!--/.popular-detail --> 
      </div>
    </div>
	
	<?php endwhile;
	wp_reset_query();?>
    <!--/.container --> 
  </div>
  <div class="other-style">
    <div class="title-holder">
      <div class="container"><span>Other Style options</span></div>
    </div>
    <!--/.title-holder -->
    <div class="container">
		<?php $args = array( 'post_type' => 'styles','post__not_in' =>$style_id,'posts_per_page' =>-1);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();?>
			<div class="nposition" name="<?php the_title();?>"></div>
		    <div class="row block-holder">
				<div class="col-sm-7 clearfix">
				  <div class="img-wrapper"> 
				  <?php if(class_exists('MultiPostThumbnails')
						&& MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'secondary-image')) {
						MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
					}
				  else {  ?> 
				  <img src="<?php bloginfo('template_directory'); ?>/img/no-image-small.jpg" alt="<?php the_title(); ?>" />
				<?php } ?></div>
				  <!--/.img-wrapper -->
				  <div class="detail-wrapper">
					<h3><?php the_title();?></h3>
					<?php the_content();?>
				  </div>
				  <!--/.detail-wrapper --> 
				</div>	
				<div class="col-sm-5">
				  <ul class="benefits">
						<?php echo apply_filters('the_content', get_post_meta($post->ID, '_custom_editor_1', true)); ?>
				  </ul>
				  <!--/.benefits --> 
				  <a href="#enquiry" class="btn btn-primary btn-md smoothScroll">make an enquiry</a> 
				</div>
		    </div>
      <!--/.block-holder -->
		<?php endwhile;
			wp_reset_query();?>
    </div>
    <!--/.container --> 
  </div>
  <!--/.other-style --> 
  
</section>
<!--/ #Styles -->