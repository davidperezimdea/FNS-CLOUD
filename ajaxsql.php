<?php
//AjaxSQL_CMAP
//First it connects to the database and the data is obtained by sending it via ajax
require_once("db.php");
$type = $_POST['type'];
$post=$_POST['search'];
$resultado="a";
$sql="";
//TYPE 1 
//The elements that are going to be shown in the input of the page are obtained, the first 5 records requested are obtained
if($type==1){
   if ($_POST['provisional']!=3) {
//Depending on the law, the query will obtain the treatment/origin name or the compound/cell_line
        if ($_POST['orden']=="key") {
            $sql= "SELECT DISTINCT treatment as name from sample where treatment LIKE ? LIMIT 5";   
        }else{
            $sql= "SELECT DISTINCT origin_name as name from sample where origin_name LIKE ? LIMIT 5";
        }
    }else {
        if ($_POST['orden']=="key") {
    $sql = "SELECT DISTINCT compound as name from cmap where compound LIKE ? LIMIT 5 ";
        }
        else{
            $sql = "SELECT DISTINCT cell_line as name from cmap where cell_line LIKE ? LIMIT 5 ";
        }
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
//If no results are found, add no results found to the array
            $resultado[] = array("name" => "No Results Found");    
        }
    } else{
//If the sequence fails to execute
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}   
}
//TYPE 2
//Query through a compound
elseif($type==2){
// Check if search2 exists or not
      if (!empty($_POST['search2'])) {
        $post2=$_POST['search2'];
    }else{
        $post2="";
    }
    //If search2 exists, will a sequence be made with two ?
    //SQL When the user searches for a drug with interactions with food compounds based on molecular evidence. You can add “AND cell_line = ?” if the user adds cell line as search parameter too.
    if (!empty($post2)) {
    $sql = "SELECT DISTINCT study.accession, nodes.node_id, sample.treatment, sample.time_point,  sample.concentration, sample.origin_name from study natural join sample natural join nodes  right join cmap_foodrugs on nodes.node_id = cmap_foodrugs.node_id where sample.treatment = ? and sample.origin_name = ?";
    }else{
    $sql = "SELECT DISTINCT study.accession, nodes.node_id, sample.treatment, sample.time_point,  sample.concentration, sample.origin_name from study natural join sample natural join nodes  right join cmap_foodrugs on nodes.node_id = cmap_foodrugs.node_id where sample.treatment = ?";   
    }
    if($consulta = mysqli_prepare($link, $sql)){
        $search = mysqli_real_escape_string($link,$post );
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
//TYPE 3
//Query through a treatment
elseif ($type==3) {
    if (!empty($_POST['search2'])) {
        $post2=$_POST['search2'];
    }
    else{
        $post2="";
    }
//When the user searches for a food compound with drug interactions based on molecular evidence. You can add “AND origin_name = ?” if the user adds cell line as search parameter too.

    if (!empty($post2)) {
        $sql = "SELECT DISTINCT cmap_node_id as node_id, compound, cell_line from cmap where cmap.compound = ?  AND (cmap.pert_type = 'trt_cp') and cell_line = ? ";
    }else {
    $sql = "SELECT DISTINCT cmap_node_id as node_id, compound, cell_line from cmap where cmap.compound = ?  AND (cmap.pert_type = 'trt_cp')";
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
                    $compound = $fetch['compound'];
                    $node_id = $fetch['node_id'];
                    $cell_line = $fetch['cell_line'];
                    $resultado[] = array("compound" => $compound,"node_id" => $node_id,"cell_line" => $cell_line);    
                }
            } else{
                $resultado[] = array("name" => $post);    
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);   
        }
    }
    //TYPE 5 
}elseif($type==5){
    session_start();
    $a=$_POST['a'];
    $arraysearch=$_POST['search'];
    $stringsearch=$arraysearch['node_id'];
     $_SESSION['b']=$arraysearch;
     $tau=$_POST['tau'];

//When the user chooses a specific food. Then add “and ( cmap.pert_type = 'trt_cp' or cmap.pert_type = 'trt_lig' )” if you search for ali-farmaco or “and (cmap.pert_type = 'trt_oe' or cmap.pert_type = 'trt_oe.mut' or cmap.pert_type = 'trt_sh' or cmap.pert_type = 'trt_sh.cgs' or cmap.pert_type = 'trt_sh.css' )” if you search for ali-gen. At the end add "order by abs(cmap_foodrugs.tau) desc"
    //For a==2 and a==3
     if($a==2){
        
        $sql= "SELECT distinct cmap_foodrugs.*, cmap.compound, cmap.cell_line, REPLACE(REPLACE(cmap.pert_type, 'trt_sh.cgs', 'Consensus signature from shRNAs targeting the same gene'), 'trt_oe', 'cDNA for overexpression of wild-type gene') as pert_type from cmap_foodrugs natural join cmap where cmap_foodrugs.node_id = ?  and abs(tau) >= ? order by abs(cmap_foodrugs.tau) desc";
        if($consulta = mysqli_prepare($link, $sql)){
            $search = mysqli_real_escape_string($link,$stringsearch);
            if (!empty($search)) {
                mysqli_stmt_bind_param($consulta, "ss", $search , $tau );
            if(mysqli_stmt_execute($consulta)){
                $result = mysqli_stmt_get_result($consulta);    
                $resultado = array();
                if(mysqli_num_rows($result) > 0){
                    while($fetch = mysqli_fetch_array($result)){    
                        $compound = $fetch['compound'];
                        $cell_line = $fetch['cell_line'];
                        $pert_type = $fetch['pert_type'];
                        $cmap_node_id = $fetch['cmap_node_id'];
                        $node_id = $fetch['node_id'];
                        $tau = $fetch['tau'];
                        $resultado[] = array("compound" => $compound,"cell_line" => $cell_line,"pert_type" => $pert_type,"cmap_node_id" => $cmap_node_id,"node_id" => $node_id,"tau" => $tau);     
                    }
                } else{
                    $resultado[] = array("name" => $stringsearch);    
                }
    
    }        } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);   
            }
        }  
    }else if($a==3){
        $sql="SELECT distinct cmap_foodrugs.*, cmap.compound, cmap.cell_line,  REPLACE(REPLACE(cmap.pert_type, 'trt_sh.cgs', 'Consensus signature from shRNAs targeting the same gene'), 'trt_oe', 'cDNA for overexpression of wild-type gene') as pert_type from cmap_foodrugs natural join cmap where cmap_foodrugs.node_id = ?  and abs(tau) >= ? and  ( cmap.pert_type = 'trt_cp' or cmap.pert_type = 'trt_lig' )  order by abs(cmap_foodrugs.tau) desc;";
        if($consulta = mysqli_prepare($link, $sql)){
                   $search = mysqli_real_escape_string($link,$stringsearch);
                   if (!empty($search)) {
                       mysqli_stmt_bind_param($consulta, "ss", $search , $tau);
                   if(mysqli_stmt_execute($consulta)){
                       $result = mysqli_stmt_get_result($consulta);    
                       $resultado = array();
                       if(mysqli_num_rows($result) > 0){
                           while($fetch = mysqli_fetch_array($result)){    
                               $compound = $fetch['compound'];
                               $cell_line = $fetch['cell_line'];
                               $pert_type = $fetch['pert_type'];
                               $cmap_node_id = $fetch['cmap_node_id'];
                               $node_id = $fetch['node_id'];
                               $tau = $fetch['tau'];
                               $resultado[] = array("compound" => $compound,"cell_line" => $cell_line,"pert_type" => $pert_type,"cmap_node_id" => $cmap_node_id,"node_id" => $node_id,"tau" => $tau);     
                           }
                       } else{
                           $resultado[] = array("name" => $stringsearch);    
                       }
           
           }        } else{
                       echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);   
                   }
               }  

    }else if ($a==1){
//When the user chooses a specific drug. Then add “and ( cmap.pert_type = 'trt_cp' or cmap.pert_type = 'trt_lig' )” and “order by abs(cmap_foodrugs.tau) desc”
        $sql="SELECT distinct sample.treatment , sample.concentration, sample.time_point, sample.origin_name, cmap_foodrugs.* from study natural join sample natural join nodes right join cmap_foodrugs on nodes.node_id =  cmap_foodrugs.node_id natural join cmap where cmap_foodrugs.cmap_node_id = ?  and abs(tau) >= ? order by abs(cmap_foodrugs.tau) desc";
        if($consulta = mysqli_prepare($link, $sql)){
        $search = mysqli_real_escape_string($link,$stringsearch);
            mysqli_stmt_bind_param($consulta, "ss", $search , $tau );
            if(mysqli_stmt_execute($consulta)){
                $result = mysqli_stmt_get_result($consulta);
                $resultado = array();
                if(mysqli_num_rows($result) > 0){
                    while($fetch = mysqli_fetch_array($result)){    
                        $treatment = $fetch['treatment'];
                        $concentration = $fetch['concentration'];
                        $time_point = $fetch['time_point'];
                        $origin_name = $fetch['origin_name'];
                        $cmap_node_id = $fetch['cmap_node_id'];
                        $node_id = $fetch['node_id'];
                        $tau = $fetch['tau'];
                        $resultado[] = array("treatment" => $treatment,"concentration" => $concentration,"time_point" => $time_point,"origin_name" => $origin_name,"cmap_node_id" => $cmap_node_id,"node_id" => $node_id,"tau" => $tau);     
                    }
                } else{
                    $resultado[] = array("name" => $stringsearch);    
                }
            } else{
                $resultado[] = array("name" =>mysqli_error($link));
            }
        }
}
//TYPE 6 
//Food community studies
    } else if($type==6){
        
        $sql = "SELECT distinct study.accession, sample.treatment, sample.concentration, sample.time_point from study natural join sample natural join nodes where nodes.node_id = ?";
        if($consulta = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($consulta, "s", $post);
    if(mysqli_stmt_execute($consulta)){
        $result = mysqli_stmt_get_result($consulta);
        $resultado = array();
        if(mysqli_num_rows($result) > 0){
            while($fetch = mysqli_fetch_array($result)){
                $accession = $fetch['accession'];
                $treatment = $fetch['treatment'];
                $concentration = $fetch['concentration'];
                $time_point = $fetch['time_point'];
                $resultado[] = array("accession" => $accession,"treatment" => $treatment,"concentration" => $concentration,"time_point" => $time_point);     
            }
        } }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
        
}
echo json_encode($resultado);



?>