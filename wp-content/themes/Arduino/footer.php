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

			<div class="row">


				<div class="large-6 medium-6 small-6 columns">
					<p class="headlines sinistra">
						Powered by
					</p>

					<div class="s-logo">
						<a href="/" target="_blank">
						<img class="logoleft toolbox" src="<?php echo get_template_directory_uri(); ?>/images/s_logos/officine innesto.png">
						</a>
					</div>
					<div class="s-logo">
						<a href="http://www.toolboxoffice.it" target="_blank">
						<img class="logoleft toolbox" src="<?php echo get_template_directory_uri(); ?>/images/s_logos/toolbox.png">
						</a>
					</div>
				</div>

				<div class="large-6 medium-6 small-6 columns">
					<p class="headlines destra">
	            		Supported by
	          		</p>

					<div class="s-logo ">
		          		<a href="http://www.valcucine.com" target="_blank">
		          			<img class="logoright" src="<?php echo get_template_directory_uri(); ?>/images/s_logos/valcucine.png">
		            	</a>
		        	</div>

		        	<div class="s-logo  ">
		          		<a href="http://www.energy-home.it" target="_blank">
		          			<img class="logoright" src="<?php echo get_template_directory_uri(); ?>/images/s_logos/energyAtHome.png">
		           		</a>
		        	</div>
		        </div>

			</div>



		  <!--<div class="arduino-footer">

		  	<div class="row">
		  		<div class="large-8 medium-8 columns">
	  				<ul class="inline-list">
		  				<li class="monospace">©2017 Officine Innesto</li>
	  				</ul>
	  			</div>

	  			<div class="large-4 medium-4 columns">
	  				<ul id="arduinoSocialLinks" class="arduino-social-links">
							<li>
								<a href="mailto:d.gomba@officine.cc" target="_blank">
									<img src="<?php echo get_template_directory_uri(); ?>/images/mail.png">
								</a>
							</li>
	  					<li>
	  						<a href="https://twitter.com/casajasmina" target="_blank">
	  							<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png">
	  						</a>
	  					</li>
	  					<li>
	  						<a href="https://www.facebook.com/casajasmina.to" target="_blank">
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


		  </div>-->
		</footer>
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>

</html>
