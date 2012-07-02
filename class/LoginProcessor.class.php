<?php
/**
 * Diese Seite bearbeitet Login-Requests
 * @author Tjark Saul <tjark@saul.li>
 * @copyright Copyright (c) 2012 Tjark Saul. All rights reserved.
 */
class LoginProcessor
{
    public function __construct()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ret = array();
        if ($_SESSION['session']->login($username, $password))
        {
            $ret['message'] = 'Erfolgreich eingeloggt.';
            $ret['error'] = 0;
        }
        else
        {
            $ret['error'] = $_SESSION['session']->getLoginErrno();
            $ret['message'] = $_SESSION['session']->getLoginError();
        }
        header("Content-type: application/json");
        print json_encode($ret);
    }
}
