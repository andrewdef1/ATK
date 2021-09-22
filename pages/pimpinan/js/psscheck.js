$(function(){
$("#showPass").click(function(){ // #showPass -> id Checkbox
if($("[name=password]").attr('type')=='password'){
$("[name=password]").attr('type','text');
}else{
$("[name=password]").attr('type','password');
}
});
}); // indonesiakode.blogspot.com