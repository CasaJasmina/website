  <?php
/**
* The template for displaying all projects
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that other
* 'pages' on your WordPress site will use a different template.
*
* @package WordPress
* @subpackage Casa_Jasmina
* @since Casa Jasmina 1.0
*/

get_header(); ?>

<div class="header-git-commit">
</div>

<div class="row text-intro">
<p id="text-intro"> "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
</p>
</div>

<div class="row "><div class="large-12 columns large-centered text-questions-header">WE WOULD LOVE TO HAVE YOUR INPUT ON ONE OF THOSE TOPICS</div></div>



        <div class="row git-commit-icons">
          <div class="large-12 small-12 columns large-centered">

            <div class="large-3 small-3 columns topics">
              <a href="#" class="red">
                <div > <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon4.svg' /> </div>
                <div > PRIVACY</div>
              </a>
            </div>

            <div class="large-3 small-3 column topics">
                <a href="#" class=" yellow">
                  <div> <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon3.svg' /></div>
                <div > FAMILIAR OBJECTS</div>
            </a>
          </div>

            <div class="large-3 small-3 columns topics">
              <a href="#" class=" gold">
                  <div > <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon2.svg' /></div>
                <div > OPEN DESIGN</div>
            </a>
          </div>

              <div class="large-3 small-3 columns topics ">
                <a href="#" class=" blue">
                  <div > <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon1.svg' /></div>
                <div> SOCIAL INTERACTION</div>
              </a>
            </div>

          </div>
        </div>

<hr>

<div class="row">
  <divclass="large-12 columns">
  <div class="background-text yellow">
    <h1>DATA AND PRIVACY </h1></br></br>
<p>IS THERE ANITHYNG ABOUT YOUR LIFE YOU WOULD NEVER SHARE ONLINE?</p>
  </div>
      <p id="text-questions"> In the house of the future would you share the information about your everyday activities
                          and habits with other people? Are you willing to share the conversations you have with your
                          relatives, flatmates, friends? The times you use an object or piece of  furniture? Your sleeping
                          behaviours? The food you eat? The tv series you watch?
      </p>
      <form>
        <textarea class="text-form" type="text" name="Question1" ></textarea><br>
      </form>
      <a href="#" class="button buttonGit">submit</a>
  </div>

<hr>

<div class="row">
  <divclass="large-12 columns">
  <div class="background-text orange">
    <h1>Familiar objects </h1></br></br>
<p>What are three objects you would like to find at Casa Jasmina that would make the apartment more familiar to you?</p>
  </div>
      <p id="text-questions"> What objects make a space feel like a home? What makes it more familiar to you? What makes your stay in a place more comfortable? What sparks good memories at home?
      </p>
      <form>
        <textarea class="text-form" type="text" name="Question1" ></textarea><br>
      </form>
      <a href="#" class="button buttonGit">submit</a>
  </div>

<hr>

<div class="row">
  <divclass="large-12 columns">
  <div class="background-text red">
    <h1>Open Design </h1></br></br>
<p>What do you imagine smart furniture to be like?  </p>
  </div>
      <p id="text-questions"> What does smart furniture mean to you?? How could a smart table enhance your work experience? Or your dining  experience? What information would you access if your bedroom or kitchen could talk with you or with each other?
      </p>
      <form>
        <textarea class="text-form" type="text" name="Question1" ></textarea><br>
      </form>
      <a href="#" class="button buttonGit">submit</a>
  </div>

<hr>

<div class="row">
  <divclass="large-12 columns">
  <div class="background-text gold">
    <h1>Social interaction</h1></br></br>
<p>Do you prefer to communicate with text, voice or video? </p>
  </div>
      <p id="text-questions"> What do you use to communicate with your friends? How many hours a day are you on internet? Who’s the last person you contacted through the internet?
                              Which part of your body you will use to communicate in the house of the future?
      </p>
      <form>
        <textarea class="text-form" type="text" name="Question1" ></textarea><br>
      </form>
      <a href="#" class="button buttonGit">submit</a>
  </div>

<!--
  <div class="git-footer">
    <div class="row">
      <div class="large-12 small-12 columns large-centered">
        <div class="large-3 small-3 columns ">PRIVACY</div>
        <div class="large-3 small-3 columns ">PRIVACY</div>
        <div class="large-3 small-3 columns ">PRIVACY</div>
        <div class="large-3 small-3 columns ">PRIVACY</div>
      </div>
    </div>
  </div>
-->


	<?php get_footer(); ?>

<script>
/*
$(document).ready(function(){
  $(window).scroll(function() {
      if ($(this).scrollTop() > 200) {
          $(".git-commit-footer").addClass("sticky");
      } else if ($(this).scrollTop() < 200) {
          $(".git-commit-footer").removeClass("sticky");
      }
  });
});
*/
</script>
