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


								<div class="large-4 columns">
			          <p class="headlines sinistra">
			            Supported by
			          </p>


							<div class="s-logo">
								<a href="http://www.arduino.cc" target="_blank">
								<img class="logoleft" src="<?php echo get_template_directory_uri(); ?>/images/s_logos/arduino_genuino.png">
								</a>
							</div>

							<div class="s-logo">
								<a href="http://www.toolboxoffice.it" target="_blank">
								<img class="logoleft" src="<?php echo get_template_directory_uri(); ?>/images/s_logos/toolbox.png">
								</a>
							</div></div>



									<div class="large-4 columns">
										<p class="headlines destra">
					            Powered by
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
			        </div></div>

</div></div>
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
	  		</div>

		  </div>
		</footer>
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22581631-10', 'auto');
  ga('send', 'pageview');

  </script>
</html>
