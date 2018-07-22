<?Php

require "config.php"; // Database Connection 
///////////////////////////
//////////////////////////////// Main Code sarts /////////////////////////////////////////////
@$id=$_GET['id'];
//$cat_id=1;

if(!is_numeric($id)){
$message.="Data Error |";
exit;
}

if($id>0){
$sql="select id,location,slug,population from population where id=$id order by location ";
}else{
$sql="select id,location,slug,population from population order by location ";
$id=0;
}
//////// collecting data from table ////////
$row=$dbo->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);
//////////////
@$main = array('data'=>$result,'value'=>array("id"=>"$id","location"=>"$location","slug"=>"$slug","population"=>"$population","message"=>"$message"));
echo json_encode($main);  // Json string returned 

?>
 


