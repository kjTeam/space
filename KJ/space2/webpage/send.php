<?php
//仅在submit.php中调用
//dl3OqbpnD5fn6Ygs2WbO7_zkgoEMjSajd3Zo-oMg9HI

include 'access_token.php';
//send_message($name);  //这个函数进行调用

/*function send_message($name){
    echo "$name";
    $token = get_file_token();
	echo $token;
    $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token='.$token;
    $json=array('filter'=>array('is_to_all'=>false,'group_id'=>'109'),'text'=>array('content'=>"有新的入会申请表提交！请处理！企业名称：$name "),'msgtype'=>'text');
    $json = json_encode($json);
    $json = preg_replace_callback(
        "#\\\u([0-9a-f]{4})#i",
        function($matchs)
        {
            return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
        },
        $json
    );
    $post=post($url, $json);
	echo $post;
   
}

*/
function send_message($content,$group)
	{
    echo "$content";
    $token = get_file_token();
	echo $token;
    $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token='.$token;
    $json=array('filter'=>array('is_to_all'=>false,'group_id'=>$group),'text'=>array('content'=>$content),'msgtype'=>'text');
    $json = json_encode($json);
    $json = preg_replace_callback(
        "#\\\u([0-9a-f]{4})#i",
        function($matchs)
        {
            return iconv('UCS-2BE', 'UTF-8', pack('H4', $matchs[1]));
        },
        $json
    );
    $post=post($url, $json);
	echo $post;
   
}
//下面这个函数的编码方式好像有问题，改变之后不能使用
function SendDataByCurl($url,$data){
    //对空格进行转义
    $url = str_replace(' ','+',$url);
    $ch = curl_init();
    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, "$url");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch,CURLOPT_TIMEOUT,3);  //定义超时3秒钟 
     // POST数据
    curl_setopt($ch, CURLOPT_POST, 1);
    // 把post的变量加上
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);    //所需传的数组用http_bulid_query()函数处理一下，就ok了
     
    //执行并获取url地址的内容
    $output = curl_exec($ch);
    $errorCode = curl_errno($ch);
    //释放curl句柄
    curl_close($ch);
    if(0 !== $errorCode) {
        return false;
    }
    return $output;
 
}
function post($url, $data) {

	$ch = curl_init();
    curl_setopt ( $ch, CURLOPT_SAFE_UPLOAD, false);
	curl_setopt($ch, CURLOPT_URL, $url);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	//声明使用POST方式来进行发送
	curl_setopt($ch, CURLOPT_POST, 1);

	//发送什么数据呢
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

	//忽略证书
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
function https_request($url, $data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }