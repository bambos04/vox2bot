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
	$response = "La gentile redazione è composta da 8 membri, in ordine di importanza: Marco Maioli, sei a pari merito ovvero: Giulio Di Cienzo, Simone Donati, Francesco Lisanti, Francesco Mariani, Daniele Mazzanti, l'avv Andrea Napoli AKA Francesco Andrianopoli e quell'altro, come si chiama, il sedicente direttore, Beppe Ruggiero.";
}
elseif( stristr ( $text, "/sito" ) == true ) 
{
	$response = "HAHAHAHAHAHAHAHAHAHAHA \r\nno va beh, tieni: https://www.vox2box.com";
}
elseif( stristr ( $text, "/spalletti" ) == true ) 
{
	$response = "Quando l'acqua va da un posto ad un altro perché inclini un recipiente è uno sciagattone";
}
elseif( stristr ( $text, "/findus" ) == true ) 
{
	$response = "Ventura - Capitan Findus: il movimento ad esca. Bellissimo";
}
elseif( stristr ( $text, "/salta" ) == true ) 
{
	$response = "https://t.me/vox2box/633935";
}
elseif( stristr ( $text, "/gruppi" ) == true )
{
	$response = "https://t.me/vox2box/526895";
}
elseif( stristr ( $text, "/puntata" ) == true )
{
	$response = "https://www.spreaker.com/show/vox-2-box";
}
elseif( stristr ( $text, "/coso" ) == true )
{
	$response = "Si chiama Szczesny porca madonna, coso ci chiami tuo fratello";
}
elseif( stristr ( $text, "/rn" ) == true )
{
	$response = "N A I N G G O L A N. LA DOPPIA SULLA G, SULLA CAZZO DI G";
}
elseif( stristr ( $text, "/kpiatek" ) == true )
{
	$response = "Pum Pum Pum";
}
elseif( stristr ( $text, "/alisson" ) == true )
{
	$response = "ALLORA CHIARIAMOCI SUBITO, SI CHIAMA ALISSON A L I DOPPIA S O N, NON ALLISON OK? BENE.";
}
elseif( stristr ( $text, "/svezia" ) == true )
{
	$response = "Legend Killer, come Randy Orton";
}
elseif( stristr ( $text, "/alljuve" ) == true )
{
	$response = "Juventus: Pep Guardiola \n Juventus U23: Maurizio Sarri";
}
elseif( stristr ( $text, "/microfoni" ) == true )
{
	$response = "NON È ANDATO AI MICROFONI \r\nNON È ANDATO AI MICROFONI \r\nNON È ANDATO AI MICROFONI \r\n";
}
elseif( stristr ( $text, "/maze" ) == true )
{
	$response = "Noi ragazzi abbiamo fatto due tiri in porta, in 180 minuti, in 180 minuti, due tiri in porta, di cui uno sporco che era tipo un tiro di destro di Chiellini che la sfiga ha voluto che aneh, che quella palla finisse sul piede destro di Chiellini e l'altro di El Shaarawy, ma due tiri, in 180' contro una squadra che ha come capitano Granqvist, che, porco demonio, a Genova se fa.. se vedono Granqvist danno fuoco alla città perchè faceva più danni della grandine quello.";
}
elseif( stristr ( $text, "/ventura" ) == true )
{
	$response = "è il peggior allenatore che l'Italia ha MAI avuto perché a differenza di tante altre volte il materiale ce l'aveva a disposizione, ma sto figlio di puttana ha pensato bene di fare come cazzo gli pareva e di farci perdere un cazzo di mondiale. cioè, io pensavo sinceramente che nella mia fottutissima vita di merda di non vedere mai una cazzo di estate mondiale senza l'Italia. E ora io mi metto in muto perché sono a tanto così da tirare 25 bestemmie di seguito. Questo figlio di puttana ci ha condannati per le sue idee di merda lasciando fuori la gente più in forma per le sue cazzo di convinzioni e deve morire, quel cretino. DEVE MORIRE";
}
elseif( stristr ( $text, "/smm" ) == true )
{
	$response = "Alice <3";
}
elseif( stristr ( $text, "/dimarco" ) == true )
{
	$response = "Dimarco = giocatore \n Di Marco = arbitro \n :D";
}
elseif( stristr ( $text, "/dibiagio" ) == true )
{
	$response = "white Thanos can't coach";
}
elseif( stristr ( $text, "/salernitana" ) == true )
{
	$response = "nOn AvEtE fEsTeGgIaTo La SaLeRnItAnA";
}



$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
