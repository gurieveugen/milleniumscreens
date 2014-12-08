<?php $page = get_page_by_title( 'Colour Range' );
$page_id = $page->ID;
$url = wp_get_attachment_url( get_post_thumbnail_id($page_id) );
?>
<section id="colours" name="colours">
  <div class="bg-net" style="background:url(<?php echo $url; ?>) no-repeat left;">
    <div class="container">
      <div class="row text-content">
        <div class="col-sm-8">
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
        <div class="col-sm-4">
          <div class="quote">
            <p><?php $status = get_post_status( $page );
				if ( 'publish' == $status ){
				$excerpt = apply_filters('the_excerpt', $page->post_excerpt); echo $excerpt;
				}?></p>
          </div>
          <!--/.quote --> 
        </div>
      </div>
      <!--/.row --> <!--/.text-content --> 
    </div>
    <!--/.container --> 
  </div>
  <!--/.bg-net -->
  <div class="container">
    <div class="desc">
      <p><?php $status = get_post_status( $page );
				if ( 'publish' == $status ){
				$content = apply_filters('the_content', $page->post_content); echo $content;
				}?></p>
    </div>
    <!--/.desc -->
    <ul class="color-name">

			<?php
				$type = 'colors';
				$args=array(
				  'post_type' => $type,
				  'posts_per_page' => -1
				);
				$my_query = null;
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) {
				  while ($my_query->have_posts()) : $my_query->the_post(); ?>
				  <?php $image_id = get_post_thumbnail_id();
					$image_small = wp_get_attachment_image_src($image_id);?>
						<li>
							<figure><img src="<?php echo $image_small[0];?>" alt="<?php the_title(); ?>"/></figure>
							<?php the_title(); ?>
						</li>
						<?php
					  endwhile;
					}
				wp_reset_query();  // Restore global post data stomped by the_post().
			?>

	</ul>
    <!--/.color-name --> 
    <a href="#enquiry" class="btn btn-primary btn-lg smoothScroll">make an enquiry</a> </div>
  <!--/.container --> 
</section>
<!--/ #colours -->