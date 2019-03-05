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
if(strpos($text, "/start") === 0 || $text=="/ciao" or $text=="/ciao@V0X2BOT")
{
	$response = "Ciao $firstname!";
}
elseif($text=="/social" or $text=="/social@V0X2BOT")
{
	$response = "Twitter: https://twitter.com/vox2box  \r\nInstagram: https://www.instagram.com/vox2box/ \r\nFacebook: https://www.facebook.com/vox2box/";
}
elseif($text=="/redazione" or $text=="/redazione@V0X2BOT")
{
	$response = "La gentile redazione è composta da 7 membri, in ordine di importanza: Marco Maioli, cinque a pari merito ovvero: Giulio Di Cienzo, Simone Donati, Francesco Lisanti, Francesco Mariani, Daniele Mazzanti e quell'altro, come si chiama, il sedicente direttore, Beppe Ruggiero";
}
elseif($text=="/sito")
{
	$response = "HAHAHAHAHAHAHAHAHAHAHA, \r\nno va beh, tieni: https://www.vox2box.com";
}
elseif($text=="/salta" or $text=="/salta@V0X2BOT")
{
	$response = "$firstname salta con noi";
}
elseif($text=="/handanovic" or $text=="/handanovic@V0X2BOT")
{
	$response = "https://www.disabili.com/legge-e-fisco/speciali-legge-a-fisco/legge-104-disabili";
}
elseif($text=="/gruppi" or $text=="/gruppi@V0X2BOT")
{
	$response = "https://t.me/vox2box/490889";
}
elseif($text=="/puntata" or $text=="/puntata@V0X2BOT")
{
	$response = "https://www.spreaker.com/show/vox-2-box";
}
elseif($text=="/sito@V0X2BOT")
{
	$response = "https://www.spreaker.com/show/vox-2-box";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
