<?php
  /*
    Simplegram
    A simple Telegram bot written with PHP. Good start for making own bots.
    https://github.com/theel0ja/Mailgram

  */

    // Prevent direct access
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

  // Settings
  $botToken = 'YOURBOTTOKEN';
  $apiURL = 'https://api.telegram.org/bot'.$botToken.'/'.$request;
  $userAgent = "Simplegram; (PHP/".phpversion()."; +https://github.com/theel0ja/simplegram)";
  // Headers
  $headers = array(
    'http'=>array(
      'method'=>"GET",
      'header'=>"Accept-language: fi;q=1.0\n" .
                "upgrade-insecure-requests: 1\n" .
                "user-agent: " . $userAgent . "\n" .
                "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8\n"
    )
  );

  // Load it
  $context = stream_context_create($headers);
  $pageContent = @file_get_contents($apiURL, false, $context);
  
  // Check if it's handled without errors
  if($pageContent === FALSE) {
      // Show Error
      echo "Error - Downloading the content failed";
  }
  // If we did it without errors, show answer.
  else {
    // Parse JSON to human readable
    $pageContent = json_decode($pageContent);
    $pageContent = json_encode($pageContent, JSON_PRETTY_PRINT);

    // return it!
    echo $pageContent;
  }
?>