    <div class="container-fluid">

      <div id="menu" class="jumbotron data-spy="affix"">
        <p class="skype_btn">
          <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
          <a href="skype:<?=$skype_id;?>?add"><img src="http://download.skype.com/share/skypebuttons/buttons/add_blue_white_195x63.png" style="border: none;" width="195" height="63" alt="Add me to Skype" /></a>
        </p>
        <p class="lead"><?=$first?> <?=$last?></p>
        <p><a href="#emailForm" role="button" class="btn" data-toggle="modal">Contact me...</a></p> 
        <p class="phone"><abbr title="Call to Portugal">Mobile:</abbr> <?=$mobile;?></p>
        
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

      <div class="alert alert-info">
            You can access this SRCODE2LOOKAT here: <code><a href="https://github.com/joaoasilva/srcode" target="_blank">https://github.com/joaoasilva/srcode</a></code>
          </div>

      <div class="footer">
        <p>&copy; SRCODE2LOOKAT <?=date('Y');?></p>
      </div>

    </div> <!-- /container -->    
     
    <!-- Modal -->
    <div id="emailForm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="emailFormLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="emailFormLabel">Please leave a message after the bip...</h3>
      </div>

      <form id="formContact" name="formContact">
        <div class="modal-body">
        
          <div class="control-group">
              <label class="control-label" for="txt_email">Email:</label>
              <div class="controls">
                  <input class="input-large required email" id="txt_email" name="txt_email" type="text" placeholder="Email" maxlength="60" size="30">
                  <p class="help-block"></p>
              </div>
          </div>
          <div class="control-group">
              <label class="control-label" for="txt_subject">Subject:</label>
              <div class="controls">
                  <input class="input-large required" id="txt_subject" name="txt_subject" type="text" placeholder="Subject" maxlength="60" size="30">
                  <p class="help-block"></p>
              </div>
          </div>
          <h3>bip!</h3>
          <div class="control-group">
              <label class="control-label" for="txt_message">Message:</label>
              <div class="controls">
                  <textarea id="txt_message" class="required" name="txt_message" placeholder="Message"></textarea>
                  <p class="help-block"></p>
              </div>
          </div>
        
        </div>
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          <input type="submit" class="btn btn-primary" value="Send...">
        </div>
      </form>  
    </div>    