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
    	$('#menu').affix();
    	$('.tolinks').urlToLink({target:'_blank'});
    </script>