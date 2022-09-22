<?php
//Page for Enrichment
# We get the name of the file and extract its data
session_start();
$a=$_POST['formulario'];
$string="";
$fd = fopen("/home/u992250224/domains/imdeafoodcompubio.com/public_html/wp-content/themes/bento-child/python/".$a, "r");
while ($linea = fgets($fd)) {
    $string =$string.$linea;    
}
fclose ($fd);

$b=explode("\n", $string);
$b=implode(";",$b);
#We obtain data of the type of node and with which the enrichment has been done and then we show them on the screen
$provisional=$_POST['c'];
$d=explode(";",$provisional);

for ($i=0; $i <sizeof($d) ; $i++) {
    $arrayprovisional=explode("--", $d[$i]);
    $prov=$arrayprovisional[0];
    $mos[$prov]=$arrayprovisional[1];
}
$database=$_POST['database'];
$pvalue=$_POST['pvalue'];
echo " <h1 style='text-align: center;' > Database : ".ucfirst($database)."</h1> ";
echo " <h1 style='text-align: center;' > P Value Adjustement : ".ucfirst($pvalue)."</h1> \n"; 

echo " <h4> node id ".$mos['node_id']."</h4> \n";
if($mos['treatment']!=null){
echo " <h4> treatment  ".$mos['treatment']." </h4> \n";
}else {
    echo " <h4>compound  ".$mos['compound']." </h4>\n";
}
if($mos['origin_name']!=null){
echo " <h4>origin_name  ".$mos['origin_name']."</h4>";
}else {
    echo " <h4>cell_line  ".$mos['cell_line']."</h4>";
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
        #pagination1 {
        width: 60%;
            clear:right;
            height:auto;
        }
                #pagination_data   {
            width:100%;
            margin-left: 35%;
        }
</style>
  <script>
    </script>
</head>
<body>
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

                    <th class='contenttd1' id='Compoundcabe'><div class='containertd'> 
                    <div class='containertd1'>Compound </div> 
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
                    <th class='contenttd1' id='Pos'><div class='containertd'> 
                    <div class='containertd1'>Pos </div> 
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
                    <th class='contenttd1' id='Neg'><div class='containertd'> 
                    <div class='containertd1'>Neg </div> 
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
                </thead>
               <tbody id="content">     
                </tbody>
            </table>
        </div>
        
<div  id="pagination_data"></div> 


<div id="paginaactual"></div>


<script>
jQuery(document).ready(function($) {
    //Definicion de variables y obtencion de datos del array php 
    var longi;
    var x ='<?php session_start();echo $SESSION_["a"]; ?>';
    var nregis = 20;
    var verdad=true;
    var dataparsear=[];
    var arraynom = ["Compoundcabe","Pos","Neg"];
  var datanew=[];
  var pagesession ;
  var data="<?php echo $b; ?>";
  console.log(data);
parseardata(data);
datanew=data;
datanew=datanew.filter(Boolean);
pagination();
selectregis();
// Page change event, when a button with number, back or next is pressed
//This event is executed which checks what has been clicked and changes the page.
  $(document).on('click', '.pagination_link', function() { 
        page = $(this).attr("id");
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
// Function pagination  where the page change buttons are created, their maximum length is conditioned by the number of records
//displayed at the same time on the same page
function pagination(){
    pagesession=0;
    $("#pagination_data").empty();
    var len =  datanew.length;
    var longi=Math.ceil(len/nregis);
 if (longi!=1) {
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page0>1</button>");
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Back>Back</button>");            
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Next>Next</button>"); 
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page"+(longi-1)+">"+longi+"</button>");                     
           }
            $("#Back").hide();
           load_data(pagesession);
}
//Function parseardata function which converts the string passed from php to an array
function parseardata(p){
p=p.split(";");
p.shift();
data=p;
}
// Function selectregis  where the select is created that is responsible for displaying x rows of the array
function selectregis(){
          $("#select-nregis").empty();
        var size = datanew.length;
        if (size <= 10 ) {
            document.getElementById("registros1").style.visibility = "hidden";
        }else {
            document.getElementById("registros1").style.visibility = "visible";
            $("#select-nregis").append("<option value='10'>10</option>");
            $("#select-nregis").append("<option value='20'>20</option>");
            for (let i = 25; i < size && i <= 150; i+= 25) {
                $("#select-nregis").append("<option value='"+i+"'>"+i+"</option>");
            }
        }
    }
//Function load_data is used to load the information to the tables shown on the page a is equal to the current page
function load_data(a){
//The div of the table is emptied and depending on the page various buttons are shown
        //If it is 0 next and page max if it is page max back and page 0 and in the others all
        //And set the text of actual page with one more number for be 1 when the position in the array is 1 
    $("#paginaactual").text(pagesession+1);
    $("#content").empty();   
    if (a!=0) {
        $("#Back").show();
    }else {
        $("#Back").hide();
    }
    if (a==Math.ceil((datanew.length/nregis)-1)) {
        $("#Next").hide();
    }else {
        $("#Next").show();
    }
    // T works as a variable to verify that there is information to display in the tables
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
        for( var i = a; i<t; i++){
            $("#content").append("<tr class='tablacontenido' id=content1"+i+"></tr>");
            data2=datanew[i].split("\t");
            dataparsear[i]=[];
            for (let j = 0; j< data2.length; j++) {
                if (verdad==true) {
                    
                    dataparsear[i][j]=data2[j];
                }
                $("#content1"+i).append("<td>"+data2[j]+"</td>");      
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
verdad=false;
}




//Change number of samples
  $("#select-nregis").on("change", function(){
    var select = $("#select-nregis");
  nregis=select.val();
  pagination();
            });
 

        $(document).on('keyup', '#tablabusqueda1', function() {
            datanew=[];
    var key = $(this).val();
    for (let i = 0; i < data.length; i++) {
    if (data[i].includes(key)==true) {
        datanew.push(data[i]);
    }
}
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

    //Sort Strings
if (idcabezera==arraynom[0]) {
    
     datanew.sort(function(a, b) {
        data3=a.split("\t");
        data4=b.split("\t");
        return data3[0].localeCompare(data4[0]);
}); 
if (imgorden=="up") {
    datanew=datanew.reverse();
}
} 
    //Sort numbers pulling away the second part
else if (idcabezera==arraynom[1]) {
     datanew.sort(function(a, b) {
        data3=a.split("\t");
        data4=b.split("\t");
       return data3[1] - (data4[1]);
}); 
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
    //Sort Numbers pulling away the second part
else if (idcabezera==arraynom[2]) {
    datanew.sort(function(a, b) {
        data3=a.split("\t");
        data4=b.split("\t");
       return data3[2] - (data4[2]);
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
//Get the page where you are and what type of download it is

           var descargaid= $(this).attr("id");
           var subid = descargaid.substr(8);
           var datapage= pagesession*nregis;
            var data10= datanew.slice(datapage,datapage+nregis);
            //Copy with the obtained data, with this it is added to an input and the copy command is executed later the input is deleted
            // With this is on the clipboards
            if (subid == "copy" ) {
                    $('<input id="textcopy">').val(data10).appendTo('body').select();         
            document.execCommand('copy'); 
            var el = document.getElementById('textcopy');
            el.remove();
            }
                        //TSV OR CSV the file is sent to descargararchivo.php and the associative array is sent
            else {
                $.ajax({
                    //Get the name of the file which is on the response and create an element <a> and add the attribute
                //'download'  and indicate where the file is located and order the element to be clicked
                //and start the download
            url:'<?php echo get_stylesheet_directory_uri(); ?>/downloadfile.php',
            type: 'post',
            data: {key:subid,data:dataparsear,name:"TableEnrichment",arrkeys:arraynom},
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


    });


</script>

</body>           
</html>
