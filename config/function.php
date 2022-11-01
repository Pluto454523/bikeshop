<?php


function alert($msg, $url = null) {
    echo "<script> 
        alert('$msg'); 
    </script>";

    if ($url) {
        echo "<script>
            window.location.href = '$url';
        </script>";
    }
}

?>