<?php $page = get_page_by_title( 'Gallery' );
$page_id = $page->ID;
$url = wp_get_attachment_url( get_post_thumbnail_id($page_id) );
?>
<section id="gallery" name="gallery">
  <div class="gallery-featured-image" style="background:url(<?php echo $url; ?>) no-repeat left;"></div>
  <!--/ .gallery-featured-image -->
  <div class="container">
    <div class="title-holder">
      <h1>
		<?php
				$title = apply_filters('the_title', $page->post_title);
				$status = get_post_status( $page );
				if ( 'publish' == $status ){
				echo $title;
				}
		?>
	  </h1>
      <span><?php 
				$status = get_post_status( $page );
				if ( 'publish' == $status ){
					$excerpt = apply_filters('the_excerpt', $page->post_excerpt); echo $excerpt;
				}?></span> </div>
    <!--/.title-holder -->
    <div class="image-gallery">
		<div id="main">
			<ul class="gallery clearfix">
				<?php
					$type = 'gallery';
					$args=array(
					  'post_type' => $type,
					  'posts_per_page' => -1
					);
					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					  while ($my_query->have_posts()) : $my_query->the_post(); ?>
					  <?php $image_id = get_post_thumbnail_id();
						$image_large = wp_get_attachment_image_src($image_id,'large', true);
						$image_small = wp_get_attachment_image_src($image_id);?>

						<li><a href="<?php echo $image_large[0];?>" rel="prettyPhoto[gallery1]" title="<?php echo get_the_content(); ?>">
							<img src="<?php echo $image_small[0];?>" alt="<?php the_title(); ?>"/>
						</a></li>
									
							<?php
						  endwhile;
						}
						wp_reset_query();  // Restore global post data stomped by the_post().
					?>
				
			</ul>
			<script type="text/javascript" charset="utf-8">
				$(document).ready(function(){
					$("area[rel^='prettyPhoto']").prettyPhoto();
					
					$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
					$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'slow',slideshow:10000, hideflash: true});

					$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
						custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
						changepicturecallback: function(){ initialize(); }
					});

					$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
						custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
						changepicturecallback: function(){ _bsap.exec(); }
					});
				});
			</script>
		</div>
	</div>
    <!--/.image-gallery --> 
  </div>
  <!--/.container --> 
</section>
<!--/ #Gallery -->