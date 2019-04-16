<?php
class Session{
    /** Session start */
    public function start()
    {
        if(!headers_sent() && !session_id()){
            if(session_start()){
                session_regenerate_id();
                return true;
            }
        }
        return false;
    }
    /** Set time for cookie */
    public function cookie($lifetime)
    {
        session_set_cookie_params ($lifetime);
        setcookie(session_name(),session_id(),time() + $lifetime);
    }
    /** Started Get key,val */
    public function get($key,$default)
    {
        return $_SESSION[$key] = $default;
    }
    /** Chacking if you session delete that logout*/
    public function delete($Key)
    {
        unset($_SESSION[$Key]);
        session_destroy();
        //         return false;
    }
    /** Redirect on customer page */
    public function redirectAdmin($Key,$redirectAdmin)
    {
        if (!isset($_SESSION[$Key])){
            header('location: ' . $redirectAdmin);
            die();
        }
    }
    /** Redirect on admin page */
    public function redirect($Key,$redirect)
    {
        if(isset($_SESSION[$Key])){
            header('Location: ' . $redirect);
            die();
        }
    }
}
$Session = new Session();