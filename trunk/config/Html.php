<?php

class Html {

    public function redirect($url) {
        echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=' . $url . '">';
        exit;
    }

}

?>
