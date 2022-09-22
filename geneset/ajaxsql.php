<?php
//Ajax_SQL GeneSet 
//First it connects to the database and the data is obtained by sending it via ajax
 require_once("../db.php");
$type=$_POST['type'];
$post=$_POST['search'];
//TYPE 1 
//The elements that are going to be shown in the page input are obtained, the first 5 compounds or cell_line are obtained
//related to that search
if ($type==1) {
//Depending on the variable, one query or another is executed
if ($_POST['orden']=="key") {
    $sql = "SELECT DISTINCT compound as name from cmap where compound LIKE ? LIMIT 5 ";
        }
    else{
        $sql = "SELECT DISTINCT cell_line as name from cmap where cell_line LIKE ? LIMIT 5 ";
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
//With the id of the node sent by ajax, an sql sequence is made to obtain the up genes and the down genes
elseif ($type==2) {
//The data is stored in the same associative array marked by a counter
    //The sql sequences try that from a node_id the genes entrez_id up or dn are obtained
$resultado = array();
$sql="SELECT distinct entrez_Id from topTable where node_id = ? and geneSet = 'UP'";
if($consulta = mysqli_prepare($link, $sql)){
    $search = mysqli_real_escape_string($link,$post);
        mysqli_stmt_bind_param($consulta, "s", $search);
    if(mysqli_stmt_execute($consulta)){
        $result = mysqli_stmt_get_result($consulta);
        $i=0;
        if(mysqli_num_rows($result) > 0){
            while($fetch = mysqli_fetch_array($result)){
                $entrez_Id = $fetch['entrez_Id'];
                $resultado[$i]["up"] =$entrez_Id;
                  $i++;
            }
        } else{
            $resultado[] = array("name" => $post);    
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
$sql="SELECT distinct entrez_Id from topTable where node_id = ? and geneSet = 'DN'";
if($consulta = mysqli_prepare($link, $sql)){
    $search = mysqli_real_escape_string($link,$post);
        mysqli_stmt_bind_param($consulta, "s", $search);
    if(mysqli_stmt_execute($consulta)){
        $result = mysqli_stmt_get_result($consulta);
        $i=0;
        if(mysqli_num_rows($result) > 0){
            while($fetch = mysqli_fetch_array($result)){
                $entrez_Id = $fetch['entrez_Id'];
                  $resultado[$i]["dn"] =$entrez_Id;
                  $i++;
            }
        } else{
            $resultado[] = array("name" => $post);    
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

}
//TYPE 3 
//Query through a compound
}elseif($type==3){
// Check if search2 exists or not
      if (!empty($_POST['search2'])) {
        $post2=$_POST['search2'];
    }else{
        $post2="";
    }
//If search2 exists, a sequence is made with two ??
//SQL When the user searches for a drug with interactions with food compounds based on molecular evidence. You can add “AND cell_line = ?” if the user adds cell line as search parameter too.
    if (!empty($post2)) {
    $sql = "SELECT DISTINCT study.accession, nodes.node_id, sample.treatment, sample.time_point,  sample.concentration, sample.origin_name from study natural join sample natural join nodes  right join cmap_foodrugs on nodes.node_id = cmap_foodrugs.node_id where sample.treatment = ? and sample.origin_name = ?";
    }else{
    $sql = "SELECT DISTINCT study.accession, nodes.node_id, sample.treatment, sample.time_point,  sample.concentration, sample.origin_name from study natural join sample natural join nodes  right join cmap_foodrugs on nodes.node_id = cmap_foodrugs.node_id where sample.treatment = ?";   
    }
    if($consulta = mysqli_prepare($link, $sql)){
        $search = mysqli_real_escape_string($link,$post );
        
        if (!empty($post2)) {
// Case of two ?? the strings are separated, when adding them and the first ? will take the first string and vice versa
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
                    $node_id = $fetch['node_id'];
                    $treatment = $fetch['treatment'];
                    $time_point = $fetch['time_point'];
                    $concentration = $fetch['concentration'];
                    $origin_name = $fetch['origin_name'];
                    $resultado[] = array("accession" => $accession,"node_id" => $node_id,"treatment" => $treatment,"time_point" => $time_point,"concentration" => $concentration,"origin_name" => $origin_name);    
                }
            } else{
                $resultado[] = array("name" => $post);    
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
}  

echo json_encode($resultado);

?>