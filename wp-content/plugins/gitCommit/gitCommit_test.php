<?php
?>
      <script   src="<?php echo(get_template_directory_uri())?>/js/jquery.js"></script>


      <form name="gitCommit_form" id="test" method="post" action="javascript:void(0);">
        <input type="hidden" name="gitCommit_hidden" value="F">
        <input type="submit" name="Submit" value="testapi"/>
      </form>


      <script type="text/javascript">
            $("#test").submit(function(){
                var str = $(this).serialize();
                console.log(str);
                $.post('<?php echo( $url = plugin_dir_url( gitCommit ));?>gitCommit/gitCommit_api.php', str, function(result){
                    console.log(result); // the result variable will contain any text echoed by getResult.php
                });
                return(false);
            });
      </script>
