<div class="container col-lg-4"></div>
<div class="container col-lg-4 info">
<div align="center">
    <?php
        foreach ($data as $value){
            echo '<h2>' . $value['inform_name'] . ': '. $value['inform_description']. '</h2>' .'<br/>';
        }
    ?>
</div>
</div>
<div class="container col-lg-4"></div>
