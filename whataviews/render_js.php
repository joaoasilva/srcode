<?php

    // Le javascript
    //==================================================
    //Placed at the end of the document so the pages load faster
    foreach($js_files as $key => $val){
        ?><script src='bootstrap/js/<?=$val;?>.js'></script>
        <?php
    }
    ?>
    <script type="text/javascript">

        $(document).ready(function(){
            $("#formContact").validate({
                submitHandler: function(form) {
                    $.post("index.php", $("#formContact").serialize(), function(data){
                        alert(data);
                        $('#emailForm').modal('hide')
                    });
                }
            });
            $('#menu').affix();
            $('.tolinks').urlToLink({target:'_blank'});
        });


        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-37826008-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>