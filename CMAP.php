
<!-- CMAP Main Page

Page in charge of the CMAP

-->
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
        background-color:#DFDEDE;
    }
    .result{
        z-index: 999;
        top: 100%;
        left: 0;
        overflow: auto;
        opacity: 1;
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
    .container, #pagination1,#headertable,#mynetwork {
        width: 60%;
            position: relative;
            display: flex;
            float: right;
            clear:right;
            overflow-x: auto;
            height:auto;
        }
        #pagination1 {
        width: 60%;
            clear:right;
            height:auto;
        }
 #pagination_data2  {
            width:60%;
            margin-left: 35%;
        }
        #pagination_data   {
            width:100%;
            margin-left: 35%;
        }
        .pagination_link,.pagination_link1{
        margin:10px;
        }
        #actualpage , #actualpage2{
         font-size:18px;
        }
        #actualpage2
        {
            float:right;
        }
        
        #registros1{
            padding-left:15px;
            width:15%;
        }
        #buscar1{
            width:30%;
            margin-left:60%;
        }
        #tablacontainer {
            clear:left;
            float:left;
            width:100%;
        }
        .peque{
            width: 100px;
        }
             #pagination_data2{
                        position: relative;
            display: inline-block;
        }
        .containertabla2{
            position: relative;
            clear:left;
            display: inline-block;
            overflow-x: auto;
        }

         #ht2botones{
            width:15%;
            margin-top:8%;
        }
        #registros2 , #buscar2{
            margin-left:10%;
            margin-top:5%;
            width:30%;
        }
        #registros2 select {
            width:20%;
        }

        #headertable2 {
            margin-top:10%;
            clear:left;
            width: 100%;
            display: flex;
}
.tablacontenido{
    font-size:14px;
}
#tabla2{
    font-size:14px;
}
table {
  border-collapse: collapse;
}

th, td {
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

input[type="radio"]{
    height: 20px;  
  width: 15px;
}
.site-content{
    height: auto;
}
.imgcabezera{
    height:7px;
    width:7px;
}
.containertd{
    display:flex;
}
.containertd1{
    width:65%;
    margin-top:10%;
}
.containertd2{
    float:right;
    margin: 12%;
    width:10%;
}
.imgtd{
height: 49%;
margin: 1% 1%;
}
.imgtd2{
height: 49%;
margin: 1% 1%;
}
.imgcabezera2{
    height:7px;
    width:7px;
}
.contenttd1 , .contenttd2{
    font-weight:bold;
    width:100%;
}
.key , select {
  background: url('http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png') no-repeat;
  background-position: 95% 50%;
  background-size: 7px;
}



.options {
  width: auto;
  padding: 0 0 1em 0;
  text-align: center;
  display: flex;
  flex-direction: column;
}

.ticks {
  display: flex;
}

.o_txt {
  flex: 1;
}

.slider {
  width: 95%; 
  margin: auto;
  cursor: grab;
}
span{
  font-size:10px;
}
#comm{
    margin-top:5%;
    background-color:green;
}
#node_id{
    width:100%;
}
#concentration{
    width:115%;
}
#origin_name{
    width:105%;
}
#mynetwork{
height:400px;
width:auto;   
}
#leyenda{
 height:100px;   
 width:50px;
}

    #gifbt {
  position: fixed;
  left: 45%;
  top: 50%;
  width: 10%;
  height: 10%;
  z-index: 9999;

    }
#selectdata h3{
    display:inline;
}
</style>
</head>
<body>
<div class="column">
    <div class="search-box">
    <label for="search-options">Search by: </label>
                <select id="search-options" name="search">
                    <option value="fdrug">Food-drug interactions</option>
                    <option value="fgene">Food-gene interactions</option>
                    <option value="dfood">Drug-food inateractions</option>
                </select>
        <div>
        <label for="search-1" id="search-1">Food/food compound: </label>
            <input type="text" name="key" id="key" class="key" autocomplete="off">
            <div class="result" id="result"></div>
            <label for="search-2" id="search-2">Sample origin: </label>
            <input type="text" name="origen" id="origen" class="key" autocomplete="off">
            <div class="result" id="result2"></div>
        </div>
                            Number of edges to display 
            <input type="number" id="edges" name="edges" value=10
            min="1">
  <div style="position:relative; margin:auto; width:90%">
    <span style="position:absolute; color:white;background-color: #00008b;">
    <span id="myValue"></span>
    </span>
  <h3>Tau cutoff</h3>
  <input class="slider" type="range" id="myRange" min="0" max="100" step="1" list="steplist" value="90" />
  <datalist id="steplist">
     <option>0</option>
     <option>10</option>
     <option>20</option>
     <option>30</option>
     <option>40</option>
     <option>50</option>
     <option>60</option>
     <option>70</option>
     <option>80</option>
     <option>90</option>
     <option>100</option>
  </datalist>
  <div class="ticks">
    <span class="o_txt">0</span>
    <span class="o_txt">10</span>
    <span class="o_txt">20</span>
    <span class="o_txt">30</span>
    <span class="o_txt">40</span>
    <span class="o_txt">50</span>
    <span class="o_txt">60</span>
    <span class="o_txt">70</span>
    <span class="o_txt">80</span>
    <span class="o_txt">90</span>
    <span class="o_txt">100</span>
  </div>
</div>

  <script type="text/javascript" charset="utf-8">
// Used to show and place and indicate what number is the tau. 
//First the value is obtained and then it is aligned with the slider each time the value is changed
var myRange = document.querySelector('#myRange');
var myValue = document.querySelector('#myValue');
var off = myRange.offsetWidth / (parseInt(myRange.max) - parseInt(myRange.min));
var px =  ((myRange.valueAsNumber - parseInt(myRange.min)) * off) - (myValue.offsetParent.offsetWidth / 2);

  myValue.parentElement.style.left = px + 'px';
  myValue.parentElement.style.top = myRange.offsetHeight + 'px';
  myValue.innerHTML = myRange.value;

  myRange.oninput =function(){
    let px = ((myRange.valueAsNumber - parseInt(myRange.min)) * off) - (myValue.offsetWidth / 2);
    myValue.innerHTML = myRange.value;
    myValue.parentElement.style.left = px + 'px';
  };
  </script>

<br>

    <div  class="search-py">
          <div id="selectdata"><h3>Select Database</h3><img id="datahelp" class="help "src="http://imdeafoodcompubio.com/wp-content/uploads/2022/06/icon1.png"   width="15" /> </div>
          <div class="helpresult" id="helpresult"></div>
<select id="selecten">
<option value="drugbank">drugbank</option>
<option value="drugs.com">drugs.com</option>
<option value="CMAP">CMAP</option>
<option value="MESH">MeSH</option>
<option value="Kegg_phytochemicals">Kegg phytochemicals</option>
</select>
<input type="radio" id="none" name="py" value="none" checked>
<span>none</span>
<br>
<input type="radio" id="BH" name="py" value="BH">
<span>BH</span>
<br>
<input type="radio" id="bonferroni" name="py" value="bonferroni">
<span>bonferroni</span>
<br>

<button id="enrichment" class="button" >Run enrichment analysis</button>
<br>
<button id="comm" class="button" >Food compounds in the same community</button>
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
<p>Free Search</p>
<input type="text" name="tablabusqueda" id="tablabusqueda" class="busqueda" autocomplete="off">
</div>
</div>

           <div class="container">	
               <div id="data"><p>Data Not Found</p></div>
            <table id="tablacontainer">
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
      
<br>
<br>


<div id="leyenda"></div>
<div id="mynetwork"></div>


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
</select> 
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
<div id="data3"><p>Data Not Found</p></div> 
            <table id="tabla3" style="overflow-x:auto;">
                <thead>
                </thead>
                <tbody id="datacont">     
                </tbody>
            </table>
        </div>
        
<img id="gifbt" src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Loading_Key.gif"   width="250" />



<script>

// Define variables and set hide values ​​for css

    $("#headertable").hide();
    $("#gifbt").hide();
    $("#data").hide();
    $("#data2").hide();
    $("#data3").hide();
    $("#headertable2").hide();
    $(".descarga").hide();
    $("#numerosearch").hide();
    var arraynom = ["accession"  ,"node_id","treatment","time_point","concentration", "origin_name"];
    var arraynom2 = ["node_id"  ,"cmap_node_id","tau","compound","cell_line"];
var verdadero=false;
var idloaddata2 =1;
var idmax;
var dataenrichment;
var idmax2;
var longi2;
var nregis=5;
var nregis2=10;
var datanew = {};
var datanew2 = {};
var datos={};
var datos2={};
var type=2;
var botonvalor ="fdrug";
var valortrue=false;
var provisional=1;
var orden="";
var pagesession=0;
var pagecarousel=0;



// JQUERY 
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
        url:'<?php echo get_stylesheet_directory_uri(); ?>/ajaxsql.php',
        type: 'post',
        data: {search:key, type:1,provisional:provisional,orden:orden},
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
}
    //If the answer is empty, the result is cleaned
else {
    $(".result").empty();
}
})




//CLICK event on any of the input options
$(document).on("click", ".result p", function(){
    //Check what input is clicked and call the function
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


//Help events, when the event is activated the text is shown to indicate the instructions and when it ends everything is hidden
$(document).on("mouseenter", ".help", function(){
$("#helpresult").empty();
var idhelp = $(this).attr("id");
if (idhelp=="datahelp") {
            $("#helpresult").append("<p>To change database click  on the drugbank square</p>");
                    
}   
});

$(document).on("mouseleave", ".help", function(){
$("#helpresult").empty();
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
        load_data(pagesession);
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

        $(document).on('click', '.imgcabezera2', function() { 
        var imgid = $(this).attr("id");
        var imgorden = imgid.substr(1,2);
        var imgtipo = arraynom2[imgid.substr(3,1)];
        ordenar2(imgtipo,imgorden);
    }); 

//Parameter change event of the food/gen/drug option select
  $("#search-options").on("change", function(){
        var select = $("#search-options");
  botonvalor=select.val();
        if (botonvalor=="fdrug") {
            provisional=1;
            type=2;
        }else if (botonvalor=="fgene") {
                type=2;
              provisional=2;
        }else if (botonvalor=="dfood") {
              provisional=3;
            type=3;
            }
//Empty all the previous tables and reset the page
        $("#content").empty();
            $("#headertable").hide();
            $("#pagination_data").empty();
                                $("#pagination_data2").empty();
                                $("#actualpage").empty();
                                $("#actualpage2").empty();
                                        $("#conte").empty();
            $("#headertable2").hide();
            $("#data2").hide();
            $("#mynetwork").empty();
            $('#result').empty();     
            $('.key').val('');
            });
 
//Tau value change event
  $(".slider").on("change", function(){
//We get tau value
    var tau2 = $('#myValue').text();
//We send the data of the selected node to make the change when changing the tau if there is no selected node it will not be executed
        $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/ajaxsql.php',
            type: 'post',
            data: {search:dataenrichment, type:5,tau:tau2,a:provisional},
            dataType: 'json',
            success:function(response){
// Reset the parameters of the table
                datos2={};
                $(".descarga").show();
                $("#headertable2").show();
                $("#numerosearch").show();
                datos2=response;
                datanew2=response;
//If there has been a search, it is not reset
                var temporal=$("#tablabusqueda2").val();
                if (temporal!="") {
                    buscar();
                }else {
                selectregis2();
                pagination2();
                }
                nodo();
//The user's view is redirected to where the table is located
                elemento = document.getElementById("prueba");
                elemento.scrollIntoView();
              }});
            });


//Change number of samples
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
 
//table click event 
$(document).on('click', '.tablacontenido', function() { 
// Get the id of the cell
        var id = $(this).attr("id");
        valortrue=true;
//Change the color of the cell
        $(".tablacontenido").css("background-color","white");
        $(this).css("background-color","#B0BED9");
        //Obtenemos el tua
       var tau = $('#myValue').text();
       nregis2=10;
//We get the number of the cell id and get the concrete info of the array       
       var identificador = id.substr(7,1);
        id = id.substr(8);
        idloaddata2=identificador;
        dataenrichment=datanew[id];
//Request to ajax
    $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/ajaxsql.php',
            type: 'post',
            data: {search:datanew[id], type:5,tau:tau,a:provisional},
            dataType: 'json',
            success:function(response){
//Configuration of parameters for the new table
                datos2={};
                $(".descarga").show();
                $("#headertable2").show();
                $("#numerosearch").show();
                datos2=response;
                datanew2=response;
//If the value is not found, the table is hidden and no records are shown
                 if (datanew2[0]['tau'] == undefined){
                                    document.getElementById("ht2botones").style.visibility = "hidden";
                $("#tabla2").hide();
                $("#data2").show();
                }else {
//Search remains
                var temporal=$("#tablabusqueda2").val();
                if (temporal!="") {
                    buscar();
                }else {
                selectregis2();
                pagination2();
                }
                nodo();
//The user's view is redirected to where the table is located
                elemento = document.getElementById("prueba");
                elemento.scrollIntoView();
                
}
              }});
        }); 

// Click event change page
        $(document).on('click', '.pagination_link1', function() { 
//If it is next or back, the button pressed will be removed or added to the pagecarousel, otherwise it will be replaced by the value of page
            //Then for the text a number will be added to show the pages from 1 instead of from 0
        var page = $(this).attr("id");
        if(page=="tNext"){
            page = pagecarousel+1;            
        }else if(page=="tBack"){
            page = pagecarousel-1;   
        }else {
            page = page.substr(5);
            page=parseInt(page);
        }
        pagecarousel=page;
        $("#actualpage2").text(pagecarousel+1);
        load_data2(page);

      }); 



//Table 2 lookup event
      $(document).on('keyup', '#tablabusqueda2', function() {
buscar();
});



//Community button click event
        $(document).on('click', '#comm', function() {
            //if 'valuetrue' is equal to true the data will be taken and by means of a post request they will be sent to the ajaxsql file
            //to which the type and the node_id will be passed, the true value determines if the table search is performed or not
             if (valortrue==true) {
            var nodeid = datanew2[0]['node_id'];
            $.post('<?php echo get_stylesheet_directory_uri();?>/ajaxsql.php', {search:nodeid, type:6}).done(function(data){
                data = JSON.parse(data);
                load_data3(data);
            });
        }
            });




//Click event Enrichment 
        $(document).on('click', '#enrichment', function() {
// First check that the second table has been executed
            // After that, the values for the enrichment ​​are obtained and the data of the node which has been enriched is saved
            if (valortrue==true) {
            $('#retroceder').show();
            $('#avanzar').hide();
            verdadero=true;
       var b = $('input:radio[name=py]:checked').val();
       var c = $("#selecten").val();
       var d=[];
   d=d+"node_id--"+dataenrichment['node_id'];
   if (dataenrichment['compound'] == null) {
       d=d+";treatment--"+dataenrichment['treatment'];
   }else {
      d=d+";compound--"+dataenrichment['compound'];
   }
   if (dataenrichment['cell_line'] == null) {
       d=d+";origin_name--"+dataenrichment['origin_name'];
   }else {
       d=d+";cell_line--"+dataenrichment['cell_line'];
   }
   //Loading image
   $("#gifbt").show();
//A post request is sent to another script when the data is back a form is executed that takes us to the other page after that the loading image is hidden
         $.post('<?php echo get_stylesheet_directory_uri();?>/python/test.php', {a:datos2, b:b , c:c, d:d}).done(function(data){
                var url = 'http://imdeafoodcompubio.com/index.php/enrichment-analysis/' ;
                var form = $('<form action="' + url + '" method="post" target="_blank">' +
                '<input type="text" name="formulario" id="formulario" value="'+data+'"/>' +
                '<input type="text" name="c" id="c" value="'+d+'"/>' +
                '<input type="text" name="pvalue" id="pvalue" value="'+b+'"/>' +
                '<input type="text" name="database" id="database" value="'+c+'"/>' +
                '</form>');
                form.hide();
        $('body').append(form);
        form.submit(); 
         $("#gifbt").hide();
            });
                }
         }); 


//Event change number of nodes
$(document).on('keyup', '#edges', function() {
    if (datos2['0']!=null){
        nodo();
    }
});


// Download Event 
$(document).on('click', '.descarga', function() {

//Get the page where you are and what type of download it is
           var descargaid= $(this).attr("id");
           var subid = descargaid.substr(8);
           var datapage= pagesession*nregis;
            var data10= datos2.slice(datapage,datapage+nregis);
            
            
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
            url:'<?php echo get_stylesheet_directory_uri(); ?>/ downloadfile.php',
            type: 'post',
            data: {key:subid,data:datos2,name:"tableCMAP"},
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



//Function mostrartablas 
function mostrartablas(){
//Get the value of the two inputs
    var key = $('#key').val();
    var key2 = $("#origen").val();
    //Ajax request
    $.ajax({
    url:'<?php echo get_stylesheet_directory_uri(); ?>/ajaxsql.php',
    type: 'post',
    data: {search:key,search2:key2, type:type},
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
} 
//Sort numbers
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
//Sort dates
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




// Function pagination and pagination2 where the page change buttons are created, their maximum length is conditioned by the number of records
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
                pagecarousel=0;
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
                $("#actualpage2").text(pagecarousel+1);
                load_data2(pagecarousel);
            }
// Function selectregis and selectnregis 2 where the select is created that is responsible for displaying x rows of the array
function selectregis(){
          $("#select-nregis").empty();
        var size = datanew.length;
        if (size <= 2 ) {
             $("#registros1").hide();
             $("#actualpage").hide();
        }else {
            $("#registros1").show();
            $("#actualpage").show();
            $("#select-nregis").append("<option value='5'>5</option>");
            for (let i = 10; i < size && i < 100; i+= 5) {
                $("#select-nregis").append("<option value='"+i+"'>"+i+"</option>");
            }
        }
    }
    
          function selectregis2(){
              $("#select-nregis2").empty();
            var size = datanew2.length;
            if (size <= 10 ) {
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

//Function load_data is used to load the information to the tables shown on the page a is equal to the current page
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
    var t=0;
// T works as a variable to verify that there is information to display in the tables
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
                $("#tablacontainer").hide();
                $("#data").show();
            }else {
                 $("#data").hide();
                 $("#tablacontainer").show();

//Depends on the type, a different table is created for each type with different fields and information
    if(datos['type']==2){
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
}else {
            $("#content").append("<tr class=content1></tr>");
            $(".content1").append("<th>Compound</th>");
            $(".content1").append("<th>Drug_Node_id</th>");
            $(".content1").append("<th>Cell_line</th>");
    for( var i = a; i<t; i++){
        $("#content").append("<tr class='tablacontenido' id=content2"+i+"></tr>");
        $("#content2"+i).append("<td>"+datanew[i]['compound']+"</td>");
        $("#content2"+i).append("<td>"+datanew[i]['node_id']+"</td>");
        $("#content2"+i).append("<td>"+datanew[i]['cell_line']+"</td>");
        }

}
            }
}

//Function 'buscar' 
function buscar (){
//The array is reset and the value to be searched for is obtained
    datanew2=[];
    var key = $("#tablabusqueda2").val();
    var blsearchfind= false;
// A search is made in each line of the array and then in each position within each line
        for (let i = 0; i < datos2.length; i++) {
        blsearchfind=false;
        for (let j = 0; j < arraynom2.length && blsearchfind==false; j++) {
            var nombre = arraynom2[j];
            var comprobar  = (datos2[i][nombre]).toString();
//If it exists, it enters the entire line in the array that shows the data and exits the loop to go back to the first
        if (comprobar.includes(key) == true) {
        datanew2.push(datos2[i]);
        blsearchfind=true;
    }
}
    }
selectregis2();
pagination2();
pagecarousel=0;
load_data2(0);
}

//Function 'ordenar' where the name of the field of the array is passed and if it is ascending or descending
function ordenar2(idcabezera,imgorden){
    
    var lenarray = datanew2.length;
    //Sort Numbers
    if (idcabezera==arraynom2[0]) {
         datanew2.sort(function(a, b) {
            return a[arraynom2[0]] - b[arraynom2[0]];
    });
    if (imgorden=="up") {
        datanew2=datanew2.reverse();
    } 
    } 
    //Sort Numbers

    else if (idcabezera==arraynom2[1]) {
         datanew2.sort(function(a, b) {
            return a[arraynom2[1]] - b[arraynom2[1]];
    }); 
    if (imgorden=="up") {
        datanew2=datanew2.reverse();
    }
    }
    //Sort Numbers
    else if (idcabezera==arraynom2[2]) {
        datanew2.sort(function(a, b) {
            return a[arraynom2[2]] - b[arraynom2[2]];
    });
    if (imgorden=="up") {
        datanew2=datanew2.reverse();
    }
    }
        //Sort String
    else if (idcabezera==arraynom2[3]) {
        datanew2.sort(function(a, b) {
            return a[arraynom2[3]].localeCompare(b[arraynom2[3]]);
    });
    if (imgorden=="up") {
        datanew2=datanew2.reverse();
    }
    }
        //Sort String
    else if (idcabezera==arraynom2[4]) {
        datanew2.sort(function(a, b) {
            return a[arraynom2[4]].localeCompare(b[arraynom2[4]]);
    });
    if (imgorden=="up") {
        datanew2=datanew2.reverse();
    }
    }
    load_data2(0);
    }
    
    
    

//Function load_data2 is used to load the information to the tables shown on the page a is equal to the current page
function load_data2(a){
//The div of the table is emptied and depending on the page various buttons are shown
        //If it is 0 next and page max if it is page max back and page 0 and in the others all
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
//T is used to check if there is information
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
//to check that it has information we will check the tau and if it has things will be shown
                if (t==0 || datanew2[0]['tau']== undefined) {
                    document.getElementById("ht2botones").style.visibility = "hidden";
                    $("#tabla2").hide();
                    $("#data2").show();
                }else {
                    document.getElementById("ht2botones").style.visibility = "visible";
                     $("#data2").hide();
                     $("#tabla2").show();
//Depends on the 'idloaddata2' a different table is created for each type with different fields and information
                if(idloaddata2==1){
                        $("#conte").append("<tr class='cabezeratabla' id='prueba'></tr>");
                        $(".cabezeratabla").append(" <td class='contenttd2' id='node_id'> <div class='containertd'><div class='containertd1'>"+
                " Food_node_id </div> <div class='containertd2'>"+
                "<div class='imgtd2'>"+ 
                "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='sup0'> </div>" +
                "<div class='imgtd2'>"+ 
                 "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='sdw0'>"+
                 " </div> </div> </div></td>");
    
                                     $(".cabezeratabla").append(" <td class='contenttd2' id='cmap_node_id'> <div class='containertd'><div class='containertd1'>"+
                " cmap_node_id </div> <div class='containertd2'>"+
                "<div class='imgtd2'>"+ 
                "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='sup1'> </div>" +
                "<div class='imgtd2'>"+ 
                 "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='sdw1'>"+
                 " </div> </div> </div></td>");
                
                                          $(".cabezeratabla").append(" <td class='contenttd2' id='tau'> <div class='containertd'><div class='containertd1'>"+
                " tau </div> <div class='containertd2'>"+
                "<div class='imgtd2'>"+ 
                "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='sup2'> </div>" +
                "<div class='imgtd2'>"+ 
                 "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='sdw2'>"+
                 " </div> </div> </div></td>");
                 
                 
                                          $(".cabezeratabla").append(" <td class='contenttd2' id='compound'> <div class='containertd'><div class='containertd1'>"+
                " compound </div> <div class='containertd2'>"+
                "<div class='imgtd2'>"+ 
                "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='sup3'> </div>" +
                "<div class='imgtd2'>"+ 
                 "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='sdw3'>"+
                 " </div> </div> </div></td>");
                      
                 
                                          $(".cabezeratabla").append(" <td class='contenttd2' id='cell_line'> <div class='containertd'><div class='containertd1'>"+
                " cell_line </div> <div class='containertd2'>"+
                "<div class='imgtd2'>"+ 
                "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera2' id='sup4'> </div>" +
                "<div class='imgtd2'>"+ 
                 "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera2' id='sdw4'>"+
                 " </div> </div> </div></td>");
     
    
                    for (let i = a; i < t; i++) {
                        $("#conte").append("<tr class='tablaclick' id=conte"+i+"></tr>");
                        $("#conte"+i).append("<td > "+datanew2[i]['node_id']+"</td>");
                        $("#conte"+i).append("<td > "+datanew2[i]['cmap_node_id']+"</td>");
                        $("#conte"+i).append("<td >"+datanew2[i]['tau']+"</td>");
                        $("#conte"+i).append("<td>"+datanew2[i]['compound']+"</td>");
                        $("#conte"+i).append("<td >"+datanew2[i]['cell_line']+"</td>");
                    }
                }else{
                        $("#conte").append("<tr class='cabezeratabla' id='prueba'></tr>");
                        $(".cabezeratabla").append("<th> treatment </th>");
                        $(".cabezeratabla").append("<th > concentration </th>"); 
                        $(".cabezeratabla").append("<th > time_point </th>");
                        $(".cabezeratabla").append("<th>origin_name </th>");
                        $(".cabezeratabla").append("<th > cmap_node_id </th>");   
                        $(".cabezeratabla").append("<th>Drug_node_id </th>");
                        $(".cabezeratabla").append("<th > tau </th>");   
    
                    for (let i = a; i < t; i++) {
                        $("#conte").append("<tr class='tablaclick'1 id=conte"+i+"></tr>");
                        $("#conte"+i).append("<td > "+datanew2[i]['treatment']+"</td>");
                        $("#conte"+i).append("<td > "+datanew2[i]['concentration']+"</td>");
                        $("#conte"+i).append("<td >"+datanew2[i]['time_point']+"</td>");
                        $("#conte"+i).append("<td>"+datanew2[i]['origin_name']+"</td>");
                        $("#conte"+i).append("<td >"+datanew2[i]['cmap_node_id']+"</td>");
                        $("#conte"+i).append("<td>"+datanew2[i]['node_id']+"</td>");
                        $("#conte"+i).append("<td >"+datanew2[i]['tau']+"</td>");
                }
            }  
        }
    
    }
//Function load_data 3 the datacomm is passed, which is an array with the information that we are going to show
    function load_data3(datacomm){
//The div of the table is emptied and with the t we verify if the array has results or not
                       // After that, if the t is verify is shown the information on a table 
                       //and the user's view is redirected to where the table is located
    $("#datacont").empty();   
        t=datacomm.length;
            if (t==0) {
                $("#tablacontainer3").hide();
                $("#data3").show();
            }else {
                 $("#data3").hide();
                 $("#tablacontainer3").show();
                                     $("#datacont").append("<tr class='cabezeratabla' id='datacont1'></tr>");
        $("#datacont1").append("<th class=datacont>Accession</th>");
        $("#datacont1").append("<th class=datacont>Treatment</th>");
        $("#datacont1").append("<th class=datacont>Concentration</th>");
        $("#datacont1").append("<th class=datacont>Time Point</th>");
        for( var i = 0; i<t; i++){
            $("#datacont").append("<tr class='tablacontenidodata' id=contenttdata1"+i+"></tr>");
            $("#contenttdata1"+i).append("<td>"+datacomm[i]['accession']+"</td>");
            $("#contenttdata1"+i).append("<td>"+datacomm[i]['treatment']+"</td>");
            $("#contenttdata1"+i).append("<td>"+datacomm[i]['concentration']+"</td>");
            $("#contenttdata1"+i).append("<td>"+datacomm[i]['time_point']+"</td>");
        }
         elemento = document.getElementById("datacont1");
                elemento.scrollIntoView();


            }
}

//Function nodo used to display a graph
function nodo(){    
//The div that contains the network is cleaned
$("#mynetwork").empty();
//The network is started by creating the first node in green color
    var nodes = new vis.DataSet([
        {id: 0 ,color:"green"}
    ]);
//Get the number of edges requested by the user
  var nedges=$("#edges").val();
  if (nedges>datos2.length) {
      nedges=datos2.length;
  }

  var edges = new vis.DataSet();
//Depending on the provisional it shows some data or others
  //Negative tau will be purple and positive tau will be orange
  if(provisional==1){
    for (let i = 0; i < nedges; i++) {
       var nodocompoundcell=datos2[i]['compound']+":"+datos2[i]['cell_line']

     if (datos2[i]['tau']<0) {
            nodes.add([ 
        {id: i+1, label: nodocompoundcell,color:"rgb(221,160,221)"},
    ]);

             edges.add([
      {from: 0, to: i+1,color:"purple"},
    ]);
       }else {
                   nodes.add([ 
        {id: i+1, label: nodocompoundcell,color:"orange"},
    ]);
       
                        edges.add([
      {from: 0, to: i+1,color:"orange"},
    ]);
       }

   
   }
  }else if(provisional==2){
    for (let i = 0; i < nedges; i++) {
       var nodocompoundcell=datos2[i]['compound']+":"+datos2[i]['cell_line']

     if (datos2[i]['tau']<0) {
            nodes.add([ 
        {id: i+1, label: nodocompoundcell,color:"rgb(221,160,221)"},
    ]);

             edges.add([
      {from: 0, to: i+1,color:"purple"},
    ]);
       }else {
                   nodes.add([ 
        {id: i+1, label: nodocompoundcell,color:"orange"},
    ]);
       
                        edges.add([
      {from: 0, to: i+1,color:"orange"},
    ]);
       }

   
   }
  }
  else {
    for (let i = 0; i < nedges; i++) {
       var nodocompoundcell=datos2[i]['treatment']+":"+datos2[i]['concentration']+":"+datos2[i]['time_point']+":"+datos2[i]['origin_name']

     if (datos2[i]['tau']<0) {
            nodes.add([ 
        {id: i+1, label: nodocompoundcell,color:"rgb(221,160,221)",group:"tau-"},
    ]);

             edges.add([
      {from: 0, to: i+1,color:"purple"},
    ]);
       }else {
                   nodes.add([ 
        {id: i+1, label: nodocompoundcell,color:"orange",group: "tau+"},
    ]);
       
                        edges.add([
      {from: 0, to: i+1,color:"orange"},
    ]);
       }

   
   }
  }


var container = document.getElementById("mynetwork");
    // provide the data in the vis format
    var data = {
        nodes: nodes,
        edges: edges
    };
var options = {
     layout: {
                    improvedLayout:false,
                },

}


    // initialize your network!
    var network = new vis.Network(container, data, options);


//Map key
  var mynetwork = document.getElementById("mynetwork");
var x = -mynetwork.offsetWidth/2;
var step = 70;
  nodes.add({
    id: 1000000000,
    x: x,
    y: -200,
    shape: "square",
    color:"rgb(221,160,221)",
    label: "TAU < 0 ",
    group: "tau-",
    value: 1,
    fixed: true,
    physics: false,
  });
  nodes.add({
    id: 1000000001,
    x: x,
    y: -200 + step,
     shape: "square",
    color:"orange",
    label: "TAU > 0 ",
    group: "tau+",
    value: 1,
    fixed: true,
    physics: false,
  });
    
}
});
 </script>


</body>
</html>
