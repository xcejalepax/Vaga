<?php
$group = Assets::BODY_END;
if(!empty($assets[$group])) {
    foreach($assets[$group]['js'] as $filename){
        ?><script type="text/javascript" src="/assets/js/<?php echo $filename ?>"></script><?php
    }
    foreach($assets[$group]['css'] as $filename){
        ?><link type="text/css" href="/assets/css/<?php echo $filename ?>" rel="stylesheet"><?php
    }
}
?>

    </body>
</html>