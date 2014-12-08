<section id="enquiry" name="enquiry">
  <div class="container">
    <h1><span></span><?php
				$page = get_page_by_title('Enquiry'); 
				$title = apply_filters('the_title', $page->post_title);
				$status = get_post_status( $page );
				if ( 'publish' == $status ){
				echo $title;
				}
		?>
	</h1>
    <div class="row">
      <div class="col-md-4">
		<?php echo do_shortcode('[contact-form-7 id="8" title="Enquiry Form"]'); ?> 
        <!--/.form -->
        <div class="address">
			<p><?php 
				$status = get_post_status( $page );
				if ( 'publish' == $status ){
					$content = apply_filters('the_content', $page->post_content); echo $content;
				}?></p>
        </div>
        <!--/.address --> 
      </div>
      <div class="col-md-8">
			<?php 
				$status = get_post_status( $page );
				if ( 'publish' == $status ){
					$excerpt = apply_filters('the_excerpt', $page->post_excerpt); echo $excerpt;
				}?>
	</div>
    </div>
    <!--/.row --> 
  </div>
  <!--/.container --> 
</section>
<!--/ #enquiry -->