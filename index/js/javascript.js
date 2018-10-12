/**
 * Author: ZhuKaihao
 * Date: 2016/3/24
 * Time: 18:34
 */

function register_box_show(){
    register_box.style.visibility='visible'
}
function register_box_hidden(){
    register_box.style.visibility='hidden';
}
function goBack() {
    //获取当前URL
    var local_url = document.location.href;
    var get = local_url.indexOf("?");
    if (get == -1) {
        return false;
    }
    //截取字符串
    var get_par = local_url.slice(get + 1);
    location.href="announcement_content.php?"+get_par;
}