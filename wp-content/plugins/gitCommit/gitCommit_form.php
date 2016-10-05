<?php
?>
  <div class="header-git-commit">

  </div>

  <div class="row text-intro">
    <div class="medium-10 medium-offset-1 small-12 columns">
      <p id="text-intro">
        <h3>Society Lab / New Geographies</h3>
        <p>8 October - Venice Architecture Biennale</p>
        
        <br>
       
        <h3>Groupness//Groupless</h3>
        <p>
          Groupness//Groupless is an interactive data collection installation about physical communities, digital
          communities and identity, aiming to inform us about the parameters that will define our personal and social
          identities.
        </p>
        <p>
          With the rise of globalization and the internet digital revolution, borders between countries tend to blur,
          common grounds are less related to geographical boundaries and divisions are being formed according to a
          wide spectrum of parameters rather than geographical, such as fields of interests and opinion.
         
          <br></br>
          Project by: Cecilia Danieli, Omri Revesz, Mariana Riobom
          <br>
        </p>
      </p>
    </div>
  </div>

  <div style="display:flex;justify-content:center;align-items:flex-end">
    <div style="margin:0 20px">
      <a href="http://www.labiennale.org/">
        <div >
          <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/loghi/logo_biennale.png' />
        </div>
      </a>
    </div>

    <div style="margin:0 20px">
      <a href="http://www.mfa.fi/">
        <div>
          <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/loghi/mfa.png' />
        </div>
      </a>
    </div>

    <div style="margin:0 20px">
      <a href="http://frombordertohome.fi/">
        <div >
          <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/loghi/border.png' />
        </div>
      </a>
    </div>

    <div style="margin:0 20px">
      <a href="http://www.finnisharchitecture.fi/author/editor/">
        <div >
          <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/loghi/archinfo.png' />
        </div>
      </a>
    </div>

    <div style="margin:0 20px">
      <a href="/">
        <div>
          <img src='<?php echo bloginfo('template_directory') ?>/images/git-commit/loghi/jasmina.png' />
        </div>
      </a>
    </div>
  </div>
  <!--CLOSING MENU SECTION-->

  <hr>

  <div class=" row">
    <div class="medium-10 medium-offset-1 columns">

      <div class="row" id="perceptionVsFacts">
        <div class="large-12 columns">
          <div class="background-text yellow title">
            <h1>PERCEPTION VS FACTS</h1>
          </div>
          <div class="background-text yellow">
            <p style="text-transform:uppercase;">How many foreigners are currently living in your country?</p>
          </div>
          <p class="text-questions">
            More commonly than what we think we overstate or lessen the number of foreigners in our countries. Why
            would someone come to live in your home country?
          </p>
          <form class="question" name="perceptionVsFacts" method="post" action="javascript:void(0);">
            <textarea class="text-form" type="text" name="perceptionVsFacts" >
            </textarea>
            <input type="submit" name="Submit" value="submit" class="button base primary"/>
          </form>
        </div>
      </div>

      <hr>

      <div class="row" id="trust">
        <div class="large-12 columns">
          <div class="background-text orange title">
            <h1>TRUST</h1>
          </div>
          <div class="background-text orange">
            <p>What does it take for you to trust something or someone?</p>
          </div>

          <p class="text-questions">
            What does it take to let your guard down? How do you know your web seller is trustworthy? How deeply do
            you trust the 'Tripadvisor' reviews? What makes you trust somebody to stay at your home through 'airbnb'?
          </p>

          <form  class="question"  name="trust"  method="post" action="javascript:void(0);">
            <textarea class="text-form" type="text" name="trust" ></textarea><br>
            <input type="submit" name="Submit" value="submit" class="button base primary"/>
          </form>
        </div>
      </div>

      <hr>

      <div class="row" id="identity">
        <div class="large-12 columns">
          <div class="background-text red title">
            <h1>IDENTITY</h1>
          </div>
          <div class="background-text red">
            <p>What does define your identity? Please order the following 'values' from the most to the less
                valuable to you, in terms of defining who you are.</p>
          </div>
          <p class="text-questions">
            <ol type="a">
              <li>Country</li>
              <li>Family</li>
              <li>Friends</li>
              <li>Home town</li>
              <li>Language</li>
              <li>National food</li>
              <li>Religion</li>
              <li>Other</li>
            </ol>
          </p>
          <form class="question"  name="identity"  method="post" action="javascript:void(0);">
            <textarea class="text-form" type="text" name="identity" ></textarea><br>
            <input type="submit" name="Submit" value="submit" class="button base primary"/>
          </form>
        </div>
      </div>

    </div>
  </div>

  <div class="row text-intro">
    <div class="medium-10 medium-offset-1 small-12 columns">
      <p id="text-intro">
        Society Lab transforms housing solutions into a digital platform, that will connect and merge request and
        offer: asylum seekers with vacant house, optimising and managing all resources. The system consists a
        first step towards integration: refugees won’t be dwelled in new quarters and segregated from society, while
        locals will have the possibility to interact, and benefit from their presence.
      </p>
    </div>
  </div>


  <!-- <div class="row git-commit-icons" id="sticky-menue">
    <div class="large-12 small-12 columns large-centered">

      <div class="large-3 small-3 columns topics">
        <a href="#privacy" class="red">
          <img class="icon" src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon4.svg' />
          <span class="name">PRIVACY</span>
        </a>
      </div>

      <div class="large-3 small-3 column topics">
        <a href="#familiar" class=" yellow">
          <img class="icon" src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon3.svg' />
          <span class="name">
            FAMILIAR OBJECTS
          </span>
        </a>
      </div>

      <div class="large-3 small-3 columns topics">
        <a href="#open" class=" gold">
          <img class="icon" src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon2.svg' />
          <span class="name">
            OPEN DESIGN
          </span>
        </a>
      </div>


      <div class="large-3 small-3 columns topics ">
        <a href="#social" class=" blue">
          <img class="icon" src='<?php echo bloginfo('template_directory') ?>/images/git-commit/Icon1.svg' />
          <span class="name">
            SOCIAL INTERACTION
          </span>
        </a>
      </div>

    </div>
  </div> -->

<div id="subscription" class="hide">
  <div class="container" id="subscriptioninside">
    <div class="row">
      <div class="medium-7 columns">
        <div class="title">
          <h1>Thanks for your contribution</h1>
        </div>
        <div class="subtitle">
          <p>Thanks for taking the time to respond to this question</p>
          <p>Subscribe to Casa Jasmina's newsletter to stay updated about the next events</p>
        </div>
      </div>
      <div class="medium-5 columns">
        <div class="pupi">
          <img src="<?php echo bloginfo('template_directory') ?>/images/pupi.svg">
        </div>
      </div>
    </div>
    <div class="row newsletter">
      <div class="medium-7 columns">
    <?php
      if( function_exists( 'mc4wp_show_form' ) ) {
        mc4wp_show_form();
      }
    ?>
    </div>
  </div>
        <!-- <form id="subscribe-form"name="newsletter" class="newsletter" method="post" action="javascript:void(0);">
          <input type="text" name="email" value="" />
          <input type="submit" name="Submit" value="register" class="button base primary"/>
          <input type="submit" name="cancel" value="no thanks" class="button base secondary cancel"/>

        </form>  -->


  </div>
</div>


      <script type="text/javascript">
            $(".question").submit(function(event){
              var label=event.currentTarget.name
              var message=$("#"+label+" .text-form").val();
              if (message.length>140){
                var title=message.substring(0, 140)+"...";
              }else{
                title=message;
              }
              console.log(label);
              console.log(message);

                $.post('<?php echo  $url = plugin_dir_url(gitCommit);?>gitCommit/gitCommit_api.php', {label:label,message:message,title:title}, function(result){
                    console.log(result); // the result variable will contain any text echoed by getResult.php
                    $("#subscription").removeClass("hide");
                    clearForms();
                });
                return(false);
            });

            $('a').click(function(){
                $('html, body').animate({
                    scrollTop: $( $.attr(this, 'href') ).offset().top-100
                }, 500);
                return false;
            });

          // $(window).scroll(function(){
          //
          //     if ($('#privacy').visible(true)) {
          //       $( "#sticky-menue" ).insertAfter("#privacy");
          //       console.log("privacy");
          //
          //     }else if ($('#familiar').visible(true)) {
          //       $( "#sticky-menue" ).insertAfter($('#familiar'));
          //       console.log("familiar");
          //
          //     }else if ($('#open').visible(true)) {
          //       $( "#sticky-menue" ).insertAfter($('#open'));
          //       console.log("open");
          //
          //     }else if ($('#social').visible(true)) {
          //       console.log("familiar");
          //       $( "#sticky-menue" ).insertAfter($('#social'));
          //       console.log("social");
          //
          //     }
          //
          //   });



            var over;

            $('#subscriptioninside').mouseenter(function(){
              over=true;
            });
            $('#subscriptioninside').mouseleave(function(){
              over=false;
            });
            $("#subscription").click(function(event) {
              if(!over){
                $("#subscription").addClass("hide");
              }
            });

            $('#subscription .cancel').click(function(){
              $("#subscription").addClass("hide");
            });

            function clearForms(){
              $('form').trigger("reset");
            }

      </script>
