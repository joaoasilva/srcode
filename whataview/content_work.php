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