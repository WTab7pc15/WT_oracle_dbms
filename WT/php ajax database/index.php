<html>
<head>

<head>
<style>
body{width:610px;}

</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readName.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectName(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>

</head>
<h1>PHP + AJAX + Database</h1>
<body>
<div class="frmSearch">
<input type="text" id="search-box" placeholder="Name" />
<div id="suggesstion-box"></div>
</div>
</body>
</html>
