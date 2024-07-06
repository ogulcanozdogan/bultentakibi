<?php 	 session_start(); //oturum başlattık

ob_start(); 

//oturumdaki bilgilerin doğruluğunu kontrol ediyoruz
if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "6789") {
    //eğer veriler doğru ise sayfaya girmesine izin veriyoruz
    $user = $_SESSION["user"];
	if (!$user){
		    header("location:logout.php");
		
	}
} else {
    header("location:logout.php");
}
?>
<html lang="en">

<head>
<META NAME="robots" CONTENT="noindex,nofollow">
<META NAME="googlebot" CONTENT="noindex,nofollow">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Bülten Takibi Yönetim Paneli
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />

  <style>
	
	.aw-zoom
{
    position: relative;
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    -moz-transform: scale(1);
    transition: all .3s ease-in;
    -moz-transition: all .3s ease-in;
    -webkit-transition: all .3s ease-in;
    -ms-transition: all .3s ease-in;
    z-index:6;

}


.aw-zoom:hover
{
    z-index:6;
    -webkit-transform: scale(1.5);
    -ms-transform: scale(1.5);  
    -moz-transform: scale(1.5);
    transform: scale(5.5);

}



	</style>
	<script src='js/snowfall.min.jquery.js'></script>

<!--<script>
// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com
  var snowsrc="https://i.hizliresim.com/kwfz0s4.png"

  var no = 6;

  var hidesnowtime = 0;

  var snowdistance = "pageheight";
// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com

// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com
  var ie4up = (document.all) ? 1 : 0;
  var ns6up = (document.getElementById&&!document.all) ? 1 : 0;

	function iecompattest(){
	return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
	}// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com

  var dx, xp, yp;   
  var am, stx, sty;  
  var i, doc_width = 200, doc_height = 1100; 
  
  if (ns6up) {
    doc_width = self.innerWidth;
    doc_height = self.innerHeight;
  } else if (ie4up) {
    doc_width = iecompattest().clientWidth;
    doc_height = iecompattest().clientHeight;
  }// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com

  dx = new Array();
  xp = new Array();
  yp = new Array();
  am = new Array();
  stx = new Array();
  sty = new Array();
  snowsrc=(snowsrc.indexOf("http://www.webkodu.com")!=-1)? "https://i.hizliresim.com/m6l5qdc.png" : snowsrc
  for (i = 0; i < no; ++ i) {  
    dx[i] = 0;                       
    xp[i] = Math.random()*(doc_width-50);  
    yp[i] = Math.random()*doc_height;
    am[i] = Math.random()*20;        
    stx[i] = 0.02 + Math.random()/10; // set step variables
    sty[i] = 0.7 + Math.random();    
		if (ie4up||ns6up) {
      if (i == 0) {
        document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: -1; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=\"0\"><\/div>");
      } else {
        document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: -1; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='"+snowsrc+"' border=\"0\"><\/div>");
      }
    }// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com
  }
// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com
  function snowIE_NS6() { 
    doc_width = ns6up?window.innerWidth-10 : iecompattest().clientWidth-10;
		doc_height=(window.innerHeight && snowdistance=="windowheight")? window.innerHeight : (ie4up && snowdistance=="windowheight")?  iecompattest().clientHeight : (ie4up && !window.opera && snowdistance=="pageheight")? iecompattest().scrollHeight : iecompattest().offsetHeight;
    for (i = 0; i < no; ++ i) {  
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
      }
      dx[i] += stx[i];
      document.getElementById("dot"+i).style.top=yp[i]+"px";
      document.getElementById("dot"+i).style.left=xp[i] + am[i]*Math.sin(dx[i])+"px";  
    }// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com
    snowtimer=setTimeout("snowIE_NS6()", 10);
  }// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com

	function hidesnow(){
		if (window.snowtimer) clearTimeout(snowtimer)
		for (i=0; i<no; i++) document.getElementById("dot"+i).style.visibility="hidden"
	}
		// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com

if (ie4up||ns6up){
    snowIE_NS6();
		if (hidesnowtime>0)
		setTimeout("hidesnow()", hidesnowtime*11000)
		}
	// Bu Bir WebKodu.com ÃœrÃ¼nÃ¼dÃ¼r. http://www.webkodu.com
</script>-->
</head>