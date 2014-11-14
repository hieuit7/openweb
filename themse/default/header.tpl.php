<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta name="author" content="hieu nguyen" />

	<title><?php echo $registry->get('title')?></title>
    <?php 
        if(is_array($css = $themes_css))
        {
            foreach ($css as $link)
            {
                echo '<link href="' . $link['path'] . '" rel="stylesheet" type="text/css"/>'."\n\t";
            }
        }
    ?>
<style><?php

if (is_array($SYSTEM['style']))
{
    //neu co mot nhieu style trong nay thi dung cai nay;
    foreach ($SYSTEM['style'] as $style)
    {
        echo $style;
    }
} else
{
    // nguoc lai chi dung mot cai;
    echo $SYSTEM['style'];
}

?>
    </style>
        <?php

    if (is_array($javascript=$themes_javascript))
    {
        foreach ($javascript as $script)
        {
            echo '<script src="' . $script['path'] . '" type="text/javascript"></script>';
        }
    } else
    {
        echo '<script src="' . $SYSTEM['script'] . '"></script>';
    }

?>
    
</head>