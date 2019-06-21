<?php
session_start();
if (isset($_SESSION['log_in_escritorio'])) {
    unset($_SESSION['log_in_escritorio']);
}
echo '<script>window.location.href="../../../escritorio-virtual"</script>';
