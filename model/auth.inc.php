<?php
class Auth {
    function login_form($message) {
        include(ROOT_DIR.'template/title.inc.php');
        ?>
        <form method="post" action="" id="" class="" enctype="multipart/form-data">
            <div>
            <input type="text" name="userno" value="<?php echo $userno; ?>">
            </div>
            <div>
            <input type="password" name="userpwd" value="<?php echo $userpwd; ?>">
            </div>
            <button type="submit">Login</button>
        </form>
        <?php
        include(ROOT_DIR.'template/tail.inc.php');
        die();
    }
    
    function login() {
        $userno = $_POST['userno'];
        $userpwd = $_POST['userpwd'];
        $url = 'http://192.168.100.197:82/api/auth.php';
        $data = array('userno' => $userno, 'password' => $userpwd);
        $options = array(
                'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            )
        );
        
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        print_r($result);
        $rs = json_decode($result);
        if ($rs['code'] != 1000) {
            include(ROOT_DIR.'template/title.inc.php');
            $this->login_form($rs['msg']);
            include(ROOT_DIR.'template/tail.inc.php');
            die();
        }
        
        include(ROOT_DIR.'template/title.inc.php');
        print_r(json_decode($result));
        include(ROOT_DIR.'template/tail.inc.php');
        die();
    }
}
?>