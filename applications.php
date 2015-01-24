<?php 
include_once 'class/database.php';
$db=new DATABASE();
if($_GET["password"]!="bitmunprivatesec"){
	die("Unauthorized access");
}
$result=$db->findArray("applications", array(),"name,gender,institute,committee,country,double_delegate,number,email,muncount,type,exp,date");
for($i=0;$i<sizeof($result);$i++){
	if($result[$i][1]==0){
		$result[$i][1]="Male";
	}else{
		$result[$i][1]="Female";
	}
	if($result[$i][5]==0){
		$result[$i][5]="No";
	}else{
		$result[$i][5]="Yes";
	}
	if($result[$i][9]=="ip"){
		$result[$i][9]="ipress";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>BITMUN Applications</title>
<link rel="stylesheet" href="css/datatables.css" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/datatables.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#data-table").dataTable({
		"aaData":<?php echo json_encode($result);?>,
		"aoColumns":[
		     {"sTitle":"Name"},
		     {"sTitle":"Gender"},
		     {"sTitle":"Institute"},
		     {"sTitle":"Committee"},
		     {"sTitle":"Country"},
		     {"sTitle":"Double"},
		     {"sTitle":"Number"},
		     {"sTitle":"Email"},
		     {"sTitle":"Count"},
		     {"sTitle":"Type"},
		     {"sTitle":"Exp"},
		     {"sTitle":"Date"}
		]
	});
});
</script>
</head>
<body>
<table id="data-table"></table>
</body>
</html>