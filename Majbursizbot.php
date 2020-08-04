﻿<?php 

error_reporting(0);

set_time_limit(0);

flush();
$API_KEY = '1374837230:AAG2jbCTrhyHXyBm1sdMCdik4wGijILXfds';
##------------------------------##
define('API_KEY',$API_KEY);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
    bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>$text,
    'parse_mode'=>$mode
    ]);
    }
    function sendaction($chat_id, $action){
    bot('sendchataction',[
    'chat_id'=>$chat_id,
    'action'=>$action
    ]);
    }
function Forward($KojaShe, $AzKoja, $KodomMSG)
{
    bot('ForwardMessage', [
        'chat_id' => $KojaShe,
        'from_chat_id' => $AzKoja,
        'message_id' => $KodomMSG
    ]);
}
function reyting(){
$update = json_decode(file_get_contents('php:/input'));
$message = $update->message;
$tx = $message->text;
$text=$message->text;
$ex=explode("_",$tx);
    $text = "<b>🛡TOP 10 ta Eng Ko'p Odam  Qoshgan A'zolar:</b>\n\n";
    $daten = [];
    $rev = [];
    $fayllar = glob("*UzStarsGroup/$ex[1]/*.*");
    foreach($fayllar as $file){
        if(mb_stripos($file,".txt")!==false){
        $value = file_get_contents($file);
        $id = str_replace(["UzStarsGroup/$ex[1]/",".txt"],["",""],$file);
        $daten[$value] = $id;
        $rev[$id] = $value;
        }
        echo $file;
    }

    asort($rev);
    $reversed = array_reverse($rev);
    for($i=0;$i<10;$i+=1){
        $order = $i+1;
        $id = $daten["$reversed[$i]"];
        $text.= "<b>{$order}</b>. <a href='tg://user?id={$id}'>{$id}</a> - "."<b>".$reversed[$i]."</b>"." <i>ta!</i>"."\n";
    }
    return $text;
}
//====================special======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$mybot = "Majbursizbot";
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$username = $update->message->from->username;
$bcpv = file_get_contents("bcpv.txt");
$bcgap = file_get_contents("bcgap.txt");
mkdir("UzStarTM");
mkdir("UzStarsGroup");
mkdir("UzStarsGroup/$chat_id");
$UzStarTM = file_get_contents("UzStarsGroup/$chat_id/$from_id.txt");
$step = file_get_contents("UzStarTM/$chat_id.step");
$guruhlar = file_get_contents("UzStarTM/Guruh.lar");
$userlar = file_get_contents("UzStarTM/User.lar");
@mkdir("data/$chat_id");
$azidil = file_get_contents("data/$chat_id/safargul.txt");
@$list = file_get_contents("ID.txt");
$channelid = file_get_contents("data/$chat_id/channelid.txt");
$name = $update->message->from->first_name;
$repmid = $message->reply_to_message->message_id;
$repname = $message->reply_to_message->from->first_name;
$left = $message->left_chat_member;
$new = $message->new_chat_member;
$leftid = $message->left_chat_member->id;
$newid = $message->new_chat_member->id;
$newname = $message->new_chat_member->first_name;
$gpname = $update->message->chat->title;
$title = $message->chat->title;
$rt = $update->message->reply_to_message;
$replyid = $update->message->reply_to_message->message_id;
$rtid = $update->message->reply_to_message->from->id;
$data = $update->callback_query->data;
$photo = $update->message->photo;
$forward = $update->message->forward_from;
$video = $update->message->video;
$location = $update->message->location;
$sticker = $update->message->sticker;
$document = $update->message->document;
$contact = $update->message->contact;
$game = $update->message->game;
$music = $update->message->audio;
$gif = $update->message->gif;
$voice = $update->message->voice;
$message_id2 = $update->callback_query->message->message_id;
$messageid = $update->callback_query->message->message_id;
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=@$channelid&user_id=".$from_id)); 
$tch = $forchaneel->result->status;
$type = $update->message->chat->type;
$types = $message->chat->type;
$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$info = json_decode($get, true);
$rank = $info['result']['status'];
$reply = $update->message->reply_to_message->message_id;
 $ADMIN = 1223497947; //oddi asmin
 $ADMINS = 1223497947; //gl admin idisi

//====================special=================//
if(isset($message)){
  if($types == "group" or $types == "supergroup"){
    if(stripos($guruhlar,"$chat_id")!==false){
    }else{
    file_put_contents("UzStarTM/Guruh.lar","$guruhlar\n$chat_id");
    }
  }else{
   $userlar = file_get_contents("UzStarTM/User.lar");
   if(stripos($userlar,"$chat_id")!==false){
    }else{
    file_put_contents("UzStarTM/User.lar","$userlar\n$chat_id");
   }}}
if ($text == "/start" or $text == "/start@Majbursizbot") {
        $user = file_get_contents('ID.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('ID.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/safargul.txt");
            file_put_contents('ID.txt', $add_user);
        }
            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"<b>Salom $name</b>
@$mybot ga xush kelibsiz! <b> Bu bot 
Guruhingizdagi a'zolarni kanalingizga a'zo bo'lmagunicha  guruhingizga yozdirmaydi😉
va qancha odam qushganingizni aytib beradi </b>",
 'parse_mode'=>'html',
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "↗Add group", 'url' => "https://t.me/Majbursizbot?startgroup=new"], ['text' => "⚙Sozlama", 'callback_data' => "quik"]
                    ],
                    [
                        ['text' => "⭕Qo'llanma", 'url' => "https://telegra.ph/Qollanma-06-26"], ['text' => "📶Statistika", 'callback_data' => "azi"]
                    ]
                ]
    
])
        ]);

}
if($left){
  bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$mid
  ]);
  unlink("UzStarsGroup/$chat_id/$leftid.txt");
}

if($new){
  bot('deletemessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$mid
  ]);
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"<b>👋Salom</b> <a href='tg://user?id=$newid'>$newname</a> Gruppamizga xush kelibsiz! Biz xursand bo'ldik😉",
    'parse_mode'=>'html'
   ]);
  $add = $UzStarTM + 1;
  file_put_contents("UzStarsGroup/$chat_id/$from_id.txt","$add");
}
if($text == "/my" or $text == "/my@$mybot"){
if($UzStarTM==true){
  bot('sendmessage',[    
    'chat_id'=>$chat_id, 
    'reply_to_message_id'=>$mid,  
    'parse_mode'=>'html',   
    'text'=>"<a href='tg://user?id=$from_id'>$name</a> 
🔹Siz $UzStarTM ta odam qo'shgansiz!",
  ]);   
}else{
bot("sendMessage",[
"chat_id"=>$chat_id,
 'reply_to_message_id'=>$mid,  
    'parse_mode'=>'html',   
"text"=>"<a href='tg://user?id=$from_id'>$name</a> 
❌Siz hali odam qo'shmadingiz!",
]);
}}
if($rank != "creator" && $rank != "administrator"){ 
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
if($type == "supergroup" or $type == "group"){
bot('sendmessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
            'text' => "<a href='tg://user?id=$from_id'>$name</a> Siz @$channelid kanalimiz a'zo bo'lsangizgina bu guruhda xabar yoza olasiz!",
                'parse_mode'=>'html',
            'reply_markup' =>  json_encode([
                'inline_keyboard' => [
                    [
                    ['text' => "Azo bo'lish➕",'url'=>"https://telegram.me/$channelid"]
                        ]

    ]
])
        ]);
    }}
if($text || $photo || $video || $location || $sticker || $document || $contact || $music || $gif || $voice){
if($tch != 'member'){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
  ]);
}
}
}

 if ($data == "quik") {
    file_put_contents("data/$chatid/safargul.txt", "fwd");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $messageid,
            'text' => "<b>🔰 Buyruqlar </b>
<i>/id</i> - <code>ID aniqlash</code>
<i>/sozla</i> - <code>Guruhga kanal sozlash</code>
<i>/my</i> - <code>Qo'shgan odamlaringiz soni</code>
<i>/top</i> <code>10ta eng ko'p odam qo'shganlar soni</code>

<b>🔥Yangiliklar:</b> @iDevelopersUZ",
                 'parse_mode'=>'html']);
}

if($text == "/loyihalar" or $text == "/loyihalar@Majbursizbot") {
            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"<b> Bizing loyihalar🌟 </b>
@DaysandUZBbot |  @Foydaliman_bot
@Tozalaymanbot  |  @uRenamebot
 @Majbursizbot    |  @iAdvokatbot

*🔥Yangiliklar:* @iDevelopersUZ",
                 'parse_mode'=>'html']);
}
if($text == "/top" or $text == "/top@Majbursizbot") {
	$reyting=reyting();
            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"<b> $reyting</b>",
                 'parse_mode'=>'html']);
}
if($text == "/sozla" or $text == "/sozla@Majbursizbot"){
    if($rank == "creator" or $rank== "administrator"){
 file_put_contents("data/$chat_id/safargul.txt","sett");
$channelid = file_get_contents("data/$chat_id/channelid.txt");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"
<b> Shu guruhga qaysi kanalni ulamoqchisiz?
Meni o'sh kanalga Admin qiling va kanalingiz @username sini yuboring @ qo'ymasdan
Namuna </b> @iDevelopersUZ ni iDevelopersUZ <b> deb yuborasiz!</b>

🔥Yangiliklar @iDevelopersUZ",
 'parse_mode'=>'html']);
} }
if($azidil == "sett"){
    if($rank == "creator" or $rank== "administrator"){
 file_put_contents("data/$chat_id/safargul.txt","none");
 file_put_contents("data/$chat_id/channelid.txt",$text);
     bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"@$text <b> Kanaliga a'zo bo'lmaganlar ushbu guruhga yoza olishmaydi😉</b>

🔥Yangiliklar: @iDevelopersUZ ",
 'parse_mode'=>'html']);
    }}
//############################################################################//
if($text == "/id" && $from_id == $chat_id){
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"
➖➖➖➖➖➖➖➖➖➖
<i>Sizning 🆔: </i><b> $chat_id </b> 
➖➖➖➖➖➖➖➖➖➖
<i> Ismingiz </i> 🔎<code> $name </code>
➖➖➖➖➖➖➖➖➖➖",
 'parse_mode'=>'html',
            'reply_markup' =>  json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "↗Add group",'url'=>"https://t.me/Majbursizbot?startgroup=new"]
                    ]                   
    ]
])
        ]);
}
/////////////////////////////////////////////////
if ($text == "/panel" && $chat_id == $ADMINS) {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $ADMINS,
            'text' => "Boshqaruv paneliga xush kelibsiz!",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
[
                        ['text' => "📈Bot Azolari📉", 'callback_data' => "azi"]
                    ],
                    [
                        ['text' => "Xabar Yullash🙂", 'callback_data' => "send"], ['text' => "Reklama🤓", 'callback_data' => "fwd"]
                    ]
                ]
            ])
        ]);
    }     
    elseif ($data == "azisaf" && $from_id == $admins){
        file_put_contents("data/$chat_id/safargul.txt", "no");
        sendAction($chat_id, 'typing');
        bot('editmessagetext', [
            'chat_id' => $ADMINS,
            'message_id' => $message_id2,
            'text' => "Bosh Saxifaga xush kelipsiz",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "📈Bot Azolari📉", 'callback_data' => "azi"]
                    ],
                    [
                        ['text' => "Xabar Yullash🙂", 'callback_data' => "send"], ['text' => "Reklama🤓", 'callback_data' => "send"]
                    ]
                ]
            ])
        ]);
    } 
 elseif ($data == "azi") {
        $user = file_get_contents("ID.txt");
        $member_id = explode("\n", $user);
        $odam_soni = count($member_id) - 1;
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "📃Bot Azolari : $odam_soni
",

            'show_alert' => true
        ]);
    }

    elseif ($data == "send") {
        file_put_contents("data/$chatid/safargul.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "📨Endi Xabaringizni Yozing🖊️",
        ]);
    } elseif ($azidil == "send") {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        $fp = fopen("ID.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
              bot('sendMessage', [
            'chat_id' => $ckar, 
             'text' => $text,
                'parse_mode'=>'MarkDown'   ]);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "*BOT AZOLARIGA YUBORILDI*",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh Menu", 'callback_data' => "azisaf"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "fwd") {
        file_put_contents("data/$chatid/safargul.txt", "fwd");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Noxost tegma menga😤",
        ]);
    } elseif ($azidil == 'fwd') {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        $forp = fopen("ID.txt", 'r');
        while (!feof($forp)) {
            $fakar = fgets($forp);
            bot('ForwardMessage', [
              'chat_id' =>$fakar, 
                'from_chat_id' => $chat_id,
                'message_id' => $message_id2 ]);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Botdan foydalanish uchun kanalimizga a'zo buling va qaytadan start bosing😆 Kanalimiz :  @iDevelopersUZ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [

                    [
                        ['text' => "⚙Sozlamalar", 'callback_data' => "quik"]
                    ],
                ]
            ])
        ]);
    }


?>