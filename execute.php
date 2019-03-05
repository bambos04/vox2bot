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
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";//non lo prende perché fa riferimento alla chat da cui viene invocato e non all'utente che lo invoca.
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || stristr ( $text, "/ciao" ) == true )//or va con || e text tu l'hai messo tutto in minuscolo quindi anche vox2bot lo deve diventare nel confronto.
{
	$response = "Ciao $firstname!";
}
elseif( stristr ( $text, "/social" ) == true )
{
	$response = "Twitter: https://twitter.com/vox2box  \r\nInstagram: https://www.instagram.com/vox2box/ \r\nFacebook: https://www.facebook.com/vox2box/";
}
elseif( stristr ( $text, "/redazione" ) == true ) 
{
	$response = "La gentile redazione è composta da 7 membri, in ordine di importanza: Marco Maioli, cinque a pari merito ovvero: Giulio Di Cienzo, Simone Donati, Francesco Lisanti, Francesco Mariani, Daniele Mazzanti e quell'altro, come si chiama, il sedicente direttore, Beppe Ruggiero";
}
elseif( stristr ( $text, "/sito" ) == true ) 
{
	$response = "HAHAHAHAHAHAHAHAHAHAHA, \r\nno va beh, tieni: https://www.vox2box.com";
}
elseif( stristr ( $text, "/salta" ) == true ) 
{
	$response = "$firstname salta con noi";
}
elseif( stristr ( $text, "/handanovic" ) == true )
{
	$response = "https://www.disabili.com/legge-e-fisco/speciali-legge-a-fisco/legge-104-disabili";
}
elseif( stristr ( $text, "/gruppi" ) == true )
{
	$response = "https://t.me/vox2box/490889";
}
elseif( stristr ( $text, "/puntata" ) == true )
{
	$response = "https://www.spreaker.com/show/vox-2-box";
}
elseif( stristr ( $text, "/abisso" ) == true )
{
	$response = "Ricordati che quando guardi a lungo Abisso, l'abisso guarda in te";
}
elseif( stristr ( $text, "/abisso" ) == true )
{
	$response = "Ricordati che quando guardi a lungo Abisso, l'abisso guarda in te";
}
elseif( stristr ( $text, "/joker" ) == true )
{
	$response = "https://www.instagram.com/p/Bujp_ryl-70/?hl=it";
}
elseif( stristr ( $text, "/joker" ) == true )
{
	$response = "https://www.instagram.com/p/Bujp_ryl-70/?hl=it";
}
elseif( stristr ( $text, "/coso" ) == true )
{
	$response = "Si chiama Szczesny porca madonna, coso ci chiami tuo fratello";
}
elseif( stristr ( $text, "/vjr" ) == true )
{
	$response = "Vinicius";
}
elseif( stristr ( $text, "/hz" ) == true )
{
	$response = "Ziyech";
}
elseif( stristr ( $text, "/mdl" ) == true )
{
	$response = "De Ligt";
}
elseif( stristr ( $text, "/rn" ) == true )
{
	$response = "N A I N G G O L A N. LA DOPPIA SULLA G, SULLA CAZZO DI G";
}
elseif( stristr ( $text, "/piatek" ) == true )
{
	$response = "Pum Pum Pum";
}
elseif( stristr ( $text, "/rl" ) == true )
{
	$response = "Lewandowski";
}
elseif( stristr ( $text, "/pz" ) == true )
{
	$response = "Zielinski";
}

$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
