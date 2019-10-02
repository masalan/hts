<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email
| -------------------------------------------------------------------------
| This file lets you define parameters for sending emails.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/libraries/email.html
|
*/
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";

$config['protocol'] = envItem('EMAIL_PROTOCOL', 'mail');
$config['smtp_host'] = envItem('SMTP_HOST', '');
$config['smtp_port'] = envItem('SMTP_PORT', 465);
$config['smtp_user'] = envItem('SMTP_USER', '');
$config['smtp_pass'] = envItem('SMTP_PASS', '');

/* End of file email.php */
/* Location: ./application/config/email.php */