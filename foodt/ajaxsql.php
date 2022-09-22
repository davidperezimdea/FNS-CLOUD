<?php
//Ajax_SQL GeneSet 
//First it connects to the database and the data is obtained by sending it via ajax
require_once("../db.php");
$type=$_POST['type'];
$post=$_POST['search'];
//TYPE 1 
//The elements that are going to be shown in the page input are obtained, the first 5 treatment or origin_name are obtained
//related to that search
if($type==1){
    //Depending on the variable, one query or another is executed
        if ($_POST['orden']=="key") {
            $sql= "SELECT DISTINCT treatment as name from sample where treatment LIKE ? LIMIT 5";   
        }else{
            $sql= "SELECT DISTINCT origin_name as name from sample where origin_name LIKE ? LIMIT 5";
        }
// Check that the query is correct and prepare for execution
if($consulta = mysqli_prepare($link, $sql)){
    //The string is prepared to escape to be able to escape special characters in the case in which there are any
       $search = mysqli_real_escape_string($link, $post);
          //%---% Finds any values that have $search in any position 
        $param_term ='%'. $search.'%' ;
    // Replace the ? by the string in the query
        mysqli_stmt_bind_param($consulta, "s", $param_term);
    // The query is executed
        if(mysqli_stmt_execute($consulta)){
    //Get the result
            $result = mysqli_stmt_get_result($consulta);
            $resultado = array();
    //The result is traversed in a loop if there are lines to traverse and they are stored in an array
            if(mysqli_num_rows($result) > 0){
                while($fetch = mysqli_fetch_array($result)){
                    $name = $fetch['name'];
                    $resultado[] = array("name" => $name);    
                }
            } else{
    //If no results are found, it is added to the array no results found
                $resultado[] = array("name" => "No Results Found");    
            }
        } else{
    //If the sequence fails to execute
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
}   
//TYPE 2
//Query through a treatment
elseif ($type==2) {
if(!empty($_POST['search2'])) {
    $post2=$_POST['search2'];
}else{
    $post2="";
}
//Search for molecular studies dealing with a particular food and origin. You can specify only the food or only the origin
if (!empty($post2)) {
    $sql="SELECT distinct study.accession, study.gpl, study.title, study.abstract,  study.study_type from study natural join sample where sample.treatment LIKE ? AND sample.origin_name LIKE ?";
}else {
    $sql="SELECT distinct study.accession, study.gpl, study.title, study.abstract,  study.study_type from study natural join sample where sample.treatment LIKE ?";
}
if($consulta = mysqli_prepare($link, $sql)){
    $search = mysqli_real_escape_string($link,$post);
    if (!empty($post2)) {
        $search2 = mysqli_real_escape_string($link,$post2);
        mysqli_stmt_bind_param($consulta, "ss", $search,$search2);
    }
    else {
        mysqli_stmt_bind_param($consulta, "s", $search);
    }
    if(mysqli_stmt_execute($consulta)){
        $result = mysqli_stmt_get_result($consulta);
        $resultado = array();
        if(mysqli_num_rows($result) > 0){
            while($fetch = mysqli_fetch_array($result)){
                $accession = $fetch['accession'];
                $gpl = $fetch['gpl'];
                $title = $fetch['title'];
                $abstract = $fetch['abstract'];
                $study_type = $fetch['study_type'];
                $resultado[] = array("accession" => $accession,"gpl" => $gpl,"title" => $title,"abstract" => $abstract,"study_type" => $study_type);    
            }
        } else{
            $resultado[] = array("name" => $post);    
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}}
//TYPE 3
//Once a study has been selected from the previous query, extract the samples from that study referring to type 2 and its various studies
elseif ($type==3) {
$sql="SELECT sample.* from study natural join sample where accession = ?";
if($consulta = mysqli_prepare($link, $sql)){
    $search = mysqli_real_escape_string($link,$post);
    mysqli_stmt_bind_param($consulta, "s", $search);
    if(mysqli_stmt_execute($consulta)){
        $result = mysqli_stmt_get_result($consulta);
        $resultado = array();
        if(mysqli_num_rows($result) > 0){
            $x=true;
            while($fetch = mysqli_fetch_array($result)){
                $treatment = $fetch['treatment'];
                $origin_type = $fetch['origin_type'];
                $origin_name = $fetch['origin_name'];
                $GSM = $fetch['GSM'];
                $time_point = $fetch['time_point'];
                $concentration = $fetch['concentration'];
                $resultado[] = array("treatment" => $treatment,"origin_type" => $origin_type,"origin_name" => $origin_name,"GSM" => $GSM,"time_point" => $time_point,"concentration" => $concentration);    
            }
        } else{
            $x=false;
            $resultado[] = array("name" => $post);    
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    session_start();
 $_SESSION['foodresults']=$resultado;
$resultado=$x;
}
}
//TYPE 4
//Once a study has been selected from the previous query, get the nodes of that study that refer to type 2 and its various studies
elseif ($type==4) {
$sql="SELECT distinct study.accession , nodes.node_id, sample.treatment, sample.time_point, sample.concentration, sample.origin_name from study natural join sample natural join nodes  right join cmap_foodrugs on nodes.node_id = cmap_foodrugs.node_id where study.accession = ?";
if($consulta = mysqli_prepare($link, $sql)){
    $search = mysqli_real_escape_string($link,$post);
    mysqli_stmt_bind_param($consulta, "s", $search);
    if(mysqli_stmt_execute($consulta)){
        $result = mysqli_stmt_get_result($consulta);
        $resultado = array();
        if(mysqli_num_rows($result) > 0){
            $x=true;
            while($fetch = mysqli_fetch_array($result)){
                $accession = $fetch['accession'];
                $node_id = $fetch['node_id'];
                $treatment = $fetch['treatment'];
                $time_point = $fetch['time_point'];
                $concentration = $fetch['concentration'];
                $origin_name = $fetch['origin_name'];
                $resultado[] = array("accession" => $accession,"node_id" => $node_id,"treatment" => $treatment,"time_point" => $time_point,"concentration" => $concentration,"origin_name" => $origin_name);    
            }
        } else{
            $x=false;
            $resultado[] = array("name" => $post);    
        }
     }else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    session_start();
 $_SESSION['foodresults2']=$resultado;
$resultado=$x;
}
}

echo json_encode($resultado);

?>