<?php

    $fp = fopen('log.html', 'a');
    fwrite($fp, "<div class='msgln'><i>User". $_SESSION['name'] ." has left the chat session.</i><br></div>");
    fclose($fp);

?>