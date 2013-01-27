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