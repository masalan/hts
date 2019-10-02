<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Users_model extends CI_Model
{
    public function check()
    {
        $this ->db ->query("SELECT * FROM users WHERE email = ? AND password = ?",
            array($this ->input ->post('i10n', true), sha1($this ->input ->post('mdp'))));
    }
}

/* End of file users.php */
/* Location: ./application/models/auth/users.php */