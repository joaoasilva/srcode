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