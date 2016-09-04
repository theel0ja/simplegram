<?php
  /*
    Simplegram
    A simple Telegram bot written with PHP. Good start for making own bots.
    https://github.com/theel0ja/Mailgram

  */

  // Prevent "Notice:  Undefined variable: request".
  $request = "";
  // Prevent using direct access
  if(isset($security)) {
    if($security != "" && $security == "e91e6348157868de9dd8b25c81aebfb9") {

    }
    else{
      echo "Error - Security Error";
      exit();
    }
  }
  else {
    echo "Error - Security Error";
    exit();
  }

  // Send message to channel
  function SendMessageToChannel($text, $channelname) {
    global $security;
    if($text != "" && $channelname != "") {
      $request = "sendMessage?text=".$text."&chat_id=@".$channelname;
      require("functions2.php");
    }
    else{
      echo "Error - Inputs are empty";
      exit();
    }
  }

  // Get Bot info
  function getMe() {
    global $security;

    $request = "getMe";
    require("functions2.php");
  }

  // Get Channel info
  function getChannel($channelname) {
    global $security;
    if($channelname != "") {
      $request = "getChat?chat_id=@".$channelname;
      require("functions2.php");
    }
    else{
      echo "Error - Inputs are empty";
      exit();
    }
  }
?>