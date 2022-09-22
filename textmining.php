<?php
session_start();
//Text-Mining Main Page
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>



<style>
    body{
        font-family: Arial, sans-serif;
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
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
        max-height: 100px;
    }
       .search-box input[type="number"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
        max-height: 100px;
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
    .container,#pagination1 ,#headertable  {
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
        .pagination_link{
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
        .containertabla2{
            margin-top: 100px;
        }
        #registros1{
            padding-left:15px;
            width:20%;
        }
        #buscar1{
            width:35%;
            margin-left:60%;
        }
        #htbotones{
            float:right;
            width:100%;
            margin-top:3%;
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
        th, td { min-width: 300px; }
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
@media only screen and (max-width: 1050px){

}
input[type="radio"]{
    height: 20px;
  width: 15px;
}
.site-content{
    height: auto;
}
#table1{
    clear:left;
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
#mynetwork{
height:600px;
width:400px;   

}

</style>
</head>
<body>
<div class="column">
    <div class="search-box">
           <p> Food, food compound or drug </p>
            <input type="text" name="key" id="key" class="key" autocomplete="off">
            <div class="result" id="result"></div>
            <p> Number of Edges </p>
            <input type="number" id="edges" name="edges" value=10 min="1">
</div>
<div id="mynetwork"></div>
</div>

<div id="headertable">
<div id="registros1">
           <p>SHOW ENTRIES</p>
            <select id="select-nregis">
</select>  
</div>
<div id="buscar1">
<p>Free Search</p>
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

<div id="container2">

<div class="ht2" id="htbotones">
<button id="descargacopy" class="descarga" >Copy</button>
<button id="descargacsv" class="descarga" >CSV</button>
<button id="descargatsv" class="descarga" >TSV</button>
</div>
        <table id="tabla2" style="overflow-x:auto;">
        
                <thead>
                </thead>
                <tbody id="conte">     
                </tbody>
            </table>
</div>
<script>
jQuery(document).ready(function($) {
// Define variables and set hide values ​​for css
$("#headertable").hide();
    $("#mynetwork").hide();
    $("#htbotones").hide();
    $("#data").hide();
    var key ="";
    var idmax;
    var datos=[];
    var comprobar=[];
    var datosarray =[];
    var type;
    var keydata;
    var datanew ={};
    var pagesession=0;
    var nregis=5;
    var arraynom = ["num"  ,"food","drug"];

        //Keyup event to fill the div which will show the autocomplete suggestions
    $('.key').on('keyup input', function() {    
                        //We get the value and the id of the input.    
    var key = $(this).val();
    //We check that the value is not null or empty
if(key != ""){
    jQuery.ajax({
            //We make a request to ajax that redirects us to another script where the Mysql query will be executed and will return the first 5 records similar to what is being searched for
        url:'<?php echo get_stylesheet_directory_uri(); ?>/textmining/ajaxsql.php',
        type: 'post',
        data: {search:key, type:1},
        dataType: 'json',
        success:function(response){
            
                         //We get the length of the response and add one by one the response in the div
                var len = response.length;
                $("#result").empty();
                var repetidos = [];
                for( var i = 0; i<len; i++){
                    var name = response[i]['name'];
                    if(repetidos.includes(name) == false ){
                        $("#result").append("<p>"+name+"</p>");
                        repetidos.push(name);
                    }
                }   
        }, error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    }  
    });
        //If the answer is empty, the result is cleaned
}else {
    $(".result").empty();
}
})
//CLICK event on any results
$(document).on("click", ".result p", function(){
    //reset values , get the value of the key and call the function
        $('#result').empty();     
         $('#key').val($(this).text());
         mostrartablas();
        });

//Function mostrartablas 
function mostrartablas(){
    //get the value of the key
     key = $('#key').val();
     keydata=key;
     comprobar=[];
        $("#headertable").show();
    $.ajax({
    url:'<?php echo get_stylesheet_directory_uri(); ?>/textmining/ajaxsql.php',
    type: 'post',
    data: {search:key, type:2},
    dataType: 'json',
    success:function(response){
        //save the value from the response
        datos['a']=response;
datos['b'] = Array.from(response);
        dataparser=response;
// Parse the array checking that there are no duplicates or empty values
        for (let k = 0; k < dataparser.length; k++) {
            var provisional = dataparser[k];
            if (comprobar.includes(provisional['drug'])==false && comprobar.includes(provisional['food'])==false  ) {
            if (provisional['food'].toLowerCase().localeCompare(key.toLowerCase())==0) {
                comprobar.push(provisional['drug']);
            }else if(provisional['drug'].toLowerCase().localeCompare(key.toLowerCase())==0) {
                comprobar.push(provisional['food']);
            } 
                }else {
                    k=k-1;
                            dataparser.splice(k,1);
                }
        }
        datanew=dataparser;
        
        $("#content").empty();
       pagination();
       selectregis();
       $("#mynetwork").show();
       nodo();
    } ,error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    }  
    });
}
// Function pagination  where the page change buttons are created, their maximum length is conditioned by the number of records
//displayed at the same time on the same page

function pagination(){
    pagesession=0;
    $("#pagination_data").empty();
    var len =  datanew.length;
    var longi=Math.ceil(len/nregis);
    idmax= longi-1;
 if (longi!=1) {
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page0>1</button>");
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Back>Back</button>");            
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Next>Next</button>"); 
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page"+(longi-1)+">"+longi+"</button>");                     
           }
            $("#Back").hide();
            $("#actualpage").text(pagesession+1);
           load_data(pagesession);
}
// Function selectregis where the select is created that is responsible for displaying x rows of the array

function selectregis(){
          $("#select-nregis").empty();
        var size = datos['a'].length;
        if (size <= 2 ) {
             document.getElementById("registros1").style.visibility = "hidden";
        }else {
            document.getElementById("registros1").style.visibility = "visible";
            $("#select-nregis").append("<option value='2'>2</option>");
            $("#select-nregis").append("<option value='5' selected='selected'>5</option>");
            for (let i = 10; i < size && i <= 100; i+= 5) {
                $("#select-nregis").append("<option value='"+i+"'>"+i+"</option>");
            }
        }
    }
//Change number of samples

      $("#select-nregis").on("change", function(){
    var select = $("#select-nregis");
  nregis=select.val();
  pagination();
            });
// Page change event, when a button with number, back or next is pressed
//This event is executed which checks what has been clicked and changes the page.

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
        load_data(page);
      }); 

//table click event 
      $(document).on('click', '.tablacontenido', function() { 
        var id = $(this).attr("id");
                //Change the color of the cell
        $(".tablacontenido").css("background-color","white");
        $(this).css("background-color","#CDCDCD");
        var identificador = id.substr(8);
        var idfood = $("#food"+identificador).text();
        var iddrug = $("#drug"+identificador).text();
        var indices=[];
        var idd;
//We get the corresponding id and check if the value sought is in drug or food
        // then we store them in an array
        if (key.toLowerCase().trim()==idfood.toLowerCase().trim()) {
            idd=iddrug;
        }else if(key.toLowerCase().trim()==iddrug.toLowerCase().trim()){
            idd=idfood;
        }
            for (let i = 0; i < datos['b'].length; i++) {
                if (datos['b'][i]['drug'].toLowerCase().trim()==idd.toLowerCase() || datos['b'][i]['food'].toLowerCase().trim()==idd.toLowerCase()) {
                    indices.push(i);
                }
                
            }
           load_data2(indices);
        }); 

//Function load_Data 2 to which an array with the values ​​to display is passed
        function load_data2(indices){
            datosarray=[];
            $("#htbotones").show();
            $("#conte").empty();   
            $("#conte").append("<tr class='cabezeratabla' id='prueba'></tr>");
                    $(".cabezeratabla").append("<th  class='contenttd2' id='food'> food </th>"); 
                    $(".cabezeratabla").append("<th  class='contenttd2' id='drug'> drug </th>");
                    $(".cabezeratabla").append("<th  class='contenttd2' id='document'> text </th>");
                    $(".cabezeratabla").append("<th  class='contenttd2' id='link'> link </th>");

//The values ​​are separated and parsed to show it on the screen, since we will paint
//the drug mentioned in red, the food in blue and then a part of the document will be
//in bold, this part is indicated in the database
//Then everything is put into an array to display
            for (let i = 0; i < indices.length; i++) {
                if (indices[i]!=-3) {
                    datosarray.push(datos['b'][indices[i]]);
                var array = datos['b'][indices[i]];
                var fulltext = (array['document']);
                for (let j = 0; j < indices.length; j++) {
                    if(indices[j]!=-3){
                        console.log(array['text']);
                    if (datos['b'][indices[j]]['text'] == array['text'] ) {
                     sta=datos['b'][indices[j]]['starti'];
                     en =datos['b'][indices[j]]['endi'];
                     documento = fulltext.substr(sta,en);
                     strfood = datos['b'][indices[j]]['food'];
                     strdrug = datos['b'][indices[j]]['drug'];
                     documentostyle = "<strong>"+documento+"</strong>";
                     foodstyle = "<span style='color:blue;font-size:12px'>"+ strfood+"</span>";
                     drugstyle = "<span style='color:red;font-size:12px'>"+ strdrug+"</span>";
                    documentostyle=documentostyle.replace(strfood,foodstyle);
                    documentostyle=documentostyle.replace(strdrug,drugstyle);
                    fulltext=fulltext.replace(documento,documentostyle);
                        indices[j]=-3;
                    }
                    }
                               
                }

                    $("#conte").append("<tr class='tablaclick' id=conte"+i+"></tr>");

                    $("#conte"+i).append("<td > "+array['food']+"</td>");
                    $("#conte"+i).append("<td > "+array['drug']+"</td>");
                    $("#conte"+i).append("<td >"+fulltext+"</td>");
                    $("#conte"+i).append("<td> <a href="+array['link']+" target='_blank'>"+array['link']+"</a></td>");
                
                 elemento = document.getElementById("prueba");
                elemento.scrollIntoView();
            }
        }

}




//Function load_data is used to load the information to the tables shown on the page a is equal to the current page

function load_data(a){

    
//The div of the table is emptied and depending on the page various buttons are shown
        //If it is 0 next and page max if it is page max back and page 0 and in the others all
    
    $("#content").empty();   
    if (a!=0) {
        $("#page0").show();
        $("#Back").show();
    }else {
                $("#page0").hide();
        $("#Back").hide();
    }
    if (a==Math.ceil((datanew.length/nregis)-1)) {
                $("#page"+idmax).hide();
        $("#Next").hide();
    }else {
                $("#page"+idmax).show();
        $("#Next").show();
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
                document.getElementById("registros1").style.visibility = "hidden";
                $("#pagination1").hide();
            }else {
                document.getElementById("registros1").style.visibility = "visible";
                $("#pagination1").show();
                 $("#data").hide();
                 $("#tabla1").show();
        $("#content").append("<tr id=content1></tr>");
        $("#content").append("<tr class=content1></tr>");
            $("#content1").append(" <th class='contenttd1' id='num'><div class='containertd'>  <div class='containertd1'>"+
            " Order </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up0'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw0'>"+
             " </div> </div> </div></th>");

                        $("#content1").append(" <th class='contenttd1' id='food'><div class='containertd'>  <div class='containertd1'>"+
            "Food </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up1'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw1'>"+
             " </div> </div> </div></th>");

                         $("#content1").append(" <th class='contenttd1' id='drug'><div class='containertd'>  <div class='containertd1'>"+
            "Drugs </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up2'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw2'>"+
             " </div> </div> </div></th>");

        for( var i = a; i<t; i++){
            $("#content").append("<tr class='tablacontenido' id=content1"+i+"></tr>");
            $("#content1"+i).append("<td id='contentnum"+i+"'>"+datanew[i]['num']+"</td>");
            $("#content1"+i).append("<td id='food"+i+"'>"+datanew[i]['food']+"</td>");
            $("#content1"+i).append("<td id='drug"+i+"'>"+datanew[i]['drug']+"</td>");


        }
    }

}
//Search event in a the table 'tablebusqueda'

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


            //Events when clicking on the img of the header, of any of the two tables
//This event executes and obtains the row to later order it in the function
// It happens that if it is ascending or descending and the field of the array
        
  $(document).on('click', '.imgcabezera', function() { 
        var imgid = $(this).attr("id");
        var imgorden = imgid.substr(0,2);
        var imgtipo = arraynom[imgid.substr(2,1)];
        ordenar(imgtipo,imgorden);
    }); 

//Function 'ordenar' where the name of the field of the array is passed and if it is ascending or descending
function ordenar(idcabezera,imgorden){
var lenarray = datanew.length;
//Sort numbers
if (idcabezera==arraynom[0]) {
     datanew.sort(function(a, b) {
        return a[arraynom[0]] - b[arraynom[0]];
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
//Sort String
} else if (idcabezera==arraynom[1]) {
         datanew.sort(function(a, b) {
        return a[arraynom[1]].localeCompare(b[arraynom[1]])
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
//Sort String

} else if (idcabezera==arraynom[2]){
     datanew.sort(function(a, b) {
        return a[arraynom[2]].localeCompare(b[arraynom[2]])
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
pagesession=0;
load_data(0);

}

// Download Event 

$(document).on('click', '.descarga', function() {
        //Get the page where you are and what type of download it iss

           var descargaid= $(this).attr("id");
           var subid = descargaid.substr(8);
           var contador = 0 ;
           var datapage= pagesession*nregis;
           var dataacopiar=[];
            var data10= datosarray.slice(datapage,datapage+nregis);
//Copy with the obtained data, with this it is added to an input and the copy command is executed later the input is deleted
            // With this is on the clipboard
//We remove the fields from the strati num text yendi array so that there is no information //irrelevant for the user
            if (subid == "copy" ) {
                            for (let i = 0; i < data10.length; i++) {
                                dataacopiar[i]=[];
                                contador=0;
            for (var  dato in datosarray[i]){
        if(dato != "starti" && dato != "num" && dato != "text" && dato != "endi"){
    dataacopiar[i][contador]=datosarray[i][dato];
    contador++;
}
}
}
                    $('<input id="textcopy">').val(dataacopiar).appendTo('body').select();         
            document.execCommand('copy'); 
            var el = document.getElementById('textcopy');
            el.remove();
            }
                                    //TSV OR CSV the file is sent to descargararchivo.php and the associative array is sent
            else {
                            for (let i = 0; i < datosarray.length; i++) {
                                dataacopiar[i]={};
            for (var  dato in datosarray[i]){
        if(dato != "starti" && dato != "num" && dato != "text" && dato != "endi"){
            
    dataacopiar[i][dato]=datosarray[i][dato];
}
}
}
                $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/downloadfile.php',
            type: 'post',
            data: {key:subid,data:dataacopiar,name:"tabletextmining"},
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
            }
                });
            }
            });

//Event when changing number of nodes
$(document).on('keyup', '#edges', function() {
    if (datos['a']['0']!=null){
        nodo();
    }
});


function nodo(){    
//The network is started by creating the first node in orange color
    var nodes = new vis.DataSet([
        {id: datos['a'][0]['num'], label: datos['a'][0]['food'] ,  color: "orange"}
    ]);
    //Get the number of edges requested by the user
  var nedges=$("#edges").val();
  var size = datos['a'].length-1;
//if the number of edges is greater than the length of the array, the length will be used as the maximum value of edges
  if (nedges>datos['a'][size]['num']) {
      nedges=datos['a'][size]['num'];
  }
  var cont = 1;
  var edges = new vis.DataSet();
  var xboo=false;
// The node is obtained and it is compared to know if the drug or the food is the key sought to paint it in one color or another
  // After that, the edges will also be made, if the drug has the number 1 and the next one has the number 4, it will be necessary to paint 3 edges for that node
  //With the variable 'xboo' this will be verified 
 for (let i = 1; i < nedges; i++) {
   if ((i+1) == datos['a'][cont]['num']) {
       if(datos['a'][cont]['drug']==keydata){
                   nodes.add([ 
        {id: datos['a'][cont]['num'], label: datos['a'][cont]['food'],color:"orange"},
    ]);
    edges.add([
      {from: 1, to: datos['a'][cont]['num'],color:"rgb(221,160,221)"},
    ]);
       }else{
            nodes.add([ 
        {id: datos['a'][cont]['num'], label: datos['a'][cont]['drug'],color:"rgb(221,160,221)"},
    ]);
    edges.add([
      {from: 1, to: datos['a'][cont]['num'],color:"orange"},
    ]);
       }
      xboo=true;
   }else {
       if(datos['a'][(cont-1)]['drug']==keydata){
          edges.add([
      {from: 1, to: datos['a'][(cont-1)]['num'],color:"rgb(221,160,221)"},
    ]);
           
       }else{ 
 edges.add([
      {from: 1, to: datos['a'][(cont-1)]['num']},
    ])}
   }

    
    
   if(xboo==true){
     cont++;
     xboo=false;
   }
  }

    
    
   if(xboo==true){
     cont++;
     xboo=false;
   }

 // create a network
    var container = document.getElementById('mynetwork');

    // provide the data in the vis format
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {};

    // initialize your network!
    var network = new vis.Network(container, data, options);



  var mynetwork = document.getElementById("mynetwork");
var x = -mynetwork.offsetWidth/2;
var step = 70;
  nodes.add({
    id: 1000000000,
    x: x,
    y: -300,
    shape: "square",
    color:"rgb(221,160,221)",
    label: "DRUG ",
    group: "drug",
    size: 20,
    value: 1,
    fixed: true,
    physics: false,
  });
  nodes.add({
    id: 1000000001,
    x: x,
    y: -300 + step,
     shape: "square",
    color:"orange",
    label: "FOOD",
    group: "food",
     size: 20,
    value: 1,
    fixed: true,
    physics: false,
  });



}







});


 </script>

</body>
</html>
