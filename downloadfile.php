<?php

#Script that saves the information in a file for later download it
#Receive in name the name of the file, key the type of file and in data the information to save
#Returns the name of the file
#Data Collect
session_start();

$key=$_REQUEST["key"];

$data=$_REQUEST["data"];

$name=$_REQUEST["name"];
 


#Create file
$aux=strtotime("now");
$file = fopen("../../uploads/2022/desc/".$name.$aux.".".$key, "w");

#Division by key  
if ($key == "csv") {
    
    #Make the csv file
    $filename = $name.$aux.".csv";
for ($i=0; $i <sizeof($data) ; $i++) { 
    $valor=$data[$i];
    
    #If the arraykeys does not exist, the variable names are set from the associative array
    if($i==0 && !isset($_REQUEST["arrkeys"])){
        $arraykey=array_keys($data[$i]);
        for ($k=0; $k <sizeof($arraykey);$k++){
         fwrite($file,$arraykey[$k].";");   
        }
        fwrite($file,"\n");   
    }elseif(isset($_REQUEST["arrkeys"])&& $i==0){
        $arraykey=$_REQUEST["arrkeys"];
        for ($k=0; $k <sizeof($arraykey);$k++){
         fwrite($file,$arraykey[$k].";");   
        }
        fwrite($file,"\n");   
    }
foreach ($data[$i] as $key => $value) {

    #quoted value to skip the ; and do not jump line
     $ppp='"'.$value.'"';
   fwrite($file,$ppp.";");
}
    fwrite($file,"\n");
    }
}else {
    #Make the tsv file
    $filename = $name.$aux.".tsv";
for ($i=0; $i <sizeof($data) ; $i++) { 
    $valor=$data[$i];
        #If the arraykeys does not exist, the variable names are set from the associative array

    if($i==0 && !isset($_REQUEST["arrkeys"])){
        $arraykey=array_keys($data[$i]);
        for ($k=0; $k <sizeof($arraykey);$k++){
         fwrite($file,$arraykey[$k]."\t");   
        }
        fwrite($file,"\n");   
    }elseif(isset($_REQUEST["arrkeys"]) && $i==0){
        $arraykey=$_REQUEST["arrkeys"];
        for ($k=0; $k <sizeof($arraykey);$k++){
         fwrite($file,$arraykey[$k]."\t");   
        }
        fwrite($file,"\n");   
    }
foreach ($data[$i] as $key => $value) {
   fwrite($file,$value."\t");
}
    fwrite($file,"\n");
    }
}       
fclose($file);
echo json_encode($filename);
?>
