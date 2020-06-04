<?php

$config = [
  'protocol' => 'smtp',
  'smtp_host' => 'smtp.mailtrap.io',
  'smtp_user' => getenv('SMTP_USER'),
  'smtp_pass' => getenv('SMTP_PASS'),
  'smtp_port' => 2525,
  'mailtype' => 'html',
  'charset' => 'utf-8',
  'wordwrap' => TRUE,
  'newline' => "\r\n"
];
