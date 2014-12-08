<section id="contact" name="contact">
  <div class="top-wrap">
    <div class="container">
      <div class="col-md-4 col-sm-5">
	        <div class="product">
	        <h4>Products / services</h4>
				<ul>
					<?php/* Widget for Product/Services  */?>
					<?php $args = array('post_type' => 'styles', 'posts_per_page' =>-1,'order'=>'DESC','orderby'=>'id');
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();?>
					<li>
						<a href="#<?php the_title(); ?>" class="smoothScroll"><?php the_title();?></a>
					</li>
					<?php endwhile;
					wp_reset_query();?>
				</ul>
			</div>
        <!--/.product --> 
      </div>
		<?php/* Widget for Contact  */?>
		<?php if ( is_active_sidebar( 'contact' ) ) : ?>
		<?php dynamic_sidebar( 'contact' ); ?>
		<?php endif; ?>
    </div>
    <!--/.container --> 
  </div>
  <!--/.top-wrap -->