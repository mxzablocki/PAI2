<?php
session_start();
if(!empty($_SESSION['login_user']))
{
$_SESSION['login_user']='';
$_SESSION['username']='';
$_SESSION['rights']='';
//$_SESSION['response']='';
//session_destroy();
echo '<script>

$("#tiny li:eq(0) a").text("Logowanie");
$(".pra").remove();
$(".mag").remove();
$(".nor").remove();
$(".log").remove();
$(".blog-wrap").load("id/home.php").hide().fadeIn(1500).delay(0000);
history.pushState(null, null, "/?id="); // logs {}, , "?state=4"
setTimeout(function(){
   window.location.reload(1);
}, 1500);
</script>';

}
?>