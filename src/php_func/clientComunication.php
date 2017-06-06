<?php

function error($msg) {
    echo
    "{
        \"error\" : true,
        \"message\" : \"$msg\"
    }";
}

function ok() {
    echo
    "{
        \"error\" : false
    }";
}




?>