<section id="about" name="about">
  <div class="container">
    <div class="row intro">
      <div class="col-md-12">
        <h1><span></span>
			<?php
				$page = get_page_by_title('Welcome'); 
				$title = apply_filters('the_title', $page->post_title);
				$status = get_post_status( $page );
					if ( 'publish' == $status ){
					echo $title;
				}
			?>
		</h1>
       <?php $status = get_post_status( $page );
				if ( 'publish' == $status ){
				$content = apply_filters('the_content', $page->post_content); echo $content;
				}?>
      </div>
    </div>
    <!--/.Intro -->
    <div class="row service">
		<?php/* Widget for Quality Products  */?>
		<?php if ( is_active_sidebar( 'quality-products' ) ) : ?>
		<?php dynamic_sidebar( 'quality-products' ); ?>
		<?php endif; ?>
		
		<?php/* Widget for Colour Range  */?>
		<?php if ( is_active_sidebar( 'color-range' ) ) : ?>
		<?php dynamic_sidebar( 'color-range' ); ?>
		<?php endif; ?>
		
		<?php/* Widget for Warrenty  */?>
		<?php if ( is_active_sidebar( 'warranty' ) ) : ?>
		<?php dynamic_sidebar( 'warranty' ); ?>
		<?php endif; ?>
    </div>
    <!--/.Service --> 
  </div>
  <!--/.container --> 
</section>
<!--/ #about -->