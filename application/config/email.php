<?php

$config = [
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.gmail.com',
  'smtp_user' => getenv('SMTP_USER'),
  'smtp_pass' => getenv('SMTP_PASS'),
  'smtp_port' => 465,
  'mailtype' => 'html',
  'charset' => 'utf-8',
  'wordwrap' => TRUE,
  'newline' => "\r\n"
];
