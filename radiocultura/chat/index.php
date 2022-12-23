<?php
 
  require_once "src/phpfreechat.class.php"; // adjust to your own path
  $params["serverid"] = md5(__FILE__); // used to identify the chat
  $chat = new phpFreeChat($params);
 
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
         "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html>
    <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <title>Bate Papo - Rádio Universal Fm</title>
    </head>
    <body>
      <?php $chat->printChat(); ?>
    </body>
  </html>