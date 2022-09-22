<?php
// Page in charge of collecting the data shown in geneset and obtaining the data for the enrichment
//First of all, the id of all the genes are obtained, these are parsed to a string separated by commas and then we collect the type whose function is to identify which path the script has to follow
$up=$_POST['idup'];
$dn=$_POST['iddn'];
$type=$_POST['type'];

session_start();
$stringup="";
$output="";
foreach ($up as $key => $value) {
        $stringup=$stringup.",".$value; 
}
$stringdn="";
foreach ($dn as $key => $value) {
        $stringdn=$stringdn.",".$value; 
}
//Type 1 
//Data for genes, an xml is prepared and sent to ensembl , sent with the wget command and collected in a variable and returned to the main page
if ($type==1) {
$cmd="wget -O datosup.txt 'http://www.ensembl.org/biomart/martservice?query=";
$a='<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE Query><Query  virtualSchemaName = "default" formatter = "TSV" header = "0" uniqueRows = "0" count = "" datasetConfigVersion = "0.6" ><Dataset name = "hsapiens_gene_ensembl" interface = "default" ><Filter name = "entrezgene_id" value = "'.$stringup.'"/><Attribute name = "entrezgene_id"/><Attribute name = "external_gene_name" /><Attribute name = "description"/></Dataset></Query>';
$cmd2=$a."'";
$output = shell_exec($cmd.$cmd2);

$cmd3="wget -O datosdn.txt 'http://www.ensembl.org/biomart/martservice?query=";
$b='<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE Query><Query  virtualSchemaName = "default" formatter = "TSV" header = "0" uniqueRows = "0" count = "" datasetConfigVersion = "0.6" ><Dataset name = "hsapiens_gene_ensembl" interface = "default" ><Filter name = "entrezgene_id" value = "'.$stringdn.'"/><Attribute name = "entrezgene_id"/><Attribute name = "external_gene_name" /><Attribute name = "description"/></Dataset></Query>';
$cmd4=$b."'";

$output2 = shell_exec($cmd3.$cmd4);
}
//TYPE 2
//Data for enrichment, First check which database the user has selected,
// some variables are set so that the page it shows
// the data knows how to differentiate the type, and then the data is sent to the page (Pantherdb.org)
elseif ($type==2) {
if($_POST['database']=="Molecular"){
        $_SESSION['database']="GO Molecular Function";
    }else if($_POST['database']=="Molecular") {
        $_SESSION['database']="GO Biological  Process";
    }else {
        $_SESSION['database']="GO Cellular Component";
    }
    unset($_SESSION['token']);
     $dataset=$_POST['dataset'];
     $name=strtotime("now");
    $_SESSION['nombrearc']=$name;
$cmd5='curl -X POST "http://pantherdb.org/services/oai/pantherdb/enrich/overrep?geneInputList='.$stringup.'&organism=9606&annotDataSet=GO%3A'.$dataset.'&enrichmentTestType=FISHER&correction=FDR" -H "accept: application/json" -o enrichments/'.$name.'up.txt  ' ;
              
$cmd6='curl -X POST "http://pantherdb.org/services/oai/pantherdb/enrich/overrep?geneInputList='.$stringdn.'&organism=9606&annotDataSet=GO%3A'.$dataset.'&enrichmentTestType=FISHER&correction=FDR" -H "accept: application/json" -o enrichments/'.$name.'dn.txt ';

shell_exec($cmd5);
shell_exec($cmd6);
}
//TYPE 3 AND 4 
//Since the reactome request works for a token, two calls are made to the page
// with genes up and genes down and session variables are set for the next page
elseif($type==3){
    $name=strtotime("now");
    $dataset=$_POST['dataset'];
    $pathway=$_POST['pathway'];
    $_SESSION['nombrearc']=$name;
    $_SESSION['token']=$dataset;
    $cmd6='curl -o enrichments/'.$name.'up.txt  -X GET https://reactome.org/AnalysisService/token/'.$dataset.'?pageSize='.$pathway.'&page=1"" -H "accept: application/json"';
    shell_exec($cmd6);
    $output=$name;
}elseif($type==4){
        $_SESSION['database']=$_POST['database'];
    $name=$_SESSION['nombrearc'];
    $dataset=$_POST['dataset'];
    $pathway=$_POST['pathway'];
    $_SESSION['pathway']=$pathway;
    $_SESSION['token']=$dataset;
    $cmd6='curl -o enrichments/'.$name.'dn.txt  -X GET https://reactome.org/AnalysisService/token/'.$dataset.'?pageSize='.$pathway.'&page=1"" -H "accept: application/json" ';
    shell_exec($cmd6);
    $output=$name;
}




echo $output;
?>
