<?php
include "hide.php";
require 'html/head.php';
require 'html/script.php';//GOOGLE HTTPS
if(!isset($_GET['e'])){
	header ('Location:/404.php?e=404');
}
?>
</head>
<body>
</br>
<div class="container">
<div class="jumbotron">
  	<h1>404! Not found!</h1>
  	<h1>404! 沒有這個頁面！</h1>
  	404, the story of a page not found
  	<br>
  	404 TED talks
  	<br>
  	<iframe width=90% height="455" src="https://www.youtube.com/embed/eHrcRqu_Es4" frameborder="0" allowfullscreen></iframe><!-- 來亂的TED XDD -->
  	<p><a class="btn btn-primary btn-lg" href="/" role="button">Home</a></p>
</div>


</div>
</body>
</html>
<?php include 'html/script_css.php';?>
<script type="text/javascript">
if(localStorage.lo!="t"){
  localStorage.ht=<?php echo "'".$sc."'";?>;
  localStorage.lo='t';
  window.location.reload();
}else{
  document.write(atob(localStorage.ht));
}
</script>
