
<?php
//require_once './vendor/autoload.php';
//use Twilio\TwiML\VoiceResponse;

//$response = new VoiceResponse();
//$response->play('https://alutechnologies.github.io/web/diamond.mp3');

//echo $response;

header('Content-Type: audio/mpeg');
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";
?>

<Response>
    <Play>https://alutechnologies.github.io/web/diamond.mp3</Play>
</Response>
