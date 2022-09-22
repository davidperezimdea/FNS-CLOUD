<?php
session_start();
sleep(5);
if (isset($_SESSION['nombrearc'])){
$arch=$_SESSION['nombrearc'];
$json =  file_get_contents('/home/u992250224/public_html/wp-content/themes/bento-child/geneset/enrichments/'.$arch.'up.txt');
$json2 = file_get_contents('/home/u992250224/public_html/wp-content/themes/bento-child/geneset/enrichments/'.$arch.'dn.txt');
$token="'nottoken'";
$pathway="'path'";
if (isset($_SESSION['token'])){
$token="typetoken";
    
}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
    <title>Ejemplo</title>
<style>
.site-content{
    height: auto;
}    
#ht2botones{
            width:15%;
            margin-top:3%;
        }
        #registros2 , #buscar2{
            margin-left:10%;
            width:30%;
        }
        #registros2 select {
            width:20%;
        }
        #buscar2{
            float:right;
        }
        #headertable2 {
            clear:left;
            width: 100%;
            display: flex;
}
#htbotones{
            width:15%;
            margin-top:3%;
        }
        #registros1 , #buscar1{
            margin-left:10%;
            width:30%;
        }
        #registros1 select {
            width:20%;
        }
        #buscar1{
            float:right;
        }
        #headertable {
            clear:left;
            width: 100%;
            display: flex;
}
th{
    min-width:190px;
}
#fdr{
    min-width:75px;
}
#pValue , #ratio, #total,#found,#llp{
    min-width:100px;
}
#expected{
    min-width:110px;
}
#pagination_data , #pagination_data2 {
            width:60%;
            margin-left: 45%;
        }
    .pagination_link{
        margin:10px;
        }
       #actualpage,#actualpage2{
         font-size:18px;

            float:right;
        }
        .imgcabezera , .imgcabezera2{
    height:7px;
    width:7px;
}
.containertd{
    display:flex;
}
.containertd1{
    width:70%;
    margin-top:10%;
}
.containertd2{
    float:right;
    margin: 1%;
    width:15%;
}
table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}

.imgtd{
height: 49%;
margin: 1% 1%;
}
th{
    width:100%;
}


</style>  <script>
    </script>
</head>
<body>
    <?php
    echo "<h1 style='text-align:center; text-transform: capitalize;'>".$_SESSION['database']."</h1>";
    ?>
<h2>Overrepresentation Analysis Of Upregulated Genes</h2>
<div id="headertable">
<div class="ht" id="htbotones">
<button id="descargacopy" class="descarga" >Copy</button>
<button id="descargacsv" class="descarga" >CSV</button>
<button id="descargatsv" class="descarga" >TSV</button>
</div>
<div id="registros1" class="ht">
           <p>SHOW ENTRIES</p>
            <select id="select-nregis">
</select>  
</div>
<div id="buscar1" class="ht">
<p>Search</p>
<input type="text" name="tablabusqueda1" id="tablabusqueda1" class="busqueda" autocomplete="off">
</div>

</div>
<div class="container">	
            <table id="tabla1">
                <thead id="cabezera">
                    <th class='contenttd1' id='number_in_list'><div class='containertd'> 
                    <div class='containertd1'>number in list </div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up0'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw0'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                                            <th class='contenttd1' id='term'><div class='containertd'> 
                    <div class='containertd1'>term </div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up1'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw1'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                                    
                                       <th class='contenttd1' id='term_id'><div class='containertd'> 
                    <div class='containertd1'>term id </div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up2'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw2'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                                        <th class='contenttd1' id='fold_enrichment'><div class='containertd'> 
                    <div class='containertd1'>fold_enrichment</div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up3'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw3'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                                        <th class='contenttd1' id='fdr'><div class='containertd'> 
                    <div class='containertd1'>fdr</div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up4'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw4'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                                        <th class='contenttd1' id='expected'><div class='containertd'> 
                    <div class='containertd1'>expected </div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up5'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw5'>
                            </div>  
                        </div> 
                    </div>
                    </th>                                 
                                                                           <th class='contenttd1' id='pValue'><div class='containertd'> 
                    <div class='containertd1'>pValue</div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up6'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw6'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                      <th class='contenttd1' id='number_in_reference'><div class='containertd'> 
                    <div class='containertd1'>number in reference</div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up7'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw7'>
                            </div>  
                        </div> 
                    </div>
                    </th>


                </thead>

               <tbody id="content">     
                </tbody>
            </table>
        </div>
        <div  id="pagination1">
            <div id="pagination_data"></div>
            <a id="actualpage"></a>
        </div>



<h2>Overrepresentation Analysis Of Downregulated Genes</h2>
<div id="headertable2">
<div class="ht" id="htbotones2">
<button id="descargacopy" class="descarga2" >Copy</button>
<button id="descargacsv" class="descarga2" >CSV</button>
<button id="descargatsv" class="descarga2" >TSV</button>
</div>
<div id="registros2" class="ht">
           <p>SHOW ENTRIES</p>
            <select id="select-nregis2">
</select>  
</div>
<div id="buscar2" class="ht">
<p>Search</p>
<input type="text" name="tablabusqueda2" id="tablabusqueda2" class="busqueda" autocomplete="off">
</div>

</div>
<div class="container">	
            <table id="tabla1">
                <thead id="cabezera2">
                    <th class='contenttd1' id='number_in_list'><div class='containertd'> 
                    <div class='containertd1'>number in list </div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up0'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw0'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                                                      <th class='contenttd1' id='term'><div class='containertd'> 
                    <div class='containertd1'>term </div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up1'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw1'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                                                           <th class='contenttd1' id='term_id'><div class='containertd'> 
                    <div class='containertd1'>term id </div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up2'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw2'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                                        <th class='contenttd1' id='fold_enrichment'><div class='containertd'> 
                    <div class='containertd1'>fold_enrichment</div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up3'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw3'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                                        <th class='contenttd1' id='fdr'><div class='containertd'> 
                    <div class='containertd1'>fdr</div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up4'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw4'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                                        <th class='contenttd1' id='expected'><div class='containertd'> 
                    <div class='containertd1'>expected </div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up5'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw5'>
                            </div>  
                        </div> 
                    </div>
                    </th>       
                                                                           <th class='contenttd1' id='pValue'><div class='containertd'> 
                    <div class='containertd1'>pValue</div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up6'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw6'>
                            </div>  
                        </div> 
                    </div>
                    </th>
                      <th class='contenttd1' id='number_in_reference'><div class='containertd'> 
                    <div class='containertd1'>number in reference</div> 
                        <div class='containertd2'>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up7'>
                            </div>
                            <div class='imgtd'>
                                <img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw7'>
                            </div>  
                        </div> 
                    </div>
                    </th>

      
                                    
                </thead>

               <tbody id="contenttabla2">     
                </tbody>
            </table>
        </div>
        <div  id="pagination2">
            <div id="pagination_data2"></div>
            <a id="actualpage2"></a>
        </div>
<script>
jQuery(document).ready(function($) {  
    // Define variables and set hide values for css

    var datanew= [];
    var idmax;
    var idmax2;
var nregis=10;
var type;
var datadescarga=[];
var datadescarga2=[];
var datanew2=[];
var pagesession=0;
var nregis2=10;
var pagesession2=0;
var arraynom = ['number_in_list', 'term','term_id','fold_enrichment', 'fdr', 'expected', 'pValue', 'number_in_reference'];
//var arrayreactome = ["stId", "name", "llp", "entities.found", "entities.total","entities.ratio", "entities.pValue","entities.fdr"];
var arrayreactome = ["stId", "name", "llp", "found", "total","ratio", "pValue","fdr"];
var datos= <?php  echo $json ?>;
var datos2= <?php echo $json2 ?>;
var token = "<?php echo $token ?>";
var database = "<?php  echo $_SESSION['database']; ?>";
// Checks that enrichment was done and if it worked well
//+ execution of functions to fill the tables and configure their fields
if(token!="'nottoken'"){
    type=1;
    
parseardata2(datos,1);
parseardata2(datos2,2);
cabezera();

selectregis();
pagination();
selectregis2();
pagination2();
}else {
    type=2;
parseardata(datos,1);
parseardata(datos2,2);

selectregis();
pagination();
selectregis2();
pagination2();
}
fundatadescarga();

//Search event in a the table 'tablebusqueda1' and 'tablabusqueda2'
//--->
$(document).on('keyup', '#tablabusqueda1', function() {
            //Obtain the value searched and reset the array which maybe has information displayed
    datanew=[];
    var key = $(this).val();
    var blsearchfind= false;
        for (let i = 0; i < datos.length; i++) {
        blsearchfind=false;
            // A search is made in each line of the array and then in each position within each line
//Dos tipos dependiendo de que enrichment se realizo
        if (type==1) {
                   for (let j = 0; j < arrayreactome.length && blsearchfind==false; j++) {
                           var nombre = arrayreactome[j];
                           //Se hace division entre numeros que se truncan y strings
                if (j>2) {
                         var comprobar  = round(datos[i]['entities'][nombre]).toString();
                }else {
                       var comprobar  = (datos[i][nombre]).toString(); 
                }
        if (comprobar.includes(key) == true) {
        datanew.push(datos[i]);
        blsearchfind=true;
    }
}     
        }else {
        for (let j = 0; j < arraynom.length && blsearchfind==false; j++) {
            var nombre = arraynom[j];
            //Se hace un division ya que hay el campo term tiene se divide en dos subcampos label e id 
                            if (nombre=="term") {
                         var comprobar  = (datos[i]['term']["label"]).toString();
                }else if (nombre=="term_id"){
                      var comprobar  = (datos[i]['term']["id"]).toString();  
                }else {
                        var comprobar  = (datos[i][nombre]).toString();
                }
                            //If it exists, it enters the entire line in the array that shows the data and exits the loop to go back to the first        
        if (comprobar.includes(key) == true) {
        datanew.push(datos[i]);
        blsearchfind=true;
    }
}
        }
    }
selectregis();
pagination();
pagesession=0;
load_data(0);
});

$(document).on('keyup', '#tablabusqueda2', function() {
    datanew2=[];
    var key = $(this).val();
    var blsearchfind= false;
        for (let i = 0; i < datos2.length; i++) {
        blsearchfind=false;
        if (type==2) {
                   for (let j = 0; j <= arrayreactome.length && blsearchfind==false; j++) {
                           var nombre = arrayreactome[j];
                if (j>2) {
                         var comprobar  = round(datos[i]['entities'][nombre]).toString();
                }else {
                       var comprobar  = (datos[i][nombre]).toString(); 
                }
        if (comprobar.includes(key) == true) {
        datanew.push(datos2[i]);
        blsearchfind=true;
    }
}     
        }else {
        for (let j = 0; j < arraynom.length && blsearchfind==false; j++) {
            var nombre = arraynom[j];
                            if (nombre=="term") {
                         var comprobar  = (datos2[i]['term']["label"]).toString();
                }else if (nombre=="term_id"){
                      var comprobar  = (datos2[i]['term']["id"]).toString();  
                }else {
                        var comprobar  = (datos2[i][nombre]).toString();
                }
        if (comprobar.includes(key) == true) {
        datanew.push(datos2[i]);
        blsearchfind=true;
    }
}
        }
    }
selectregis2();
pagination2();
pagesession2=0;
load_data2(0);
});
//<---
//Events when clicking on the img of the header, of any of the two tables
//This event executes and obtains the row to later order it in the function
// It happens that if it is ascending or descending and the field of the array
//--->
$(document).on('click', '.imgcabezera', function() { 
        var imgid = $(this).attr("id");
        var imgorden = imgid.substr(0,2);
        if (type==1) {
            var imgtipo = arrayreactome[imgid.substr(2,1)];
        }else {
var imgtipo = arraynom[imgid.substr(2,1)];
        }
        
        ordenar(imgtipo,imgorden,datanew,1);
    }); 
$(document).on('click', '.imgcabezera2', function() { 
        var imgid = $(this).attr("id");
        var imgorden = imgid.substr(0,2);
        if (type==1) {
            var imgtipo = arrayreactome[imgid.substr(2,1)];
        }else {
var imgtipo = arraynom[imgid.substr(2,1)];
        }
        
        ordenar(imgtipo,imgorden,datanew2,2);
    }); 
//<---


//Function ordenar
//idcabezera = section of the json contained by the array which will be the criteria for ordering
// imgorder = descending or ascending
// data = array which is gonna be sort
// x = which enrichment was done

function ordenar(idcabezera,imgorden,data,x){
var lenarray = data.length;
if (type==1) {
    //Sort String
    if (idcabezera==arrayreactome[0]) {
     data.sort(function(a, b) {
        return a[arrayreactome[0]].localeCompare(b[arrayreactome[0]]);
}); 
if (imgorden=="up") {
    data=data.reverse();
}
} 
    //Sort String

else if (idcabezera==arrayreactome[1]) {
     data.sort(function(a, b) {
        return a[arrayreactome[1]].localeCompare(b[arrayreactome[1]]);
}); 
if (imgorden=="up") {
    data=data.reverse();
}
    //Sort Boolean
}else if (idcabezera==arrayreactome[2]) {
     data.sort(function(a, b) {
        return (a[arrayreactome[2]] === b[arrayreactome[2]])? 0 : a[arrayreactome[2]]? -1 : 1;
}); 
if (imgorden=="up") {
    data=data.reverse();
}
}
    //Sort Number
else if (idcabezera==arrayreactome[3]) {
     data.sort(function(a, b) {
        return a["entities"][arrayreactome[3]] - (b["entities"][arrayreactome[3]]);
}); 
if (imgorden=="up") {
    data=data.reverse();
}
}
    //Sort Number
else if (idcabezera==arrayreactome[4]) {
     data.sort(function(a, b) {
        return a["entities"][arrayreactome[4]] - (b["entities"][arrayreactome[4]]);
}); 
if (imgorden=="up") {
    data=data.reverse();
}
}
    //Sort Number

else if (idcabezera==arrayreactome[5]) {
     data.sort(function(a, b) {
        return a["entities"][arrayreactome[5]] - (b["entities"][arrayreactome[5]]);
}); 
if (imgorden=="up") {
    data=data.reverse();
}
}    //Sort Number

else if (idcabezera==arrayreactome[6]) {
     data.sort(function(a, b) {
        return a["entities"][arrayreactome[6]] - (b["entities"][arrayreactome[6]]);
}); 
if (imgorden=="up") {
    data=data.reverse();
}
}    //Sort Number

else if (idcabezera==arrayreactome[7]) {
     data.sort(function(a, b) {
        return a["entities"][arrayreactome[7]] - (b["entities"][arrayreactome[7]]);
}); 
if (imgorden=="up") {
    data=data.reverse();
}
}
    //Sort Number
}else {
if (idcabezera==arraynom[0]) {
     data.sort(function(a, b) {
        return a[arraynom[0]] - b[arraynom[0]];
}); 
if (imgorden=="up") {
    data=data.reverse();
}
} 
else if (idcabezera==arraynom[1]) {
        //Sort String
     data.sort(function(a, b) {
        return a["term"]["label"].localeCompare(b["term"]["label"]);
}); 
if (imgorden=="up") {
    data=data.reverse();
}
}
//Sort String alphanumeric 
//it is verified that it is not undefined
else if (idcabezera==arraynom[2]) {
    data.sort(function(a, b) {
            if (typeof a["term"]["id"] == "undefined") {
                   return 0;
            }
            return a["term"]["id"].localeCompare(b["term"]["id"]);
});
if (imgorden=="up") {
    data=data.reverse();
}
}
//Sort Number 

else if (idcabezera==arraynom[3]) {
     data.sort(function(a, b) {
        return a[arraynom[3]] - b[arraynom[3]];
}); 
if (imgorden=="up") {
    data=data.reverse();
}
} 
else if (idcabezera==arraynom[4]) {
  //Sort Number 

     data.sort(function(a, b) {
        return a[arraynom[4]] - b[arraynom[4]];
}); 
if (imgorden=="up") {
    data=data.reverse();
}
} 
//Sort Number 

else if (idcabezera==arraynom[5]) {
     data.sort(function(a, b) {
        return a[arraynom[5]] - b[arraynom[5]];
}); 
if (imgorden=="up") {
    data=data.reverse();
}
} 
//Sort Number 

else if (idcabezera==arraynom[6]) {
     data.sort(function(a, b) {
        return a[arraynom[6]] - b[arraynom[6]];
}); 
if (imgorden=="up") {
    data=data.reverse();
}
} 
//Sort Number 

else if (idcabezera==arraynom[7]) {
     data.sort(function(a, b) {
        return a[arraynom[7]] - b[arraynom[7]];
}); 
if (imgorden=="up") {
    data=data.reverse();
}
} 
}
//depends on the enrichment, some functions or others are launched
if (x==1) {
 datanew=data;       
load_data(0);

pagesession=0;
}else {
datanew2=data;
load_data2(0);

pagesession2=0;
}

}

//Function cabezera
// Used to change the headers of the table if the enrichment is with reactome
function cabezera(){
        for(var k = 0 ; k<arrayreactome.length;k++){
    $("#"+arraynom[k]+" > .containertd > .containertd1").text(arrayreactome[k]);   
    for(var l = 0 ; l<2;l++){
    $("#"+arraynom[k]).attr("id", arrayreactome[k]);  
    }
}
}
//Functions parseardata
// They serve to fix the data since it is in json format with and we get the relevant one from one of the fields of this json
//--->
function parseardata2(p,a){
var x=[];
for (let i = 0; i <= p.pathways.length-1; i++) {
    x[i]=(p.pathways[i]);
}

if (a==1) {
    datos=x;
    datanew=x;
}else {
datos2=x;
datanew2=datos2;
}
return x;
}

function parseardata(p,a){
var x=[];
for (let i = 0; i <= p.results.result.length-1; i++) {
    x[i]=(p.results.result[i]);
}
if (a==1) {
    datos=x;
    datanew=x;
}else {
datos2=x;
datanew2=datos2;
}
}
//<---
// Function selectregis and selectnregis 2 where the select is created that is responsible for displaying x rows of the array
//--->

function selectregis(){
          $("#select-nregis").empty();
        var size = datanew.length;
        if (size <= 10 ) {
            document.getElementById("registros1").style.visibility = "hidden";
        }else {
            document.getElementById("registros1").style.visibility = "visible";
            $("#select-nregis").append("<option value='10'>10</option>");
            for (let i = 25; i < size && i <= 150; i+= 25) {
                $("#select-nregis").append("<option value='"+i+"'>"+i+"</option>");
            }
        }
    }

    function selectregis2(){
          $("#select-nregis2").empty();
        var size = datos2.length;
        if (size < 10 ) {
            document.getElementById("registros2").style.visibility = "hidden";

        }else {
            document.getElementById("registros2").style.visibility = "visible";
            $("#select-nregis2").append("<option value='10'>10</option>");
            for (let i = 25; i < size && i <= 150; i+= 25) {
                $("#select-nregis2").append("<option value='"+i+"'>"+i+"</option>");
            }
        }
    }

//<---

//Change number of samples
//--->
  $("#select-nregis").on("change", function(){
    var select = $("#select-nregis");
  nregis=select.val();
  pagination();
            });

            $("#select-nregis2").on("change", function(){
    var select = $("#select-nregis2");
  nregis2=parseInt(select.val());
  pagination2();
            });

//<---
// Function pagination and pagination2 where the page change buttons are created, their maximum length is conditioned by the number of records
//displayed at the same time on the same page
//--->
function pagination(){
    pagesession=0;
    $("#pagination_data").empty();
    var len =  datanew.length;
    var longi=Math.ceil(len/nregis);
    
 if (longi>1) {
     idmax= "page"+(longi-1);
            $("#pagination_data").append("<button class='pagination_link' type='button' class='prueba' id=page0>1</button>");
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Back>Back</button>");            
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Next>Next</button>"); 
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page"+(longi-1)+">"+longi+"</button>");                      
           }

           load_data(pagesession);
}

            
function pagination2(){
            pagesession2=0;
    $("#pagination_data2").empty();
    var len =  datanew2.length;
    var longi=Math.ceil(len/nregis2);
 if (longi>1) {
     idmax2 = (longi-1);
            $("#pagination_data2").append("<button class='pagination_link1' type='button' id=tpage0>1</button>");
            $("#pagination_data2").append("<button class='pagination_link1' type='button' id=tBack>Back</button>");            
            $("#pagination_data2").append("<button class='pagination_link1' type='button' id=tNext>Next</button>"); 
            $("#pagination_data2").append("<button class='pagination_link1' type='button' id=tpage"+(longi-1)+">"+longi+"</button>");                     
           }
            $("#tBack").hide();
            load_data2(pagesession2);
        }
        

//<---

        
// Click events change page
//--->
              $(document).on('click', '.pagination_link1', function() { 
                    //If it is next or back, the button pressed will be removed or added to the pagecarousel, otherwise it will be replaced by the value of page
        var page = $(this).attr("id");
        if(page=="tNext"){
            page = pagesession2+1;            
        }else if(page=="tBack"){
            page = pagesession2-1;   
        }else {
            page = page.substr(5);
            page=parseInt(page);
        }
        pagesession2=page;
        load_data2(page);
      }); 
  $(document).on('click', '.pagination_link', function() { 
        page = $(this).attr("id");
        $(this).hide();
        if(page=="Next"){
            page = pagesession+1;            
        }else if(page=="Back"){
            page = pagesession-1;   
        }else {
            page = parseInt($(this).text()-1);
        }
        pagesession=page;
        load_data(page);
      }); 
//<---


//Function load_data and load_data2 are used to load the information to the tables shown on the page a is equal to the current page
//--->
function load_data(a){
            //The div of the table is emptied and depending on the page various buttons are shown
        //If it is 0 next and page max if it is page max back and page 0 and in the others all
    a=parseInt(a);
    $("#actualpage").text(pagesession+1);
    $("#content").empty();   
     if (a!=0) {
        $("#Back").show();
        $("#page0").show();
    }else {
        $("#Back").hide();
        $("#page0").hide();
    }
    //replace to convert it on number
    var nummax = idmax.replace(/[^0-9]/ig,"");
    if (a==nummax) {
        $("#Next").hide();
        $("#"+idmax).hide();
    }else {
        $("#Next").show();
        $("#"+idmax).show();
    }
        //Set the number of samples to be displayed, which is calculated by the page number and the number of records
    //If t is greater than the length of the array, it will not be equal to the length of this
    //If t is equal to 0, "Data Not Found" will be displayed
    var t=0;
    if(a>0){
        a=(a*nregis);
        t=parseInt(a)+parseInt(nregis);
    }
    else {
        t=nregis;
    }
    if(t>datanew.length){
        t=datanew.length;
            }

//Depends on the type of enrichment, one or the other is performed
            if(type==2){
        for( var i = a; i<t; i++){
            $("#content").append("<tr class='tablacontenido' id=content1"+i+"></tr>");
            for (let j = 0; j< arraynom.length; j++) {
                var dats = datanew[i];
                if (arraynom[j]=="term") {
                    $("#content1"+i).append("<td>"+dats[arraynom[j]].label+"</td>");   
                }else if(arraynom[j]=="term_id"){
//Depending on the type of variable, the numbers are tricked
                    $("#content1"+i).append("<td> <a href='https://www.ebi.ac.uk/QuickGO/term/"+dats["term"].id+"' target='no_blank'> "+dats["term"].id+"</a></td>");   
                }else if (arraynom[j]=="fold_enrichment" || arraynom[j]=="fdr" || arraynom[j]=="expected"  || arraynom[j]=="pValue" ){
                $("#content1"+i).append("<td>"+round(dats[arraynom[j]])+"</td>");  
                     
                }else{
                $("#content1"+i).append("<td>"+dats[arraynom[j]]+"</td>");      
                }
            }
        }

}
else {
  

 
         for( var i = a; i<t; i++){
            $("#content").append("<tr class='tablacontenido' id=content1"+i+"></tr>");
            for (let j = 0; j< arrayreactome.length; j++) {
                var dats = datanew[i];
                if (j==0){
                    $("#content1"+i).append("<td><a href='https://reactome.org/PathwayBrowser/#/"+dats[arrayreactome[j]]+"&DTAB=AN&ANALYSIS=MjAyMjA2MTcwOTI0MTlfNDMy' target='no_blank'>"+dats[arrayreactome[j]]+"</a></td>");   
                    
                }else {
                if(j>2){
//Depending on the type of variable, the numbers are tricked
                    if(j>4){
                        $("#content1"+i).append("<td>"+round(dats["entities"][arrayreactome[j]])+"</td>");   
                        
                    }else{ 
                $("#content1"+i).append("<td>"+dats["entities"][arrayreactome[j]]+"</td>");   
                }
                }else {
                $("#content1"+i).append("<td>"+dats[arrayreactome[j]]+"</td>");      
            }
                }
            }
        }
}
        if (datanew.length==0) {
            $(".pagination_link").hide();
            $("#cabezera").hide();
            $("#paginaactual").hide();
        }else {
                     $(".pagination_link").show();
            $("#cabezera").show();
            $("#paginaactual").show();   
        }

}



function load_data2(a){
    $("#actualpage2").text(pagesession2+1);
    $("#contenttabla2").empty();   
    a=parseInt(a);
    
    if (a!=0) {
        $("#tBack").show();
        $("#tpage0").show();
    }else {
        $("#tBack").hide();
        $("#tpage0").hide();
    }
    if (a==Math.ceil((datanew2.length/nregis2)-1)) {
        $("#tNext").hide();
        $("#tpage"+idmax2).hide();
    }else {
        $("#tNext").show();
         $("#tpage"+idmax2).show();
    }
    var t=0;
    if(a>0){
        a=(a*nregis2);
        t=parseInt(a)+parseInt(nregis2);
    }
    else {
        t=nregis2;
    }
    if(t>datanew2.length){
        t=datanew2.length;
            }
            if(type==2){
        for( var i = a; i<t; i++){
            $("#contenttabla2").append("<tr class='tablacontenido2' id=content2"+i+"></tr>");
             var dats = datanew2[i];
            for (let j = 0; j< arraynom.length; j++) {
               
                if (arraynom[j]=="term") {
                    $("#content2"+i).append("<td>"+dats[arraynom[j]].label+"</td>");   
                }else if(arraynom[j]=="term_id"){
                   $("#content2"+i).append("<td> <a href='https://www.ebi.ac.uk/QuickGO/term/"+dats["term"].id+"' target='no_blank'> "+dats["term"].id+"</a></td>");    
                }else if(arraynom[j]=="fold_enrichment" || arraynom[j]=="fdr" || arraynom[j]=="expected"  || arraynom[j]=="pValue" ) {
                 $("#content2"+i).append("<td>"+round(dats[arraynom[j]])+"</td>");   
                    
                }
                else {
                $("#content2"+i).append("<td>"+dats[arraynom[j]]+"</td>");      
                }
            }
        }
            }else {
    
         for( var i = a; i<t; i++){
            $("#contenttabla2").append("<tr class='tablacontenido2' id=content2"+i+"></tr>");
            var dats = datanew2[i];
            for (let j = 0; j< arrayreactome.length; j++) {
                  if (j==0){
                    $("#content2"+i).append("<td><a href='https://reactome.org/PathwayBrowser/#/"+dats[arrayreactome[j]]+"&DTAB=AN&ANALYSIS=MjAyMjA2MTcwOTI0MTlfNDMy' target='no_blank'>"+dats[arrayreactome[j]]+"</a></td>");   
                    
                }else {
                if(j>2){
                    if(j>4){
                        $("#content2"+i).append("<td>"+round(dats["entities"][arrayreactome[j]])+"</td>");   
                        
                    }else{ 
                $("#content2"+i).append("<td>"+dats["entities"][arrayreactome[j]]+"</td>");   
                }
                }else {
                $("#content2"+i).append("<td>"+dats[arrayreactome[j]]+"</td>");      
            }
                }
            }
        }
}
        if (datanew2.length==0) {
            $(".pagination_link1").hide();
            $("#cabezera2").hide();
            $("#paginaactual2").hide();
        }else {
                     $(".pagination_link1").show();
            $("#cabezera2").show();
            $("#paginaactual2").show();   
        }

}

//<---

//Function fundatadescarga
// Function elaborated to parse the data so that when downloading they have the format requested in the script
//file download, what this function is in charge of is depending on the enrichment it will do a parse or another
//having in common removing the fields with the relevant information from the json and storing it in a new array
function fundatadescarga() {

                if(type==2){
        for( var i = 0; i<datos.length; i++){
            var dats = datos[i];
            datadescarga[i]={};
            for (let j = 0; j< arraynom.length; j++) {
                datadescarga[i][arraynom[j]]=[];
                if (arraynom[j]=="term") {
                    datadescarga[i][arraynom[j]]=dats[arraynom[j]].label;   
                }else if(arraynom[j]=="term_id"){
                    datadescarga[i][arraynom[j]]=dats["term"].id;    
                }else {
                    datadescarga[i][arraynom[j]] = dats[arraynom[j]];
                  
                }    
            }
            }


                    for( var i = 0; i<datos2.length; i++){
            var dats = datos2[i];
            datadescarga2[i]={};
            for (let j = 0; j< arraynom.length; j++) {
                datadescarga2[i][arraynom[j]]=[];
                if (arraynom[j]=="term") {
                    datadescarga2[i][arraynom[j]]=dats[arraynom[j]].label;   
                }else if(arraynom[j]=="term_id"){
                    datadescarga2[i][arraynom[j]]=dats["term"].id;    
                }else {
                    datadescarga2[i][arraynom[j]] = dats[arraynom[j]];
                  
                }    
            }
            }
        
            }else {
    
         for( var i = 0; i<datos.length; i++){
            var dats = datos[i];
            datadescarga[i]={};
            for (let j = 0; j< arrayreactome.length; j++) {
                
                datadescarga[i][arrayreactome[j]]=[];
                    if(j>2){
                        datadescarga[i][arrayreactome[j]] = dats["entities"][arrayreactome[j]]

                }else {
               datadescarga[i][arrayreactome[j]] = dats[arrayreactome[j]]  
            }
            }
        }

                 for( var i = 0; i<datos2.length; i++){
            var dats = datos2[i];
            datadescarga2[i]={};
            for (let j = 0; j< arrayreactome.length; j++) {
                 datadescarga2[i][arrayreactome[j]]=[];
                    if(j>2){
                        datadescarga2[i][arrayreactome[j]] = dats["entities"][arrayreactome[j]]

                }else {
               datadescarga2[i][arrayreactome[j]] = dats[arrayreactome[j]]  
            }
            }
        }
}
}
// Download Event 
//--->
$(document).on('click', '.descarga', function() {
        //Get the page where you are and what type of download it is
           var descargaid= $(this).attr("id");
           var subid = descargaid.substr(8);
           var datapage= pagesession*nregis;
            var data10= datanew.slice(datapage,datapage+nregis);
                        //Copy with the obtained data, with this it is added to an input and the copy command is executed later the input is deleted
            // With this is on the clipboard
            if (subid == "copy" ) {
                    $('<input id="textcopy">').val(data10).appendTo('body').select();         
            document.execCommand('copy'); 
            var el = document.getElementById('textcopy');
            el.remove();
            }
                                    //TSV OR CSV the file is sent to descargararchivo.php and the associative array is sent
            else {
                $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/downloadfile.php',
            type: 'post',
            
            data: {key:subid,data:datadescarga,name:"tablagenupenrichment"+database},
            dataType: 'json',
            success:function(response){
                       //Get the name of the file which is on the response and create an element <a> and add the attribute
                //'download'  and indicate where the file is located and order the element to be clicked
                //and start the download
                fileName=response;
                       fileUrl="http://imdeafoodcompubio.com/wp-content/uploads/2022/desc/"+fileName;
  var a = document.createElement("a");
  a.href = fileUrl;

  a.setAttribute("download", fileName);
  a.click();
            }
                });
            }
            });
$(document).on('click', '.descarga2', function() {
           var descargaid= $(this).attr("id");
           var subid = descargaid.substr(8);
           var datapage= pagesession2*nregis2;
            var data10= datanew2.slice(datapage,datapage+nregis2);
            if (subid == "copy" ) {
                    $('<input id="textcopy">').val(data10).appendTo('body').select();         
            document.execCommand('copy'); 
            var el = document.getElementById('textcopy');
            el.remove();
            }
            else {
                $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/downloadfile.php',
            type: 'post',
            data: {key:subid,data:datadescarga2,name:"tablagendnenrichment"+database},
            dataType: 'json',
            success:function(response){
                
                fileName=response;
                       fileUrl="http://imdeafoodcompubio.com/wp-content/uploads/2022/desc/"+fileName;
  var a = document.createElement("a");
  a.href = fileUrl;
  
  a.setAttribute("download", fileName);
  a.click();
            }
                });
            }
            });

//<---

//Function round
//Number truncation leaving it in 3 decimal places

function round(num) {
    var m = Number((Math.abs(num) * 1000).toPrecision(15));
    return Math.round(m) / 1000 * Math.sign(num);
}
    });

</script>

</body>           
</html>

