<?php
    $url = $_GET["url"];
    $go_back = "http://rss.opentbc.nl";

    $handle = popen("LANG=en_US.UTF-8 /home/eco/bin/apps/static-rss/static-rss subscribe=$url >> /tmp/StaticRSS.log 2>&1 &", 'r');
    $line = "";

    while (false !== ($char = fgetc($handle))) 
    {
        if ($char == "\r") 
        {
            // You could now parse the $line for status information.
            echo "$line\n";
            $line = "";
        }

        else {
            $line .= $char;
        }

        ob_flush();
        flush();

    }

    pclose ($handle);
    header ("location: $go_back");
?>

