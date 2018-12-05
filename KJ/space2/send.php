<?php
//仅在submit.php中调用
//dl3OqbpnD5fn6Ygs2WbO7_zkgoEMjSajd3Zo-oMg9HI
header('Content-type: application/json');
header('Content-type:text/json');
header("content-type:text/html;charset=UTF-8");
include 'access_token.php';

//send_message($name);  //这个函数进行调用

/*function send_message($name){
    echo "$name";
    $token = get_file_token();
    $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token='.$token;
    $json=array('filter'=>array('is_to_all'=>false,'group_id'=>'103'),'text'=>array('content'=>"有新的入会申请表提交！请处理！企业名称：$name "),'msgtype'=>'text');
    $json = json_encode($json);
    $json = preg_replace_callback(
        "#\\\u([0-9a-f]{4})#i",
        function($matchs)
        {
            return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
        },
        $json
    );
    post($url, $json);
   
}
*/
function send_message($content){
    echo "$content";
    $token = get_file_token();
    $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token='.$token;
    $json=array('filter'=>array('is_to_all'=>false,'group_id'=>'109'),'text'=>array('content'=>"$content"),'msgtype'=>'text');
    $json = json_encode($json);
    $json = preg_replace_callback(
        "#\\\u([0-9a-f]{4})#i",
        function($matchs)
        {
            return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
        },
        $json
    );
    post($url, $json);
//下面这个函数的编码方式好像有问题，改变之后不能使用
function post($url, $data) {

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	//����ʹ��POST��ʽ�����з���
	curl_setopt($ch, CURLOPT_POST, 1);

	//����ʲô������
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

	//����֤��
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

	curl_setopt($ch, CURLOPT_HEADER, 0);

	curl_setopt($ch, CURLOPT_TIMEOUT, 10);

	$output = curl_exec($ch);

	curl_close($ch);

	return $output;
}

function get($url) {

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $output = curl_exec($ch);

    curl_close($ch);

    return $output;
}
}