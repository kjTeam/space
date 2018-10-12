
$('#export').submit(function(){
    for(var i=1;i<20;i++){
            var p = "p"+i;
            if($('#'+p).val()==''){
                $('#'+p).focus().css({
                    border: "1px solid red",
				    boxShadow: "0 0 2px red"
                });
               $('#inform').html("每一项都不能为空！");
                return false;
               }
       } 
});
//  $(function(){ 
// //     $("ulside").click(function(e){
// //  var src = e?e.target:event.srcElement;
// //  if(src.tagName == "H5"){
// //   var next = src.nextElementSibling || src.nextSibling;
// //   next.style.display = (next.style.display =='block')?'none':'block';
// //  }
// //  });
//  });
function e_submit1(){
    document.getElementById("options1").innerHTML="<sapn style='color:red' id='notagree1'>【提示】：不同意必须要填写意见<input name='notagree' class='form-control' value=''></span>";
     //$('#options1').after("<sapn style='color:red' id='notagree1'>【提示】：不同意必须要填写意见<input name='notagree'></span>");
//    var a=$('input:radio[name="optionsRadios"]:checked').val(); 
//      if(a=='option2'){
//         $('#options1').after("<sapn style='color:red' id='notagree1'>【提示】：不同意必须要填写意见<input name='notagree'></span>");
//      }
//      else{
//        $("#notagree1").remove();
//      }
 }

