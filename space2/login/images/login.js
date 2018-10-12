$(function(){
	
	$('#switch_qlogin').click(function(){
		$('#switch_login').removeClass("switch_btn_focus").addClass('switch_btn');
		$('#switch_qlogin').removeClass("switch_btn").addClass('switch_btn_focus');
		$('#switch_bottom').animate({left:'0px',width:'70px'});
		$('#qlogin').css('display','none');
		$('#web_qr_login').css('display','block');
		
		});
	$('#switch_login').click(function(){
		
		$('#switch_login').removeClass("switch_btn").addClass('switch_btn_focus');
		$('#switch_qlogin').removeClass("switch_btn_focus").addClass('switch_btn');
		$('#switch_bottom').animate({left:'154px',width:'70px'});
		
		$('#qlogin').css('display','block');
		$('#web_qr_login').css('display','none');
		});
if(getParam("a")=='0')
{
	$('#switch_login').trigger('click');
}

	});
	
function logintab(){
	scrollTo(0);
	$('#switch_qlogin').removeClass("switch_btn_focus").addClass('switch_btn');
	$('#switch_login').removeClass("switch_btn").addClass('switch_btn_focus');
	$('#switch_bottom').animate({left:'154px',width:'96px'});
	$('#qlogin').css('display','none');
	$('#web_qr_login').css('display','block');
	
}


//根据参数名获得该参数 pname等于想要的参数名 
function getParam(pname) { 
    var params = location.search.substr(1); // 获取参数 平且去掉？ 
    var ArrParam = params.split('&'); 
    if (ArrParam.length == 1) { 
        //只有一个参数的情况 
        return params.split('=')[1]; 
    } 
    else { 
         //多个参数参数的情况 
        for (var i = 0; i < ArrParam.length; i++) { 
            if (ArrParam[i].split('=')[0] == pname) { 
                return ArrParam[i].split('=')[1]; 
            } 
        } 
    } 
}  


var reMethod = "GET",
	pwdmin = 6;

$(document).ready(function() {
    document.onclick = function(){
		$('#userCue1').html("请注意格式");
		$('#tipReg').html("实名认证");
	}
    $('#loginButton').click(function(){
        if ($('#email').val() == "" || $('#p').val() == ""){
			// $('#email').focus().css({
			// 	border: "1px solid red",
			// 	boxShadow: "0 0 2px red"
			// });
			$('#userCue1').html("<font color='red'><b>×邮箱或密码不能为空</b></font>");
			return false;
		}
		$.ajax({
			type: 'get',
			url: "../login.php?regist=0&input="+$('#email').val()+"&psw="+$('#p').val(),
			cache: false,
			contentType: false,
			processData: false,
			success: function(result) {
				if(result == 0){
					window.location.href = "../index.php"
				}else if(result == 1){
					$('#userCue1').html("<font color='red'><b>×用户名或密码不正确</b></font>");
				}

			}
		});
	});
    $('#reg').click(function() {
		if($('#email1').val() == "" || $('#passwd').val() == "" || $('#passwd2').val() == "" || $('#user').val() == "" || $('#tel').val() == ""){
			$('#tipReg').html("<font color='red'><b>×输入框不能为空</b></font>");
			return false;
		}else if( $('#passwdR').val() !=$('#passwd2').val()){
			$('#tipReg').html("<font color='red'><b>×两次密码不相同</b></font>");
			return false;
		}
		$.ajax({
			type: 'get',
			url: "../login.php?regist=1&email="+$('#email1').val()+"&psw="+$('#passwdR').val()+"&user="+$('#user').val()+"&tel="+$('#tel').val()+"&unit="+$('#unit').val(),
			cache: false,
			contentType: false,
			processData: false,
			success: function(result) {
				console.log(result) ;
				if(result == 2){
					alert("注册成功");
					window.location.href = "../index.php"
				}else if(result == 3){
					$('#tipReg').html("<font color='red'><b>×邮箱已经存在</b></font>");
				}
			}
		});
	})
	// $('#reg').click(function() {

	// 	if ($('#user').val() == "") {
	// 		$('#user').focus().css({
	// 			border: "1px solid red",
	// 			boxShadow: "0 0 2px red"
	// 		});
	// 		$('#userCue').html("<font color='red'><b>×用户名不能为空</b></font>");
	// 		return false;
	// 	}



	// 	if ($('#user').val().length < 4 || $('#user').val().length > 16) {

	// 		$('#user').focus().css({
	// 			border: "1px solid red",
	// 			boxShadow: "0 0 2px red"
	// 		});
	// 		$('#userCue').html("<font color='red'><b>×用户名位4-16字符</b></font>");
	// 		return false;

	// 	}
	// 	$.ajax({
	// 		type: reMethod,
	// 		url: "/member/ajaxyz.php",
	// 		data: "uid=" + $("#user").val() + '&temp=' + new Date(),
	// 		dataType: 'html',
	// 		success: function(result) {

	// 			if (result.length > 2) {
	// 				$('#user').focus().css({
	// 					border: "1px solid red",
	// 					boxShadow: "0 0 2px red"
	// 				});$("#userCue").html(result);
	// 				return false;
	// 			} else {
	// 				$('#user').css({
	// 					border: "1px solid #D7D7D7",
	// 					boxShadow: "none"
	// 				});
	// 			}

	// 		}
	// 	});


	// 	if ($('#passwd').val().length < pwdmin) {
	// 		$('#passwd').focus();
	// 		$('#userCue').html("<font color='red'><b>×密码不能小于" + pwdmin + "位</b></font>");
	// 		return false;
	// 	}
	// 	if ($('#passwd2').val() != $('#passwd').val()) {
	// 		$('#passwd2').focus();
	// 		$('#userCue').html("<font color='red'><b>×两次密码不一致！</b></font>");
	// 		return false;
	// 	}

	// 	var sqq = /^[1-9]{1}[0-9]{4,9}$/;
	// 	if (!sqq.test($('#qq').val()) || $('#qq').val().length < 5 || $('#qq').val().length > 12) {
	// 		$('#qq').focus().css({
	// 			border: "1px solid red",
	// 			boxShadow: "0 0 2px red"
	// 		});
	// 		$('#userCue').html("<font color='red'><b>×QQ号码格式不正确</b></font>");return false;
	// 	} else {
	// 		$('#qq').css({
	// 			border: "1px solid #D7D7D7",
	// 			boxShadow: "none"
	// 		});
			
	// 	}

	// 	$('#regUser').submit();
	// });
	

});