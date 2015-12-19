
<div id="menu" class="col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <?php
            foreach(array_keys($tabMenu) as $e) {
                echo '<li><a href="#' . $tabMenu[$e] . '">' . $e .  '</a></li>';
            }
        
        
        ?>
    </ul>
</div>