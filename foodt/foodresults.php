<?php
//Login
session_start();
//The values of the sessions are obtained
$dataset= $_SESSION['foodresults'];
$dataset2= $_SESSION['foodresults2'];
$texto="";
//Se pasa a texto las variables anteriores
for ($i=0; $i < sizeof($dataset); $i++) { 
$b=implode(";",$dataset[$i]);
    $texto.=$b;
    $texto.="___";
}
for ($i=0; $i < sizeof($dataset2); $i++) { 
$b=implode(";",$dataset2[$i]);
    $texto2.=$b;
    $texto2.="___";
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

#pagination_data , #pagination_data2 {
            width:60%;
            margin-left: 45%;
        }
    .pagination_link , .pagination_link1{
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
.imgtd{
height: 49%;
margin: 1% 1%;
}
</style>  <script>
    </script>
</head>
<body>
<h2>Samples</h2>
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

<div id="data"><p>Data Not Found</p></div>

            <table id="tabla1">
                <thead id="cabezera">
                    <th class='contenttd1' id='treatment'><div class='containertd'> 
                    <div class='containertd1'>Treatment </div> 
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
                                        <th class='contenttd1' id='origin_type'><div class='containertd'> 
                    <div class='containertd1'>Origin Type </div> 
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
                                        <th class='contenttd1' id='origin_name'><div class='containertd'> 
                    <div class='containertd1'>Origin Name</div> 
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
                                        <th class='contenttd1' id='GSM'><div class='containertd'> 
                    <div class='containertd1'>GSM </div> 
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
                      <th class='contenttd1' id='time_point'><div class='containertd'> 
                    <div class='containertd1'>Time Point</div> 
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
                                                       <th class='contenttd1' id='concentration'><div class='containertd'> 
                    <div class='containertd1'>Concentration</div> 
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

                </thead>

               <tbody id="content">     
                </tbody>
            </table>
        </div>
        <div  id="pagination1">
            <div id="pagination_data"></div>
            <a id="actualpage"></a>
        </div>

<h2>Nodes</h2>
<div id="headertable2">
<div class="ht2" id="ht2botones">
<button id="descargacopy" class="descarga2" >Copy</button>
<button id="descargacsv" class="descarga2" >CSV</button>
<button id="descargatsv" class="descarga2" >TSV</button>
</div>
<div id="registros2" class="ht2">
           <p>SHOW ENTRIES</p>
            <select id="select-nregis2">
</select>  
</div>
<div id="buscar2" class="ht2">
<p>Search</p>
<input type="text" name="tablabusqueda2" id="tablabusqueda2" class="busqueda" autocomplete="off">
</div>

</div>
<div class="container">	  
<div id="data2"><p>Data Not Found</p></div>

            <table id="tabla2">
                <thead id="cabezera1">
                     <th class='contenttd1' id='accession'><div class='containertd'> 
                    <div class='containertd1'>Accession </div> 
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
                                         <th class='contenttd1' id='node_id'><div class='containertd'> 
                    <div class='containertd1'>Node Id </div> 
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
                                         <th class='contenttd1' id='treatment'><div class='containertd'> 
                    <div class='containertd1'>Treatment </div> 
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
                                         <th class='contenttd1' id='time_point'><div class='containertd'> 
                    <div class='containertd1'>Time Point </div> 
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
                                         <th class='contenttd1' id='concentration'><div class='containertd'> 
                    <div class='containertd1'>Concentration </div> 
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
                                         <th class='contenttd1' id='origin_name'><div class='containertd'> 
                    <div class='containertd1'>Origin Name </div> 
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
                </thead>
               <tbody id="conte">     
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

$("#data").hide();
    $("#data2").hide();
    var datanew= [];
var nregis=10;
var datanew2=[];
var pagemax=0;
var pagemax2=0;
var pagesession=0;
var nregis2=2;
var pagesession2=0;
var arraynom2= ["treatment","origin_type","origin_name","GSM","time_point","concentration"]
var arraynom = ["accession" ,"node_id","treatment","time_point","concentration","origin_name"];
var datos= "<?php echo $texto; ?>";
var datos2= "<?php echo $texto2; ?>";
parseardata(datos,1);
parseardata(datos2,2);
pagination();
pagination2();
selectregis();
selectregis2();

// Click event change page
//--->
$(document).on('click', '.pagination_link', function() { 
    //If it is next or back, the button pressed will be removed or added to the pagecarousel, otherwise it will be replaced by the value of page
        var page = $(this).attr("id");
        if(page=="Next"){
            page = pagesession+1;            
        }else if(page=="Back"){
            page = pagesession-1;   
        }else {
            page = page.substr(4);
            page=parseInt(page);
        }
        pagesession=page;
        load_data(page);
      }); 
              $(document).on('click', '.pagination_link1', function() { 
        var page = $(this).attr("id");
        if(page=="sNext"){
            page = pagesession2+1;            
        }else if(page=="sBack"){
            page = pagesession2-1;   
        }else {
            page = page.substr(5);
            page=parseInt(page);
        }
        pagesession2=page;
        load_data2(page);
      }); 
//<---
//Search event in a the table 'tablebusqueda1' and 'tablabusqueda2'
//--->
$(document).on('keyup', '#tablabusqueda1', function() {
        //Reset the array which has the info displayeds

    datanew=[];
        //Obtain the value searched

    var key = $(this).val();
    var blsearchfind= false;
    // A search is made in each line of the array and then in each position within each line

        for (let i = 0; i < datos.length; i++) {
        blsearchfind=false;
        for (let j = 0; j < arraynom2.length && blsearchfind==false; j++) {
            var nombre = arraynom2[j];
            var comprobar  = (datos[i][j]).toString();
            //If it exists, it enters the entire line in the array that shows the data and exits the loop to go back to the first        
        if (comprobar.includes(key) == true) {
        datanew.push(datos[i]);
        blsearchfind=true;
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
        for (let j = 0; j < arraynom.length && blsearchfind==false; j++) {
            var comprobar  = (datos2[i][j]).toString();
        if (comprobar.includes(key) == true) {
        datanew2.push(datos[i]);
        blsearchfind=true;
    }
}
    }
selectregis2();
pagination2();
pagesession2=0;
load_data2(0);
});
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
            data: {key:subid,data:datos,name:"tablefoodresults",arrkeys:arraynom2},
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
           var datapage= pagesession*nregis;
            var data10= datanew2.slice(datapage,datapage+nregis);
            console.log(data10);
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
            data: {key:subid,data:datos2,name:"tablefoodresults",arrkeys:arraynom},
            dataType: 'json',
            success:function(response){
                fileName=response;
                       fileUrl="http://imdeafoodcompubio.com/wp-content/uploads/2022/desc/"+fileName;
  var a = document.createElement("a");
  a.href = fileUrl;
  console.log(fileUrl);
  a.setAttribute("download", fileName);
  a.click();
            }
                });
            }
            });
//<---



       
//Events when clicking on the img of the header, of any of the two tables
//This event executes and obtains the row to later order it in the function
// It happens that if it is ascending or descending and the field of the array
//--->
        $(document).on('click', '.imgcabezera', function() { 
        var imgid = $(this).attr("id");
        var imgorden = imgid.substr(0,2);
        var imgtipo = arraynom2[imgid.substr(2,1)];
        ordenar(imgtipo,imgorden);
    }); 

        $(document).on('click', '.imgcabezera2', function() { 
        var imgid = $(this).attr("id");
        var imgorden = imgid.substr(0,2);
        var imgtipo = arraynom[imgid.substr(2,1)];
        ordenar2(imgtipo,imgorden);
    }); 
///<---


//Function Ordenar
//idcabezera = section of the json contained by the array which will be the criteria for ordering
// imgorder = descending or ascending
function ordenar(idcabezera,imgorden){
    var lenarray = datanew.length;

    //Sort string
if (idcabezera==arraynom2[0]) {
     datanew.sort(function(a, b) {
        return a[0].localeCompare(b[0]);
}); 
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
    //Sort string
    else if (idcabezera==arraynom2[1]) {
     datanew.sort(function(a, b) {
       return a[1].localeCompare(b[1]);
}); 
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
    //Sort string
    else if (idcabezera==arraynom2[2]) {
    datanew.sort(function(a, b) {
        return a[2].localeCompare(b[2]);
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
    //Sort Number
    else if (idcabezera==arraynom2[3]) {
    datanew.sort(function(a, b) {
        return a[3] - b[3];
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}

    //Sort Date
    else if (idcabezera==arraynom2[4]) {
datanew.sort(function(a, b) {
        var resultado = 0;
        if(a[4].search("hour") != -1) {
            if (b[4].search("hour") != -1) {
                resultado  = parseInt(a[4]) - parseInt(b[4]);
            }else {
                resultado = -1 ;
            }
        }else  if (a[4].search("day") != -1 ){
            if (b[4].search("hour") != -1) {
                resultado  = 1;
            }else {
                resultado  = parseInt(a[4]) - parseInt(b[4]);
            }
        }
        return resultado;
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
// Concentration comparison (considering only quantities)
// Sort a string with spaces by comparing the first part of the string
else if (idcabezera==arraynom2[5]){
     datanew.sort(function(a, b) {
        var arrayone=((a[5]).split(' '));
        var arraytwo = ((b[5].split(' ')));
        return arrayone[0] - arraytwo[0];
        
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}

pagesession=0;
load_data(0);
}
function ordenar2(idcabezera,imgorden){
var lenarray = datanew2.length;
    //Sort Number

if (idcabezera==arraynom[0]) {
    
     datanew2.sort(function(a, b) {
        return a[0] - b[0];
}); 
if (imgorden=="up") {
    datanew2=datanew2.reverse();
}
} 
    //Sort Number

else if (idcabezera==arraynom[1]) {
     datanew2.sort(function(a, b) {
       return a[1] - b[1];
}); 
if (imgorden=="up") {
    datanew2=datanew2.reverse();
}
}
    //Sort String
else if (idcabezera==arraynom[2]) {
    datanew2.sort(function(a, b) {
        return a[2].localeCompare(b[2]);
});
if (imgorden=="up") {
    datanew2=datanew2.reverse();
}
}
    //Sort Date

else if (idcabezera==arraynom[3]) {
  
datanew2.sort(function(a, b) {
        var resultado = 0;
        if(a[3].search("hour") != -1) {
            if (b[3].search("hour") != -1) {
                resultado  = parseInt(a[3]) - parseInt(b[3]);
            }else {
                resultado = -1 ;
            }
        }else  if (a[3].search("day") != -1 ){
            if (b[3].search("hour") != -1) {
                resultado  = 1;
            }else {
                resultado  = parseInt(a[3]) - parseInt(b[3]);
            }
        }
        return resultado;
});
if (imgorden=="up") {
    datanew2=datanew2.reverse();
}
}
// Concentration comparison (considering only quantities)
// Sort a string with spaces by comparing the first part of the string
else if (idcabezera==arraynom[4]) {
     datanew2.sort(function(a, b) {
        var arrayone=((a[4]).split(' '));
        var arraytwo = ((b[4].split(' ')));
        return arrayone[0] - arraytwo[0];
        
});
if (imgorden=="up") {
    datanew2=datanew2.reverse();
}
}
    //Sort String
else if (idcabezera==arraynom[5]){
    datanew2.sort(function(a, b) {
        return a[5].localeCompare(b[5]);
});
if (imgorden=="up") {
    datanew2=datanew2.reverse();
}
}

pagesession2=0;
load_data2(0);
}

// function parseardata 
//p=Array to parse
//a= If it is the string with reference to table 1 or table 2
function parseardata(p,a){
p=p.split("___");
var x=[];
for (let i = 0; i <= p.length-1; i++) {
    d=p[i].split(";");
    x[i]=d;
}
x.pop();
if (a==1) {
    datos=x;
    datanew=datos;
}else {
datos2=x;
datanew2=datos2;
}

}

// Function pagination and pagination2 where the page change buttons are created, their maximum length is conditioned by the number of records
//displayed at the same time on the same page
//--->
function pagination(){
    pagesession=0;
    $("#pagination_data").empty();
    var len =  datanew.length;
    var longi=Math.ceil(len/nregis);
    pagemax=longi-1;
    if ((longi)!=0) {
        
 if (longi!=1) {
     
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page0>1</button>");
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Back>Back</button>");            
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Next>Next</button>"); 
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page"+(longi-1)+">"+longi+"</button>");                     
           }
        }else{
           $("#pagination_data").empty(); 
        }
            $("#Back").hide();
           load_data(pagesession);
}

function pagination2() {
        pagesession2=0;
    $("#pagination_data2").empty();
            var len = (datos2.length);
            longi2= Math.ceil(len/nregis2);
            pagemax2= longi2-1;
           if (longi2!=1) {
            $("#pagination_data2").append("<button class='pagination_link1' type='button' id=spage0>1</button>");
           $("#pagination_data2").append("<button class='pagination_link1' type='button' id=sBack>Back</button>");            
            $("#pagination_data2").append("<button class='pagination_link1' type='button' id=sNext>Next</button>"); 
            $("#pagination_data2").append("<button class='pagination_link1' type='button' id=spage"+(longi2-1)+">"+longi2+"</button>");                     
            $("#sBack").hide();
           }
        load_data2(pagesession);
}

//<---
// Function selectregis and selectnregis 2 where the select is created that is responsible for displaying x rows of the array
function selectregis(){
          $("#select-nregis").empty();
        var size = datanew.length;
        if (size <= 5 ) {
            document.getElementById("registros1").style.visibility = "hidden";
        }else {
            document.getElementById("registros1").style.visibility = "visible";
            $("#select-nregis").append("<option value='5'>5</option>");
            $("#select-nregis").append("<option value='10' selected='selected' >10</option>");
            for (let i = 25; i < size && i <= 150; i+= 25) {
                $("#select-nregis").append("<option value='"+i+"'>"+i+"</option>");
            }
        }
    }

    function selectregis2(){
          $("#select-nregis2").empty();
        var size = datos2.length;
        if (size < 3 ) {
            document.getElementById("registros2").style.visibility = "hidden";

        }else {
            document.getElementById("registros2").style.visibility = "visible";
            $("#select-nregis2").append("<option value='2'>2</option>");
            for (let i = 5; i < size && i <= 100; i+= 10) {
                $("#select-nregis2").append("<option value='"+i+"'>"+i+"</option>");
            }
        }
    }

    //<---

//Function load_data is used to load the information to the tables shown on the page a is equal to the current page
//--->
    function load_data(a){
        //The div of the table is emptied and depending on the page various buttons are shown
        //If it is 0 next and page max if it is page max back and page 0 and in the others all
    $("#content").empty();   
    if (a!=0) {
        $("#Back").show();
        $("#page0").show();
    }else {
        $("#Back").hide();
        $("#page0").hide();
        
    }
    if (a==Math.ceil((datanew.length/nregis)-1)) {
        $("#Next").hide();
        $("#page"+pagemax).hide();
        
    }else {
        $("#Next").show();
        $("#page"+pagemax).show();
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
            
 if (t==0) {
                $("#tabla1").hide();
                $("#data").show();
                                
                document.getElementById("htbotones").style.visibility = "hidden";
                document.getElementById("registros1").style.visibility = "hidden";
                $("#pagination1").hide();
            }else {
                            //document.getElementById("registros1").style.visibility = "visible";
                                  document.getElementById("htbotones").style.visibility = "visible";
                $("#pagination1").show();
                 $("#data").hide();
                 $("#tabla1").show();
        for( var i = a; i<t; i++){
            $("#content").append("<tr class='tablacontenido' id=content1"+i+"></tr>");
            $("#content1"+i).append("<td>"+datanew[i][0]+"</td>");
            $("#content1"+i).append("<td>"+datanew[i][1]+"</td>");
            $("#content1"+i).append("<td>"+datanew[i][2]+"</td>");
            $("#content1"+i).append("<td> <a href='https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSM"+datanew[i][3]+"' target='_blank'>"+datanew[i][3]+"</a></td>");
            $("#content1"+i).append("<td>"+datanew[i][4]+"</td>");
            $("#content1"+i).append("<td>"+datanew[i][5]+"</td>");
        }
}
}
function load_data2(a){
    $("#conte").empty();   
    if (a!=0) {
        $("#sBack").show();
        $("#spage0").show();
    }else {
        $("#sBack").hide();
        $("#spage0").hide();
    }
    if (a==Math.ceil((datanew2.length/nregis2)-1)) {
        $("#sNext").hide();
        $("#spage"+pagemax2).hide();
    }else {
        $("#sNext").show();
        $("#spage"+pagemax2).show();
    }
    var t=0;
    if(a>0){
        a=(a*nregis2);
        t=parseInt(a)+parseInt(nregis2);
    }
    else {
        t=nregis2;
    
    }
    if(t>=datanew2.length){
        t=datanew2.length;
        }
                    
 if (t==0) {
                $("#tabla2").hide();
                $("#data2").show();
                                
                document.getElementById("ht2botones").style.visibility = "hidden";
                document.getElementById("registros2").style.visibility = "hidden";
                $("#pagination2").hide();
            }else {
                            //document.getElementById("registros2").style.visibility = "visible";
                                  document.getElementById("ht2botones").style.visibility = "visible";
                $("#pagination2").show();
                 $("#data2").hide();
                 $("#tabla2").show();
                for (let i = a; i < t; i++) {
                    $("#conte").append("<tr class='tablaclick' id=conte"+i+"></tr>");
            $("#conte"+i).append("<td>"+datanew2[i][0]+"</td>");
            $("#conte"+i).append("<td>"+datanew2[i][1]+"</td>");
            $("#conte"+i).append("<td>"+datanew2[i][2]+"</td>");
            $("#conte"+i).append("<td>"+datanew2[i][3]+"</td>");
            $("#conte"+i).append("<td>"+datanew2[i][4]+"</td>");
            $("#conte"+i).append("<td>"+datanew2[i][5]+"</td>");
                }  
}

}

//<---


    });

</script>

</body>           
</html>

