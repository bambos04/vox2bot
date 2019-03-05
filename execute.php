<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="/ciao")
{
	$response = "Ciao $firstname!";
}
elseif($text=="/social")
{
	$response = "Twitter: https://twitter.com/vox2box  Instagram: https://www.instagram.com/vox2box/ Facebook: https://www.facebook.com/vox2box/";
}
elseif($text=="/redazione")
{
	$response = "La gentile redazione è composta da 7 membri, in ordine di importanza: Marco Maioli, cinque a pari merito ovvero: Giulio Di Cienzo, Simone Donati, Francesco Lisanti, Francesco Mariani, Daniele Mazzanti e quell'altro, come si chiama, il sedicente direttore, Beppe Ruggiero";
}
elseif($text=="/sito")
{
	$response = "HAHAHAHAHAHAHAHAHAHAHA, no va beh, tieni: https://www.vox2box.com";
}
elseif($text=="/salta")
{
	$response = "$firstname salta con noi";
}
elseif($text=="/handanovic")
{
	$response = "https://www.disabili.com/legge-e-fisco/speciali-legge-a-fisco/legge-104-disabili";
}
elseif($text=="/gruppi")
{
	$response = "https://t.me/vox2box/481340";
}
elseif($text=="/puntata")
{
	$response = "https://www.spreaker.com/show/vox-2-box";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
