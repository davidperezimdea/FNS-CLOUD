<?php 
session_start();
//Script to do the enrichment
//$a is the array containing the data
//$b is the option corresponding to the enrichment mode
//$c is the database to query
//$d is the node information
$a=$_POST["a"];
$b=$_POST["b"];
$c=$_POST["c"];
$d=$_POST["d"];
$d = explode(";", $d);
$definitivo=[];
//Save the node information
for ($i=0; $i <sizeof($d) ; $i++) {
    $arrayprovisional=explode("--", $d[$i]);
    $prov=$arrayprovisional[0];
    $_SESSION['c'][$prov]=$arrayprovisional[1];
}


// save the array data to a file
$file = fopen("archivo.tsv", "w");

for ($i=0; $i <sizeof($a) ; $i++) { 
    $valor=$a[$i];
    $cont=0;
    foreach ($valor as $key => $value) {
        if ($key=="tau" || $key=="compound" || $key=="treatment") {
            if($cont==0){
            fwrite($file,$value."\t");
            }else {
            fwrite($file,$value."\n");
            }
        }
        $cont++;
}

}
fclose($file);
// A python script is executed with the file, the database and the option that will do the enrichment
$cmd='/opt/alt/python27/bin/python2 ';
$cmd2='/home/u992250224/public_html/wp-content/themes/bento-child/python/binom_test.py archivo.tsv  '.$c.'   '.$b;
$output = shell_exec($cmd.$cmd2);


echo $output;

?>
