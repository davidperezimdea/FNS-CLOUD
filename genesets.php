<?php
session_start();
//Main page of geneset

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
<style>
    body{
        font-family: Arial, sans-serif;
    }
.tableupdn {
    width:100%;
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}

#numerosearch{
    max-width: 200px;
    float:right;
    height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
        max-height: 100px;
}
.search-box{
    width: 100%;
        position: relative;
        display:inline-block;
        font-size: 14px;
        padding-bottom: 0px;
    }
            .search-box select{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
        max-height: 100px;
        background-color:#DFDEDE;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
        max-height: 100px;
        background-color:#DFDEDE;
    }
       .search-box input[type="number"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
        max-height: 100px;
        background-color:##DFDEDE;
    }
    .result{
        z-index: 999;
        top: 100%;
        left: 0;
        overflow: auto;
        opacity: 1;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
        max-height: 115px;
        opacity: 1;
    }
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        max-height: 100px;
    }
    .result p:hover{
        background: #f2f2f2;
        max-height: 100px;
    }
    .container,#pagination1 ,#headertable {
        width: 60%;
            position: relative;
            display: flex;
            float: right;
            clear:right;
        }
                #pagination_data   {
            width:100%;
            margin-left: 30%;
        }
        .pagination_link,.pagination_link2,.pagination_link3{
        margin:10px;
        }
        #actualpage{
            font-size:18px;
            color:black;
        text-decoration:none;
        }
        .peque{
            width: 100px;
        }
        .containertabla2,#pagination_data2{
            position: relative;
            clear:left;
            display: inline-block;
            overflow-x: auto;
        }

        #registros1{
            padding-left:15px;
            width:20%;
        }
        #buscar1{
            width:35%;
            margin-left:60%;
        }
#pagination_data2 , #pagination_data3 {
            width:60%;
            margin-left: 45%;
        }
    .pagination_link{
        margin:10px;
        }
       #actualpage2,#actualpage3{
         font-size:18px;

            float:right;
        }
table {
  border-collapse: collapse;
}

th, td {
  padding: .25em;
  border: 1px solid darkgrey;
}
    .column {
        float: left;
        width: 35%;
    }
        
        .button{         
            float:right; 
  background-color: #4CAF50; 
  border: none;
  color: white;
  height: 10%;
  text-align: center;
  text-decoration: none;
  font-size: 10px;
        }
#carouseldiv{
    display: inline-block;
}

input[type="radio"]{
    height: 20px;
  width: 15px;
}
.site-content{
    height: auto;
}
.imgcabezera , .imgcabezera2 ,.imgcabezera3{
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
.imgtd{
height: 49%;
margin: 1% 1%;
}

.contenttd1 {
    font-weight:bold;
}

         #ht2botones{
            width:15%;
            margin-top:8%;
        }
        #registros2 , #buscar2{
            margin-left:10%;
            margin-top:2%;
            width:30%;
        }
        #registros2 select {
            width:20%;
        }

        #headertable2 {
            clear:left;
            width: 100%;
            display: flex;
}

         #ht3botones{
            width:15%;
            margin-top:8%;
        }
        #registros3 , #buscar3{
            margin-left:10%;
            margin-top:2%;
            width:30%;
        }
        #registros3 select {
            width:20%;
        }

        #headertable3 {
            clear:left;
            width: 100%;
            display: flex;
}
.help{
        margin-left:2%;
    }
        .helpresult{
        z-index: 999;
        top: 100%;
        left: 10%;
        overflow: auto;
        opacity: 1;
    }
        .helpresult p{
        margin: 0;
        margin-left:10%;
        font-style:italic;
        cursor: pointer;
        max-height: 100px;
    }


#selectdata h3{
    display:inline;
}

.key , select {
  background: url('http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png') no-repeat;
  background-position: 95% 50%;
  background-size: 7px;
}


    #gifbt {
  position: fixed;
  left: 45%;
  top: 50%;
  width: 10%;
  height: 10%;
  z-index: 9999;

    }
    
    
       #myBtn {
        position: fixed;
        bottom: 10px;
        float: right;
        right: 5%;
        left: 95%;
        max-width: 50px;
        width: 100%;
        font-size: 12px;
        border-color: rgba(85, 85, 85, 0.2);
        background-color: rgb(100,100,100);
        padding: .5px;
        border-radius: 4px;

    } 
    
    
</style>
</head>
<body>

<div class="column">
    <div class="search-box">
           <p>Compound </p>
            <input type="text" name="key" id="key" class="key" autocomplete="off">
            <div class="result" id="result"></div>
            Sample Origin
            <input type="text" name="origen" id="origen" class="key" autocomplete="off">
            <div class="result" id="result2"></div>


<div  class="search-py">
    <div id="selectdata"><h3>Select Database</h3><img id="datahelp" class="help "src="http://imdeafoodcompubio.com/wp-content/uploads/2022/06/icon1.png"   width="15" /> </div>
          <div class="helpresult" id="helpresult"></div>
<select id="selecten">
<option value="molecular">GO MOLECULAR FUNCTION</option>
<option value="biological">GO BIOLOGICAL PROCESS</option>
<option value="celullar">GO CELULLAR COMPONEN</option>
<option value="reactome">REACTOME</option>
</select>
<br>
<button id="enrichment" class="button" >Run enrichment analysis</button>
<br>
</div>
</div>


</div>
<div id="headertable">
<div id="registros1">
           <p>SHOW ENTRIES</p>
            <select id="select-nregis">
</select>  
</div>
<div id="buscar1">
<p>Search</p>
<input type="text" name="tablabusqueda" id="tablabusqueda" class="busqueda" autocomplete="off">
</div>
</div>
<div class="container">
     <div id="data"><p>Data Not Found</p></div>
            <table id="tabla1" style="overflow-x:auto;">
                <thead>
                </thead>
                <tbody id="content">     
                </tbody>
            </table>
        </div>
        <div  id="pagination1">
            <div id="pagination_data"></div>
            <a id="actualpage"></a>
        </div>


</select> 
        <button id="myBtn"><a id="cambioupdn" href="#gncontainer3" style="color: white">DN</a></button>
        
<div id="gncontainer2">
<h2 class="tituloupdn">Upregulated Genes</h2>
<div id="headertable2">
<div class="ht2" id="ht2botones">
<button id="descargacopy" class="descarga" >Copy</button>
<button id="descargacsv" class="descarga" >CSV</button>
<button id="descargatsv" class="descarga" >TSV</button>
</div>
<div id="registros2" class="ht2">
           <p>SHOW ENTRIES</p>
            <select id="select-nregis2">
</select>  
</div>
<div id="buscar2" class="ht2">
<p>Free Search</p>
<input type="text" name="tablabusqueda2" id="tablabusqueda2" class="busqueda" autocomplete="off">
</div>
</div>
        <div class="containertabla2">
             <div id="data2"><p>Data Not Found</p></div>	
            <table id="tabla2" style="overflow-x:auto;">
                <thead>
                </thead>
                <tbody id="conte">     
                </tbody>
            </table>
        </div>
                <div  id="pagination2">
            <div class="pagination2" id="pagination_data2">
            </div>
            <div class="pagination2">
            <a id="actualpage2"></a>
</div>
        </div>
   </div>
<img id="gifbt" src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Loading_Key.gif"   width="250" />



<div id="gncontainer3">
<h2 class="tituloupdn" >Downregulated Genes</h2>
<div id="headertable3">
<div class="ht3" id="ht3botones">
<button id="descargacopy" class="descarga2" >Copy</button>
<button id="descargacsv" class="descarga2" >CSV</button>
<button id="descargatsv" class="descarga2" >TSV</button>
</div>
<div id="registros3" class="ht2">
           <p>SHOW ENTRIES</p>
            <select id="select-nregis3">
</select>  
</div>
<div id="buscar3" class="ht3">
<p>Free Search</p>
<input type="text" name="tablabusqueda3" id="tablabusqueda3" class="busqueda" autocomplete="off">
</div>
</div>

        <div class="containertabla3">	

<div id="data3"><p>Data Not Found</p></div>	

            <table id="tabla3" style="overflow-x:auto;">
                <thead>
                </thead>
                <tbody id="bodycontent">     
                </tbody>
            </table>
        </div>
                <div  id="pagination3">
            <div class="pagination3" id="pagination_data3">
            </div>
            <div class="pagination3">
            <a id="actualpage3"></a>
</div>
</div>




<script>
    // Define variables and set hide values for css
$("#myBtn").hide();
$("#gifbt").hide();
    $(".containertabla2").hide();
    $(".containertabla3").hide();
    $("#headertable").hide();
    $("#data").hide();
    $("#data2").hide();
    $("#data3").hide();
    var valortrue = false;
     $(".tituloupdn").hide();
    $("#headertable2").hide();
    $("#headertable3").hide();
    var datosup=[];
    var datosdn=[];
    $(".descarga").hide();
    $("#numerosearch").hide();
    var arraynom = ["accession"  ,"node_id","treatment","time_point","concentration", "origin_name"];
    var arraynom2 = ["Entrezgene_ID","External_Gene_Name","Description"];
var verdadero=false;
var idloaddata2 =1;
var idmax;
var idmax2;
var idmax3;
var pathway;
var longi2;
var nregis=2;
var dataset;
var nregis2=10;
var nregis3=10;
var datasecure2={};
var datasecure3={};
var datanew = {};
var datanew2 = {};
var datanew3 = {};
var datos={};
var datos2={};
var datos4={};
var type=2;
var botonvalor ="fdrug";
var provisional=1;
var orden="";
var pagesession=0;
var pagesession2=0;
    var datadescarga2 ={};
    var datadescarga={};
jQuery(document).ready(function($) {

    //Keyup event to fill the div which will show the autocomplete suggestions
    $('.key').on('keyup input', function() {        
                //We get the value and the id of the input.
var key = $(this).val();
orden = $(this).attr("id");
//We check that the value is not null or empty
if(key != ""){
    //We make a request to ajax that redirects us to another script where the Mysql query will be executed and will return the first 5 records similar to what is being searched for
    jQuery.ajax({
        url:'<?php echo get_stylesheet_directory_uri(); ?>/geneset/ajaxsql.php',
        type: 'post',
        data: {search:key, type:1,orden:orden},
        dataType: 'json',
        success:function(response){
            //Here in this if we check which of the two inputs is the one being written
            //We get the length of the response and add one by one the response in the div
            if (orden=="key") {
                var len = response.length;
                $("#result").empty();
                for( var i = 0; i<len; i++){
                    var name = response[i]['name'];
                    $("#result").append("<p>"+name+"</p>");
                }   
            }else {
                var len = response.length;
                $("#result2").empty();
                for( var i = 0; i<len; i++){
                    var name = response[i]['name'];
                    $("#result2").append("<p>"+name+"</p>");
            }
        }
        }, error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    }  
    });
}else {
        //If the answer is empty, the result is cleaned
    $(".result").empty();
}
})

//Help events, when the event is activated the text is shown to indicate the instructions and when it ends everything is hidden

$(document).on("mouseenter", ".help", function(){

    $("#helpresult").empty();
    var idhelp = $(this).attr("id");
if (idhelp=="datahelp") {
                $("#helpresult").append("<p>To change database click  on the GO MOLECULAR FUNCTTION square</p>");
                        
}   
 });
 $(document).on("mouseleave", ".help", function(){
    $("#helpresult").empty();

        });

//Events to go up or down in the page
 $(document).on("mouseover", "#gncontainer3", function(){
    $("#cambioupdn").text("UP");
    $("#cambioupdn").attr('href', '#headertable2');
        });
        
    $(document).on("mouseover", "#gncontainer2", function(){
    $("#cambioupdn").text("DN");
    $("#cambioupdn").attr('href', '#headertable3');
        });
 
//CLICK event on any of the input options
$(document).on("click", ".result p", function(){
        //Check what input is clicked and call showtables function
    if (orden=="key") {
        $('#result').empty();     
         $('#'+orden).val($(this).text());
         mostrartablas();

    }else{
        $('#result2').empty();     
        $('#'+orden).val($(this).text());
                //Check the value of the first input to call the function
        if ($('#key').val()!=null) {
            mostrartablas();
        }
    }
        });

//Search event in a the table 'tablabusqueda' 'tablabusqueda2' and 'tablabusqueda3' 
//(Same comments)
$(document).on('keyup', '#tablabusqueda', function() {
    //Reset the array which has the info displayeds
    datanew=[];
    //Obtain the value searched
    var key = $(this).val();
    var blsearchfind= false;
// A search is made in each line of the array and then in each position within each line
        for (let i = 0; i < datos['a'].length; i++) {
            blsearchfind=false;
        for (let j = 0; j < arraynom.length && blsearchfind==false; j++) {
            var nombre = arraynom[j];
            var comprobar  = (datos['a'][i][nombre]).toString();
//If it exists, it enters the entire line in the array that shows the data and exits the loop to go back to the first        
if (comprobar.includes(key) == true) {
        datanew.push(datos['a'][i]);
        blsearchfind=true;
    }
}
    }
//The relevant functions are called to display the data and the page is set to 0
selectregis();
pagination();
pagesession=0;
load_data(0);
});

$(document).on('keyup', '#tablabusqueda2', function() {
        datanew2=[];
    var key = $(this).val();
    var blsearchfind= false;
        for (let i = 0; i < datasecure2.length; i++) {
        blsearchfind=false;
//Split to be able to perform the search by the type of information that is in the array    
    var datosx2 = (datasecure2[i]).split('\t'); 
                   for (let j = 0; j < arraynom2.length && blsearchfind==false; j++) {
                           
                       var comprobar  = datosx2[j].toString(); 
        if (comprobar.includes(key) == true) {
        datanew2.push(datasecure2[i]);
        blsearchfind=true;
    }
}  
}
selectregis2();
pagination2();
pagesession2=0;
load_data2(0);
});

$(document).on('keyup', '#tablabusqueda3', function() {
    datanew3=[];
    var key = $(this).val();
    var blsearchfind= false;
        for (let i = 0; i < datasecure3.length; i++) {
        blsearchfind=false;
        //Split to be able to perform the search by the type of information that is in the array
        var datosx3 = (datasecure3[i]).split('\t'); 
                   for (let j = 0; j < arraynom2.length && blsearchfind==false; j++) {
                           
                       var comprobar  = datosx3[j].toString(); 
        if (comprobar.includes(key) == true) {
        datanew3.push(datasecure3[i]);
        blsearchfind=true;
    }
}  
}
selectregis3();
pagination3();
pagesession3=0;
load_data3(0);
});
//Order header function is to check what field it is, imgorder to know if it is up or dn
//data to pass the array to be ordered and x to know which table is ordered
function ordenar2(idcabezera,imgorden,data,x){
var lenarray = data.length;
//Sort Number
if (idcabezera==arraynom2[0]) {
     data.sort(function(a, b) {
         var d2=a.split('\t'); 
        var d3 = b.split('\t');
         return (d2[0]) - (d3[0]);
}); 
if (imgorden=="up") {
    data=data.reverse();
}
} 
//Sort String
if (idcabezera==arraynom2[1]) {
     data.sort(function(a, b) {
                var d2=a.split('\t'); 
        var d3 = b.split('\t');
          return d2[1].localeCompare(d3[1]);
}); 
if (imgorden=="up") {
    data=data.reverse();
}
} 
//Sort String

if (idcabezera==arraynom2[2]) {
     data.sort(function(a, b) {
                         var d2=a.split('\t'); 
        var d3 = b.split('\t');
        return d2[2].localeCompare(d3[2]);
}); 
if (imgorden=="up") {
    data=data.reverse();
    
}
} 
//Different tables

if (x==2) {
datanew2=data;
    pagesession2=0;
load_data2(0);
}else {
    datanew3=data
    pagesession3=0;
load_data3(0);
}

}

       
//Events when clicking on the img of the header, of any of the two tables
//This event executes and obtains the row to later order it in the function
// It happens that if it is ascending or descending and the field of the array
//--->
$(document).on('click', '.imgcabezera', function() { 
        var imgid = $(this).attr("id");
        var imgorden = imgid.substr(0,2);
        var imgtipo = arraynom[imgid.substr(2,1)];
        ordenar(imgtipo,imgorden);
    }); 
            $(document).on('click', '.imgcabezera2', function() { 
        var imgid = $(this).attr("id");
        var imgorden = imgid.substr(0,2);
        var imgtipo = arraynom2[imgid.substr(2,1)];
        ordenar2(imgtipo,imgorden,datanew2,2);
    }); 
                $(document).on('click', '.imgcabezera3', function() { 
        var imgid = $(this).attr("id");
        var imgorden = imgid.substr(0,2);
        var imgtipo = arraynom2[imgid.substr(2,1)];
        ordenar2(imgtipo,imgorden,datanew3,3);
    }); 
//<---




//Function 'ordenar' where the name of the field of the array is passed and if it is ascending or descending

function ordenar(idcabezera,imgorden){
var lenarray = datanew.length;
//Sort Number
if (idcabezera==arraynom[0]) {
     datanew.sort(function(a, b) {
        return a[arraynom[0]] - b[arraynom[0]];
}); 
if (imgorden=="up") {
    datanew=datanew.reverse();
}
} 
//Sort Number
else if (idcabezera==arraynom[1]) {
     datanew.sort(function(a, b) {
        return a[arraynom[1]] - b[arraynom[1]];
}); 
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
//Sort String
else if (idcabezera==arraynom[2]) {
    datanew.sort(function(a, b) {
        return a[arraynom[2]].localeCompare(b[arraynom[2]]);
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
//Sort Date
else if (idcabezera==arraynom[3]) {
    datanew.sort(function(a, b) {
        var resultado = 0;
        if(a[arraynom[3]].search("hour") != -1) {
            if (b[arraynom[3]].search("hour") != -1) {
                resultado  = parseInt(a[arraynom[3]]) - parseInt(b[arraynom[3]]);
            }else {
                resultado = -1 ;
            }
        }else  if (a[arraynom[3]].search("day") != -1 ){
            if (b[arraynom[3]].search("hour") != -1) {
                resultado  = 1;
            }else {
                resultado  = parseInt(a[arraynom[3]]) - parseInt(b[arraynom[3]]);
            }
        }
        return resultado;
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
// Sort a string with spaces by comparing the first part of the string
else if (idcabezera==arraynom[4]) {
  
    datanew.sort(function(as, b) {
        var arrayone=((as[arraynom[4]]).split(' '));
        var arraytwo = ((b[arraynom[4]].split(' ')));
        return arrayone[0] - arraytwo[0];
        
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
//Sort String   
else if (idcabezera==arraynom[5]) {
    datanew.sort(function(a, b) {
 return a[arraynom[5]].localeCompare(b[arraynom[5]]);
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
pagesession=0;
load_data(0);
}




// Function pagination  pagination2 and pagination3 where the page change buttons are created, their maximum length is conditioned by the number of records
//displayed at the same time on the same page
function pagination(){
    pagesession=0;
    $("#pagination_data").empty();
    var len =  datanew.length;
    var longi=Math.ceil(len/nregis);
 if (longi>1) {
     idmax= "page"+(longi-1);
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page0>1</button>");
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Back>Back</button>");            
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Next>Next</button>"); 
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page"+(longi-1)+">"+longi+"</button>");                     
           }
            $("#Back").hide();
            $("#actualpage").text(pagesession+1);
           load_data(pagesession);
}

function pagination2(){
            pagesession2=0;
    $("#pagination_data2").empty();
    var len =  datanew2.length;
    var longi=Math.ceil(len/nregis2);
 if (longi>1) {
     idmax2 = (longi-1);
            $("#pagination_data2").append("<button class='pagination_link2' type='button' id=tpage0>1</button>");
            $("#pagination_data2").append("<button class='pagination_link2' type='button' id=tBack>Back</button>");            
            $("#pagination_data2").append("<button class='pagination_link2' type='button' id=tNext>Next</button>"); 
            $("#pagination_data2").append("<button class='pagination_link2' type='button' id=tpage"+(longi-1)+">"+longi+"</button>");                     
           }
            $("#tBack").hide();
            $("#actualpage2").text(pagesession2+1);
            load_data2(pagesession2);
        }

        function pagination3(){
            pagesession3=0;
    $("#pagination_data3").empty();
    var len =  datanew3.length;
    var longi=Math.ceil(len/nregis3);
 if (longi>1) {
     idmax3 = (longi-1);
            $("#pagination_data3").append("<button class='pagination_link3' type='button' id=xpage0>1</button>");
            $("#pagination_data3").append("<button class='pagination_link3' type='button' id=xBack>Back</button>");            
            $("#pagination_data3").append("<button class='pagination_link3' type='button' id=xNext>Next</button>"); 
            $("#pagination_data3").append("<button class='pagination_link3' type='button' id=xpage"+(longi-1)+">"+longi+"</button>");                     
           }
            $("#xBack").hide();
            $("#actualpage3").text(pagesession3+1);
            load_data3(pagesession3);
        }
// Function selectregis , selectnregis 2 and selectnregis 3 where the select is created that is responsible for displaying x rows of the array

      function selectregis(){
          $("#select-nregis").empty();
        var size = datanew.length;
        if (size <= 2 ) {
             $("#registros1").hide();
             $("#actualpage").hide();
        }else {
            $("#registros1").show();
            $("#actualpage").show();
            $("#select-nregis").append("<option value='2'>2</option>");
            for (let i = 5; i < size && i < 100; i+= 5) {
                $("#select-nregis").append("<option value='"+i+"'>"+i+"</option>");
            }
        }
    }
    
    function selectregis2(){
          $("#select-nregis2").empty();
        var size = datanew2.length;
        if (size < 10 ) {
             document.getElementById("registros2").style.visibility = "hidden";
             $("#actualpage2").hide();
        }else {
            document.getElementById("registros2").style.visibility = "visible";
            $("#actualpage2").show();
            for (let i = 10; i < size && i <= 100; i+= 10) {
                $("#select-nregis2").append("<option value='"+i+"'>"+i+"</option>");
            }
        }
    }

    function selectregis3(){
          $("#select-nregis3").empty();
        var size = datanew3.length;
        if (size <= 10 ) {
             document.getElementById("registros3").style.visibility = "hidden";
             $("#actualpage2").hide();
        }else {
            document.getElementById("registros3").style.visibility = "visible";
            $("#actualpage3").show();
            for (let i = 10; i < size && i <= 100; i+= 10) {
                $("#select-nregis3").append("<option value='"+i+"'>"+i+"</option>");
            }
    }
}

//Function mostrartablas 

function mostrartablas(){
    //Get the value of the two inputs

    var key = $('#key').val();
    var key2 = $("#origen").val();
    valortrue = false;
    $.ajax({
    url:'<?php echo get_stylesheet_directory_uri(); ?>/geneset/ajaxsql.php',
    type: 'post',
    data: {search:key,search2:key2, type:3},
    dataType: 'json',
    success:function(response){
        //Get the values ​​from the ajax response and set, check and display the various parameters/variables
        let pages = 0;
        datos['a']=response;
        datanew=response;
        datos['type']=type;
        $("#headertable").show();
        $("#pagination_data").empty();
        $("#content").empty();
        var len = response.length;
        if ((response[0]['compound'] != undefined && response[0]['treatment'] == undefined) || (response[0]['treatment'] != undefined && response[0]['compound'] == undefined) ) {
            selectregis();
            pagination();
        }
    } ,error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    }  
    });
}

// Page change event, when a button with number, back or next is pressed
//This event is executed which checks what has been clicked and changes the page.
//-->
$(document).on('click', '.pagination_link', function() { 
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
        $("#actualpage").text(pagesession+1);
        load_data(pagesession);
      }); 
             
      $(document).on('click', '.pagination_link2', function() { 
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
        $("#actualpage2").text(pagesession2+1);
        load_data2(page);
      }); 
      $(document).on('click', '.pagination_link3', function() { 
        var page = $(this).attr("id");
        if(page=="xNext"){
            page = pagesession3+1;            
        }else if(page=="xBack"){
            page = pagesession3-1;   
        }else {
            page = page.substr(5);
            page=parseInt(page);
        }
        pagesession3=page;
        $("#actualpage3").text(pagesession3+1);
        load_data3(page);
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
  nregis2=select.val();
  pagination2();
            });


      $("#select-nregis3").on("change", function(){
    var select = $("#select-nregis3");
  nregis3=select.val();
  pagination3();
            });

//<---

//--->
//Function load_data , load_data2  and load_data3 are used to load the information to the tables shown on the page a is equal to the current page
//the same for all functions

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
        t=a+parseInt(nregis);
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
                
                document.getElementById("registros1").style.visibility = "hidden";
                $("#pagination1").hide();
            }else {
                 document.getElementById("registros1").style.visibility = "visible";
                $("#pagination1").show();
                 $("#data").hide();
                 $("#tabla1").show();
        $("#content").append("<tr class=content1></tr>");
            $(".content1").append(" <td class='contenttd1' id='accession'><div class='containertd'>  <div class='containertd1'>"+
            " Accession </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up0'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw0'>"+
             " </div> </div> </div></td>");

            $(".content1").append(" <td class='contenttd1' id='node_id'><div class='containertd'>  <div class='containertd1'>"+
            " Food_Node_id </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up1'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw1'>"+
             " </div> </div> </div></td>");

              $(".content1").append(" <td class='contenttd1' id='treatment'><div class='containertd'>  <div class='containertd1'>"+
            " Treatment </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up2'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw2'>"+
             " </div> </div> </div></td>");

              $(".content1").append(" <td class='contenttd1' id='time_point'><div class='containertd'>  <div class='containertd1'>"+
            " Time_point </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up3'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw3'>"+
             " </div> </div> </div></td>");

              $(".content1").append(" <td class='contenttd1' id='concentration'><div class='containertd'>  <div class='containertd1'>"+
            " Concentration </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up4'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw4'>"+
             " </div> </div> </div></td>");

              $(".content1").append(" <td class='contenttd1' id='origin_name'><div class='containertd'>  <div class='containertd1'>"+
            " Origin_name </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up5'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw5'>"+
             " </div> </div> </div></td>");

        for( var i = a; i<t; i++){
            $("#content").append("<tr class='tablacontenido' id=content1"+i+"></tr>");
            $("#content1"+i).append("<td><a href='https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE"+datanew[i]['accession']+"' target='no_blank'>"+datanew[i]['accession']+"</a></td>");
            $("#content1"+i).append("<td>"+datanew[i]['node_id']+"</td>");
            $("#content1"+i).append("<td>"+datanew[i]['treatment']+"</td>");
            $("#content1"+i).append("<td>"+datanew[i]['time_point']+"</td>");
            $("#content1"+i).append("<td>"+datanew[i]['concentration']+"</td>");
            $("#content1"+i).append("<td>"+datanew[i]['origin_name']+"</td>");
        }
}
        }

        function load_data2(a){
    $("#conte").empty();   
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
if (t==0) {
                $("#tabla2").hide();
                $("#data2").show();
                
                document.getElementById("ht2botones").style.visibility = "hidden";
                document.getElementById("registros2").style.visibility = "hidden";
                $("#pagination2").hide();
            }else {
                 document.getElementById("registros2").style.visibility = "visible";
                                  document.getElementById("ht2botones").style.visibility = "visible";
                $("#pagination2").show();
                 $("#data2").hide();
                 $("#tabla2").show();
            $("#conte").append("<tr id=content2></tr>"); 
            $("#content2").append(" <td class='contenttd1' id='Entrezgene'><div class='containertd'>  <div class='containertd1'>"+
            " Entrezgene ID </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up0'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw0'>"+
             " </div> </div> </div></td>");
            $("#content2").append(" <td class='contenttd1' id='genename'><div class='containertd'>  <div class='containertd1'>"+
            " External Gene Name  </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up1'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw1'>"+
             " </div> </div> </div></td>");
            $("#content2").append(" <td class='contenttd1' id='Description'><div class='containertd'>  <div class='containertd1'>"+
            " Description </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='up2'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='dw2'>"+
             " </div> </div> </div></td>");





// A split is performed by how the information is stored 
        for( var i = a; i<t; i++){
            var d2=datanew2[i].split('\t'); 
             
            $("#conte").append("<tr class='tablacontenido2' id=content2"+i+"></tr>");
                for (let j = 0; j < d2.length; j++) {
                    $("#content2"+i).append("<td>"+d2[j]+"</td>");
                }
        }

$(".containertabla2").show();

}
}




function load_data3(a){
    $("#bodycontent").empty();   
    if (a!=0) {
        $("#xBack").show();
        $("#xpage0").show();
    }else {
        $("#xBack").hide();
        $("#xpage0").hide();
    }
    if (a==Math.ceil((datanew3.length/nregis3)-1)) {
        $("#xNext").hide();
        $("#xpage"+idmax3).hide();
    }else {
        $("#xNext").show();
        $("#xpage"+idmax3).show();
    }
    var t=0;
    if(a>0){
        a=(a*nregis3);
        
        t=parseInt(a)+parseInt(nregis3);
    }
    else {
        t=nregis3;
    }
    if(t>datanew3.length){
        t=datanew3.length;
            }
            if (t==0) {
                $("#tabla3").hide();
                $("#data3").show();
                
                document.getElementById("ht3botones").style.visibility = "hidden";
                document.getElementById("registros3").style.visibility = "hidden";
                $("#pagination3").hide();
            }else {
                 document.getElementById("registros3").style.visibility = "visible";
                                  document.getElementById("ht3botones").style.visibility = "visible";
                $("#pagination3").show();
                 $("#data3").hide();
                 $("#tabla3").show();
                    $("#bodycontent").append("<tr id=content3></tr>"); 
            $("#content3").append(" <td class='contenttd1' id='Entrezgene_ID'><div class='containertd'>  <div class='containertd1'>"+
            " Entrezgene ID </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera3' id='up0'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera3' id='dw0'>"+
             " </div> </div> </div></td>");
            $("#content3").append(" <td class='contenttd1' id='External_Gene_Name'><div class='containertd'>  <div class='containertd1'>"+
            " External Gene Name  </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera3' id='up1'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera3' id='dw1'>"+
             " </div> </div> </div></td>");
            $("#content3").append(" <td class='contenttd1' id='Description'><div class='containertd'>  <div class='containertd1'>"+
            " Description </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera3' id='up2'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera3' id='dw2'>"+
             " </div> </div> </div></td>");

// A split is performed by how the information is stored
        for( var i = a; i<t; i++){
            var d3=datanew3[i].split('\t'); 
             
            $("#bodycontent").append("<tr class='tablacontenido3' id=content3"+i+"></tr>");
                for (let j = 0; j < d3.length; j++) {
                    $("#content3"+i).append("<td>"+d3[j]+"</td>");
                }
        }

$(".containertabla3").show();

}


}
//<---


//table click event 
    $(document).on('click', '.tablacontenido', function() { 
        // Get the id of the cell
        var id = $(this).attr("id");
        $(".tablacontenido").css("background-color","white");
        //Change the color of the cell
        $(this).css("background-color","#B0BED9");
       nregis2=10;
       //We get the number of the cell id and activate the loading image 
        var identificador = id.substr(7,1);
        id = id.substr(8);
        var x ;
        idloaddata2=identificador;
        $("#gifbt").show();
//First make an ajax request and get the up and dn nodes
        //These data are stored in an array and sent to a script that will obtain and save the information obtained
        //Then we make another request to read the created file
        $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/geneset/ajaxsql.php',
            type: 'post',
            data: {search:datanew[id]['node_id'], type:2},
            dataType: 'json',
            success:function(response){
                datos2={};
            
                datos2=response;
                 for( var i = 0; i<datos2.length; i++){
                    if(datos2[i]['up']!=null){
                     datosup[i]=datos2[i]['up']
                    }
                    if(datos2[i]['dn']!=null){
                     datosdn[i]=datos2[i]['dn']
                    }
                }
                valortrue = true;
                 $.post('<?php echo get_stylesheet_directory_uri();?>/geneset/python.php', {idup:datosup,iddn:datosdn,type:1}).done(function(data){
                        x=true;
                });
                 $.ajax({
    url:'<?php echo get_stylesheet_directory_uri(); ?>/geneset/lectura.php',
    type: 'post',
    dataType: 'json',
    success:function(response){
// The data is parsed to save it in an array and the blank spaces are deleted
datanew2=response['up'].split('\n'); 

 datanew3=response['dn'].split('\n');
 datanew2=datanew2.filter(function(n){return n; });
 datanew3=datanew3.filter(function(n){return n; });
 datasecure2=datanew2;
  datasecure3=datanew3;
  fundatadescarga();
                 $(".descarga").show();
                $("#headertable2").show();
                                $("#headertable3").show();
                                $(".tituloupdn").show();
                selectregis2();
                selectregis3();
        pagination2();
        pagination3();
        $("#gifbt").hide();
        $("#myBtn").show();
    }  }); 
    
              }});
        }); 








//Enrichment event
$(document).on("click", "#enrichment", function(){
//First it is verified that the things have been executed, then the values ​​of the select are obtained
    if(valortrue==true){
        $("#gifbt").show();
        var select = $("#selecten");
         pathway="";
        id=select.val();
//Depending on the id you have, one thing or another is executed
//type 2 for any of the options except for reactome
    if (id=="molecular") {
type=2;
dataset="0003674";
enviar(dataset,type,pathway);
    }else if (id=="biological") {
       type=2; 
       dataset="0008150";
       enviar(dataset,type,pathway);
    }else if (id=="celullar") {
        type=2;
        dataset="0005575";
        enviar(dataset,type,pathway);
    }else if (id=="reactome"){
//A first connection is made with reactome to obtain the token and be able to obtain all the pertinent data later
        var reactomeURI = 'https://reactome.org/AnalysisService/identifiers/projection/\?pageSize\=1\&page\=1';
        var dupnew =  datosup.join("\n")
				var dataUrl = '#EntrezGene\n'+dupnew;
				$.ajax({
					type: "post",
					url: reactomeURI,
					data: dataUrl,
					headers: {
						"Content-Type": "text/plain"
					},
					dataType: "json",
				success:function(response){
				pathway=(response.pathwaysFound);
	            dataset=response.summary.token;
//The second connection is made with reactome in type 3 obtaining the up genes
	             $.post('<?php echo get_stylesheet_directory_uri();?>/geneset/python.php', {idup:datosup,iddn:datosdn,type:3,dataset:dataset,pathway:pathway}).done(function(data){
	             });
				}
				});
			
        var ddnnew =  datosdn.join("\n")
				var dataUrl2 = '#EntrezGene\n'+ddnnew;
				$.ajax({
					type: "post",
					url: reactomeURI,
					data: dataUrl2,
					headers: {
						"Content-Type": "text/plain"
					},
					dataType: "json",
				success:function(response){
//Type 4 is executed to obtain the dn genes
				pathway=(response.pathwaysFound);
	            dataset=response.summary.token;
	            type=4;
	            
	            enviar(dataset,type,pathway);
				}
				});
    }
    }
});


// Send function is passed the dataset that has the database, the type that has to execute the script
// and the pathway that only works for the reactome option
function enviar(dataset,type,pathway){
         $.post('<?php echo get_stylesheet_directory_uri();?>/geneset/python.php', {idup:datosup,iddn:datosdn,type:type,dataset:dataset,pathway:pathway,database:id}).done(function(data){
//after obtaining the data, a form is executed that leads us to a page with the new information
                var url = 'http://imdeafoodcompubio.com/index.php/enrichment_geneset/' ;
                var form = $('<form action="' + url + '" method="post" target="_blank">' +
                '<input type="text" name="text"/>' +
                '</form>');
                form.hide();
        $('body').append(form);
        form.submit(); 
               $("#gifbt").hide();
                    });
        
    }
    




//Funcion para parsear la informacion para que el usuario pueda descargarla
//Se realiza un split de la informacion del array se almacena en una matriz
function fundatadescarga (){
    
            for( var i = 0; i<datasecure2.length; i++){
            var d2=datasecure2[i].split('\t'); 
            datadescarga[i]=[];
                for (let j = 0; j < d2.length; j++) {
                    
                    
                    datadescarga[i][j]=d2[j];
                    
                
        }
            }
                    for( var i = 0; i<datasecure3.length; i++){
            var d2=datasecure3[i].split('\t'); 
             datadescarga2[i]=[];
                for (let j = 0; j < d2.length; j++) {
                    
                    datadescarga2[i][j]=d2[j];
                }
        }

}

//Eventos descarga
//--->
$(document).on('click', '.descarga', function() {
    //Get the page where you are and what type of download it is
           var descargaid= $(this).attr("id");
           var subid = descargaid.substr(8);
           var datapage= pagesession2*nregis2;
            var data10= datanew2.slice(datapage,datapage+nregis2);
            //Copy with the obtained data, with this it is added to an input and the copy command is executed later the input is deleted
            // With this is on the clipboard
            if (subid == "copy" ) {
                    $('<input id="textcopy">').val(data10).appendTo('body').select();         
            document.execCommand('copy'); 
            var el = document.getElementById('textcopy');
            el.remove();
            }
            else {
                            //TSV OR CSV the file is sent to descargararchivo.php and the associative array is sent
                $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/descargararchivo.php',
            type: 'post',
            data: {key:subid,data:datadescarga,name:"tablegenups",arrkeys:arraynom2},
            dataType: 'json',
            success:function(response){
                //Get the name of the file which is on the response and create an element <a> and add the attribute
                //'download'  and indicate where the file is located and order the element to be clicked
                //and start the download
                fileName=response;
                       fileUrl="http://imdeafoodcompubio.com/wp-content/uploads/2022/desc/"+fileName;
  var a = document.createElement("a");
  a.href = fileUrl;
  console.log(fileUrl);
  a.setAttribute("download", fileName);
  a.click();
            }, error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    }  
                });
            }
            });

$(document).on('click', '.descarga2', function() {
           var descargaid= $(this).attr("id");
           var subid = descargaid.substr(8);
           var datapage= pagesession3*nregis3;
            var data10= datanew3.slice(datapage,datapage+nregis3);
            if (subid == "copy" ) {
                    $('<input id="textcopy">').val(data10).appendTo('body').select();         
            document.execCommand('copy'); 
            var el = document.getElementById('textcopy');
            el.remove();
            }
            else {
                $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/descargararchivo.php',
            type: 'post',
            data: {key:subid,data:datadescarga2,name:"tablegenedn",arrkeys:arraynom2},
            dataType: 'json',
            success:function(response){
                
                fileName=response;
                       fileUrl="http://imdeafoodcompubio.com/wp-content/uploads/2022/desc/"+fileName;
  var a = document.createElement("a");
  a.href = fileUrl;
  console.log(fileUrl);
  a.setAttribute("download", fileName);
  a.click();
            }, error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    }  
                });
            }
            });

//<---



    });

 </script>

</body>
</html>