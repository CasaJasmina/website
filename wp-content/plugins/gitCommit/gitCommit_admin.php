<?php
    if ($_POST['gitCommit_hidden'] == 'Y') {
        //Form data sent
        $repo = $_POST['gitCommit_repo'];
        update_option('gitCommit_repo', $repo);

        $clientID = $_POST['gitCommit_clientID'];
        update_option('gitCommit_clientID', $clientID);

        $clientSecret = $_POST['gitCommit_clientSecret'];
        update_option('gitCommit_clientSecret', $clientSecret);
        ?>
        <div class="updated"><p><strong><?php _e('Options saved.');
        ?></strong></p></div>

        <?php

    } else {
        //Normal page display
        $repo = get_option('gitCommit_repo');
        $clientID = get_option('gitCommit_clientID');
        $clientSecret = get_option('gitCommit_clientSecret');

    }
        ?>


<div class="wrap">
    <?php    echo '<h2>gitCommit</h2>'; ?>





    <form name="gitCommit_form" method="post" action="<?php echo  $_SERVER['REQUEST_URI']; ?>">
    <input type="hidden" name="gitCommit_hidden" value="Y">

        <?php echo '<h4>gitCommit Settings</h4>'; ?>

        <p>
          app clientID:
          <input type="text" name="gitCommit_clientID" value="<?php echo $clientID; ?>" size="100">
        </p>
        <p>
          app clientSecret:
          <input type="text" name="gitCommit_clientSecret" value="<?php echo $clientSecret; ?>" size="100">
        </p>
        <p>
          githubrepo:
          <input type="text" name="gitCommit_repo" value="<?php echo $repo; ?>" size="100">
        </p>

        <p class="submit">
        <input type="submit" name="Submit" value="<?php echo 'Update Options'; ?>" />
        </p>
    </form>
</div>

<?php echo(Showtest()); ?>
