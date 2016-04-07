<?php
?>
  <div class="header-git-commit">

  </div>

  <div class="row text-intro">
    <p id="text-intro">
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
    </p>
  </div>

  <div class="row ">
    <div class="large-12 columns large-centered text-questions-header">
      WE WOULD LOVE TO HAVE YOUR INPUT ON ONE OF THOSE TOPICS
    </div>
  </div>

  <div class="row git-commit-icons">
    <div class="large-12 small-12 columns large-centered">


      <div class="large-3 small-3 columns topics">
        <a href="#" class="red">
          <div >
            <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon4.svg' />
          </div>
          <div >
            PRIVACY
          </div>
        </a>
      </div>

      <div class="large-3 small-3 column topics">
        <a href="#" class=" yellow">
          <div>
            <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon3.svg' />
          </div>
          <div>
            FAMILIAR OBJECTS
          </div>
        </a>
      </div>

      <div class="large-3 small-3 columns topics">
        <a href="#" class=" gold">
          <div >
            <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon2.svg' />
          </div>
          <div>
            OPEN DESIGN
          </div>
        </a>
      </div>


      <div class="large-3 small-3 columns topics ">
        <a href="#" class=" blue">
          <div>
            <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon1.svg' />
          </div>
          <div> SOCIAL INTERACTION</div>
        </a>
      </div>

    </div>
  </div>
  <!--CLOSING MENU SECTION-->
  <hr>

    <div class="container">

  <div class="row">
    <div class="large-12 columns">
      <div class="background-text yellow">
          <h1>DATA AND PRIVACY </h1>
      <p>IS THERE ANITHYNG ABOUT YOUR LIFE YOU WOULD NEVER SHARE ONLINE?</p>
      </div>
      <p class="text-questions">
        In the house of the future would you share the information about your everyday activities and habits with other people? Are you willing to share the conversations you have with your relatives, flatmates, friends? The times you use an object or piece of  furniture? Your sleeping behaviours? The food you eat? The tv series you watch?
      </p>
      <form name="privacy" id="privacy" method="post" action="javascript:void(0);">
        <textarea class="text-form" type="text" name="privacy" >
        </textarea>
        <input type="submit" name="Submit" value="submit" class="button buttonGit"/>
      </form>
    </div>
  </div>

    <hr>

    <div class="row">
      <div class="large-12 columns">
        <div class="background-text orange">
          <h1>Familiar objects </h1>
          <p>What are three objects you would like to find at Casa Jasmina that would make the apartment more familiar to you?</p>
        </div>
        <p class="text-questions"> What objects make a space feel like a home? What makes it more familiar to you? What makes your stay in a place more comfortable? What sparks good memories at home?
        </p>

        <form name="familiar" id="familiar" method="post" action="javascript:void(0);">
          <textarea class="text-form" type="text" name="familiar" ></textarea><br>
          <input type="submit" name="Submit" value="submit" class="button buttonGit"/>
        </form>
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="large-12 columns">
        <div class="background-text red">
          <h1>Open Design </h1>
          <p>What do you imagine smart furniture to be like?  </p>
        </div>
        <p class="text-questions">
          What does smart furniture mean to you?? How could a smart table enhance your work experience? Or your dining  experience? What information would you access if your bedroom or kitchen could talk with you or with each other?
        </p>
        <form name="open" id="open" method="post" action="javascript:void(0);">
          <input type="textarea" class="text-form" type="text" name="open" ></textarea><br>
          <input type="submit" name="Submit" value="submit" class="button buttonGit"/>
        </form>
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="large-12 columns">
        <div class="background-text gold">
          <h1>Social interaction</h1>
          <p>Do you prefer to communicate with text, voice or video? </p>
        </div>
        <p class="text-questions">
          What do you use to communicate with your friends? How many hours a day are you on internet? Who’s the last person you contacted through the internet? Which part of your body you will use to communicate in the house of the future?
        </p>
        <form name="social" id="social" method="post" action="javascript:void(0);">
          <textarea class="text-form" type="text" name="social" ></textarea><br>
          <input type="submit" name="Submit" value="submit" class="button buttonGit"/>
        </form>
      </div>
    </div>
  </div>





      <script type="text/javascript">
            $("form").submit(function(event){
              var label=event.currentTarget.id
              var message=$("#"+label+" .text-form").val();

              console.log(label);
              console.log(message);

                $.post('<?php echo  $url = plugin_dir_url(gitCommit);?>gitCommit/gitCommit_api.php', {label:label,message:message}, function(result){
                    console.log(result); // the result variable will contain any text echoed by getResult.php
                });
                return(false);
            });
      </script>
