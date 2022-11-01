<?php
    session_start();
    session_destroy();
    echo "<script> redirect('admin/login.php'); </script>";
?>

<script>
const redirect = (url) => {
    window.location.href = window.location.protocol + '//' + window.location.hostname + '/' + url;
}
</script>