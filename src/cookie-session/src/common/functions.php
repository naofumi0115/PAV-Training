<?php
function destroySession() {
    session_unset();
    session_destroy();
}

?>