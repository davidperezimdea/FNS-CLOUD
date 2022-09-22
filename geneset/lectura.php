<?php
// A sleep is made so that the newly created files can be recognized
    sleep(6);
    $resultado=[];
$json="";
$json2="";
// A while is performed that while any of the two variables are empty the code will not be executed to guarantee
//that the files have been created correctly
while(empty($json) || empty($json2)){
    sleep(1);
    $json  =  file_get_contents('/home/u992250224/public_html/wp-content/themes/bento-child/geneset/datosup.txt');
$json2 =  file_get_contents('/home/u992250224/public_html/wp-content/themes/bento-child/geneset/datosdn.txt');    
}
$resultado['up']=$json;
$resultado['dn']=$json2;
echo json_encode($resultado);
?>