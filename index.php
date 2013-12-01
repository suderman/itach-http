<?php

# Where's the iTach?
$host = '10.0.0.4';
$port = 4998;

# Get the command from the URL
if (!isset($_SERVER["REDIRECT_URL"])) {
  echo 'IR command missing'; exit;
} else { 
  $cmd = ltrim($_SERVER["REDIRECT_URL"], '/') . '\r';
}

# Call command with netcat (twice)
$netcat = 'echo "' . $cmd . $cmd . '" | nc ' . $host . ' ' . $port;
$result = exec($netcat);

# Show unique results (remove dupes)
$arr = explode("\r" , $result);
$arr = array_unique($arr);
echo implode(" " , $arr);
