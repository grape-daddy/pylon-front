<?php
include("server.inc.php");
include(ROOT_DIR . "common/db.inc.php");
include(ROOT_DIR . "init.inc.php");
include(ROOT_DIR . "model/auth.inc.php");

$auth = new auth();
if ($_POST) {
    $auth->login();
} else {
    $auth->login_form();
}


?>