<?php

//DEBUG
function console_log($data) {

    //echo "<script>console.log(JSON.parse('" . json_encode($data) . "'));</script>";
    echo "<script>console.log(" . json_encode($data) . ");</script>";
}

?>