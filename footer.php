  <div class="bottom-wrap">
    <div class="container">
      <div class="row">
        <div class="col col-sm-3">
          <p><?php echo get_theme_mod( 'copyright_textbox'); ?></p>
        </div>
        <!--/.col -->
        <div class="col col-sm-3">
          <ul class="social-link">
            <li><a href="https://www.facebook.com/pages/Millenium-Screens/102602486444277?fref=ts"><span class="sprite facebook"></span></a></li>
            <li><a href="https://twitter.com/MscreensScreens"><span class="sprite twitter"></span></a></li>
          </ul>
          <!--/.social-link --> 
        </div>
        <!--/.col -->
        <div class="col col-sm-3">
          <figure class="footer-logo"><img class="img-responsive" src="<?php bloginfo('template_directory');?>/img/footer-ms-logo.png" alt="footer-ms-logo"></figure>
        </div>
        <!--/.col -->
        <div class="col maintain col-sm-3">
          <p>Web Design: <a href="http://www.designvault.com.au/">DesignVault</a><br>
          Web Dev: <a href="http://www.ckymedia.com.au/">cKy Media</a></p>
        </div>
        <!--/.maintain --><!--/.col --> 
      </div>
      <!--/.row --> 
    </div>
    <!--/.container --> 
  </div>
  <!--/.bottom-wrap -->
  </div>
  <!--/.container --> 
</section>
<!--/ #contact --> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="<?php bloginfo('template_directory');?>/js/bootstrap.js"></script> 
<script type='text/javascript' src="<?php bloginfo('template_directory');?>/js/jquery.parallax-1.1.3.js"></script> 
<script type="text/javascript">
jQuery.noConflict(); (function($) {				  
	$(document).ready(function() {  
       $('.banner-parallax').parallax("50%", 0.6);
       $('.styles-featured-image').parallax("50%", 0.6);
	   $('.bg-net').parallax("50%", 0.6);
	   $('.gallery-featured-image').parallax("50%", 0.9);
	});
})(jQuery);
</script>
<?php wp_footer(); ?>
</body>
</html>