<section class="banner" name="banner">
		<?php $loop = new WP_Query( array( 'post_type' => 'banner_slideshow', 'posts_per_page' => 1 ) );
		while ( $loop->have_posts() ) : $loop->the_post();?>
			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
		  <div class="banner-parallax" style="background:url(<?php echo $url; ?>) no-repeat; height:100%"></div>
		  <div class="banner-text-wrapper">
			<div class="container">
			  <div class="banner-text">
				<?php the_content();?>
			  </div>
			  <div class="banner-ad-holder"><?php the_title();?></div>
			</div>
		  </div>						
		<?php endwhile; ?>
</section>
<!--/ #banner -->
