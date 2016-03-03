<?php
    /**
     * Developed by Jay Gaha
     * http://jaygaha.com.np
    */

    include_once('class.database.php');
    include_once 'PasswordHash.php';

    class UserAuthentication extends Database{
        private $sql    = null;
        private $config = array(        
            'start_session' => true // change to false if you start PHP session manually
        );

        function __construct() {
            if ($this->config['start_session'] and !session_start())
                throw new Exception("Unable to start a session");
        }

        public function isLoggedIn() {
            if (isset($_SESSION['userauth_login'])) {
                $user_q = $this->connection->query("SELECT * FROM " . $this->config['database']['table'] . " WHERE " . $this->config['database']['fields']['login'] . " = '" . $this->connection->escape_string($_SESSION['userauth_login']) . "'");
                if(mysqli_num_rows($user_q) == 1) {
                    $user = mysqli_fetch_assoc($user_q);
                    if($user[$this->config['database']['fields']['session_id']] == session_id())
                        return true;
                }
            }
            return false;
        }

        public function logIn($login, $password) {
            if (isset($_SESSION['userauth_login']))
                unset($_SESSION['userauth_login']);
            
            $this->sql  = 'SELECT * FROM wmldir_users WHERE vemail = "kanika@gmail.com"';
            // $this->sql  = 'SELECT * FROM wmldir_users WHERE vemail = "' . trim($login) . '"';
            echo 'asd' . $this->data = $this->fetch_row_assoc($this->sql);
            
            if(!empty($this->data)){
                echo "<pre>";
                print_r($this->data);
                exit;
            }
            // return false;
        }
        
        public function logOut() {
            if($this->isLoggedIn()) {
                unset($_SESSION['userauth_login']);
                return true;
            }
            return false;
        }

        public function getLogin() {
            return $_SESSION['userauth_login'];
        }
    }