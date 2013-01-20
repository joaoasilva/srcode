    <div class="container-fluid">

      <div id="menu" class="jumbotron data-spy="affix"">
        <p class="skype_btn">
          <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
          <a href="skype:<?=$skype_id;?>?add"><img src="http://download.skype.com/share/skypebuttons/buttons/add_blue_white_195x63.png" style="border: none;" width="195" height="63" alt="Add me to Skype" /></a>
        </p>
        <p class="lead"><?=$first?> <?=$last?></p>
        <p><abbr title="Call to Portugal">Mobile:</abbr> <?=$mobile;?></p>
        <span class="add-on"><a href="mailto:<?=$email;?>"><i class="icon-envelope"></i>&nbsp;<?=$email;?></a></span> 
      </div>

      <div class="title">
        <p>Profile</p>
      </div>

      <hr>  

      <div class="row-fluid">
        <div class="span12 justify-text">
          <?=$profile?>
        </div>        
      </div>

      <div class="title">
        <p>Skills</p>
      </div>

      <hr>

      <div class="row-fluid show-grid">
        <?php
          $counted = '';
          foreach($skills as $skill){

            if ($counted%4 === 0 && $counted !== ''){
              echo '</div><div class="row-fluid show-grid">';
            }

            echo '<div class="span3">' . $skill . '</div>
            ';

            $counted++;
        }?>
      </div>

      <div class="title">
        <p>Studies and Awards</p>
      </div>

      <hr>

      <?php foreach($studies as $year => $description){?>
      <div class="row-fluid">
        <div class="span3">
          <?=$year?>
        </div>
        <div class="span9">
          <?=$description?>
        </div>        
      </div>   
      <?php }?>

      <div class="title">
        <p>Work Experience</p>
      </div>

      <hr>
      <?php foreach($works as $last_year => $details){?>
        <div class="row-fluid">
          <div class="span12 well well-small">
            <div class="span4 align-left">
              <?php echo $details['start_month'] . " " . $details['start_year'] . " - " . $details['last_month'] . " " . $last_year; ?>
            </div>
            <div class="span4 center-text">
              <?=$details['name'];?>
            </div> 
            <div class="span4 align-right">
              <?=$details['role'];?>
            </div>
          </div>         
        </div>
        <div class="row-fluid tolinks">
          <div class="span12 justify-text">
            <p><?=$details['activity'];?></p>
            <?php if ( trim($details['description']) ){
              echo '<p><b>Projects and related technologies</b></p>';
              echo $details['description'];
            } ?>
            <?php if ( trim($details['technologies']) ){
              echo '<br><p>Used technologies: ';
              echo $details['technologies'].'</p>';
            } ?>            
          </div>        
        </div>
      <?php }?>      

      <?php foreach($others as $other){ ?>
      <div class="title">
        <p><?=$other['title'];?></p>
      </div>

      <hr>

      <div class="row-fluid">
        <div class="span12">
          <blockquote><?=$other['description'];?></blockquote>
        </div>        
      </div>

      <?php }?>

      <hr>

      <div class="footer">
        <p>&copy; SCRODE2LOOKAT <?=date('Y');?></p>
      </div>

    </div> <!-- /container -->