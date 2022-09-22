<?php
//Ajax_SQL GeneSet 
//First it connects to the database and the data is obtained by sending it via ajax
require_once("../db.php");
$type=$_POST['type'];
$post=$_POST['search'];
    $bldrog=false;
    $blfood=false;
    //TYPE 1 
//The elements that are going to be shown in the page input are obtained, the first 3 food and the first 3 drugs are obtained
//related to that search
if($type==1){
    $resultado=[];
    $resultado = array();
    $sql="SELECT distinct food from TM_interactions where food LIKE ? LIMIT 3";
    $sql2="SELECT distinct drug from TM_interactions where drug LIKE ? LIMIT 3";
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
        //The result is traversed in a loop if there are lines to traverse and they are stored in an array
         if(mysqli_num_rows($result) > 0){
             while($fetch = mysqli_fetch_array($result)){
                 $name = $fetch['food'];
                 $resultado[] = array("name" => $name);    
             }
         } else{
             $blfood=true;   
         }
     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     }
 }  
// The process is repeated
 if($consulta = mysqli_prepare($link, $sql2)){
    $search = mysqli_real_escape_string($link, $post);
     $param_term ='%'. $search.'%' ;
     mysqli_stmt_bind_param($consulta, "s", $param_term);
     if(mysqli_stmt_execute($consulta)){
         $result = mysqli_stmt_get_result($consulta);
         if(mysqli_num_rows($result) > 0){
             while($fetch = mysqli_fetch_array($result)){
                 $name = $fetch['drug'];
                 $resultado[] = array("name" => $name);    
             }
         } else{
             $bldrog=true;   
             
         }
     } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     }
 }    
 }
 //Type 2 
// The texts are obtained from a string which can be food or drug
elseif ($type==2) {
$sql="SELECT distinct * from TM_interactions natural join texts where food = ? or drug = ?";
if($consulta = mysqli_prepare($link, $sql)){
    $search = mysqli_real_escape_string($link, $post);
    mysqli_stmt_bind_param($consulta, "ss", $search,$search);
    if(mysqli_stmt_execute($consulta)){
        $result = mysqli_stmt_get_result($consulta);
        $resultado = array();
        if(mysqli_num_rows($result) > 0){
            $cont=0;
            while($fetch = mysqli_fetch_array($result)){
                $drug = $fetch['drug'];
                $food = $fetch['food'];
                $link = $fetch['link'];
                $text = $fetch['texts_ID'];
                $starti = $fetch['start_index'];
                $endi = $fetch['end_index'];
                $document = $fetch['document'];
                
                $cont++;
                $resultado[] = array("drug" => $drug , "food"=>$food,"num"=>$cont,"document"=>$document,"link"=>$link,"starti"=>$starti , "endi"=>$endi,"text"=>$text);   
            }
        } else{
            $resultado[] = array("name" => "No Results Found");    
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
} 
}
//If both booleans are true it means that type 1 has no results
if($bldrog==true && $blfood==true){
    $resultado[] = array("name" => "No Results Found");    
}


echo json_encode($resultado);
?>