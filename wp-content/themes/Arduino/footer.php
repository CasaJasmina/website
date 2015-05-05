<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Casa_Jasmina
 * @since Casa Jasmina 1.0
 */
?>

		</div><!-- #main -->
		<footer id="main">  
			<div class="row margin-bottom">
			    <div class="large-12 small-6 columns">

			      <div class="row">
			        <div class="small-12 large-6 columns ">
			          <p class="headlines">
			            Powered by
			          </p>
			        </div>
			      </div>

			      <div class="row">

			        <div class="large-3 columns sponsor-logo">
			          <a href="http://www.arduino.cc" target="_blank"> <img src="http://sandbox.arduino.cc/casajasmina-dev/wp-content/uploads/2015/04/Arduino_logo.png"></a>
			        </div>

			        <div class="large-3 columns sponsor-logo">
			          <a href="http://www.toolboxoffice.it" target="_blank">  <img src="http://sandbox.arduino.cc/casajasmina-dev/wp-content/uploads/2015/04/logo_toolbox.png"></a>
			        </div> 

			        <div class="large-6 columns sponsor-logo margin-top">
			          <a href="http://www.energy-home.it" target="_blank">  <img src="http://sandbox.arduino.cc/casajasmina-dev/wp-content/uploads/2015/04/energy@home_logo.png"></a>
			        </div> 

			      </div>


			    </div>
		  </div>
		  <div class="arduino-footer">

		  	<div class="row">
		  		<div class="large-8 medium-8 columns">
	  				<ul class="inline-list">
		  				<li class="monospace">©2015 Arduino</li>
		  				<li>
		  					<a href="http://arduino.cc/en/Main/CopyrightNotice" target="_blank">Copyright Notice</a>
		  				</li>
		  				<li>
		  					<a href="http://arduino.cc/en/Main/ContactUs" target="_blank">Contact us</a>
		  				</li>
		  				<li>
		  					<a href="http://arduino.cc/Careers" target="_blank">Careers</a>
		  				</li>
	  				</ul>
	  			</div>

	  			<div class="large-4 medium-4 columns">
	  				<ul id="arduinoSocialLinks" class="arduino-social-links">
	  					<li>
	  						<a href="https://twitter.com/arduino" target="_blank">
	  							<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png">
	  						</a>
	  					</li>
	  					<li>
	  						<a href="http://www.facebook.com/official.arduino" target="_blank">
	  							<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png">
	  						</a>
	  					</li>
	  					<li>
	  						<a href="https://plus.google.com/+Arduino" target="_blank">
	  							<img src="<?php echo get_template_directory_uri(); ?>/images/gplus.png">
	  						</a>
	  					</li>
	  					<li>
	  						<a href="http://www.flickr.com/photos/arduino_cc" target="_blank">
	  							<img src="<?php echo get_template_directory_uri(); ?>/images/flickr.png">
	  						</a>
	  					</li>
	  					<li>
	  						<a href="http://youtube.com/arduinoteam" target="_blank">
	  							<img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png">
	  						</a>
	  					</li>
	  				</ul>
	  			</div>
	  		</div>

		  </div>
		</footer>
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>