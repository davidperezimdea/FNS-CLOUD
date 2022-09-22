
<?php
//Main page of foodstudies
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<style>
    body{
        font-family: Arial, sans-serif;
        
    }
    .site-content{
        height: auto;
    }
    .search-py{
        width: 100%;
        margin-top: 100px;
        position: relative;
        float:left;
        clear:left;
    }

.search-box{
    width: 100%;
        position: relative;
        display:inline-block;
        font-size: 14px;
        max-height: 100px;
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
    .container ,#headertable{
        width: 100%;
        margin-top: 50px;
        margin-left: 10px;
            position: relative;
            display: flex;
            clear:right;
        }
        .peque{
            width: 100px;
        }
            #table2{

            overflow: scroll;
            width: 100%;
            }
    .column {
        float: left;
        width: 35%;
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
        #pagination_data {
            width:60%;
            margin-left: 45%;
        }

    .pagination_link{
        margin:10px;
        }
       #actualpage{
         font-size:18px;

            float:right;
        }


.imgcabezera{
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


</style>

</script>
</head>
<body>

<div class= "row">

<div class="search-box">

<div>
            Compound
            <input type="text" name="key" id="key" class="key" autocomplete="off">
            <div class="result" id="result"></div>
            <br>
            Sample Origin
            <input type="text" name="origen" id="origen" class="key" autocomplete="off">
            <div class="result" id="result2"></div>
</div>      
        </div>
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
    </div>

</body>
<script>
    jQuery(document).ready(function($) {
// Define variables and set hide values ​​for css

$("#headertable").hide();
    $("#data").hide();
    $("#numerosearch").hide();
        var orden;
        var idmax;
        var datanew={};
        var nregis2=2;
        var registrotrue=true;
        var pagesession;
        var datos=[];
        var arraynom = ["accession" ,"gpl","title","abstract","study_type"];
        var nregis=5;

    //Keyup event to fill the div which will show the autocomplete suggestions
    $('.key').on('keyup input', function() {    
                        //We get the value and the id of the input.
    
var key = $(this).val();
 orden = $(this).attr("id");
 //We check that the value is not null or empty

if(key != ""){
    jQuery.ajax({
            //We make a request to ajax that redirects us to another script where the Mysql query will be executed and will return the first 5 records similar to what is being searched for
        url:'<?php echo get_stylesheet_directory_uri(); ?>/foodt/ajaxsql.php',
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
        //If the answer is empty, the result is cleaned
}else {
    $(".result").empty();
}
})

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
        load_data(page);
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



//table click event 
$(document).on('click', '.tablacontenido', function() { 
        var id = $(this).attr("id");
        var x = false;
        //Change the color of the cell
        $(".tablacontenido").css("background-color","white");
        $(this).css("background-color","#B0BED9");
        var identificador = id.substr(7,1);
        id = id.substr(8);
        //we get the cell id
//we make two requests and if both are correct we go to another page
        $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/foodt/ajaxsql.php',
            type: 'post',
            data: {search:datos['a'][id]['accession'],type:3},
            dataType: 'json',
            success:function(response){
      if (response==true) {
                    x=true;
                }
            }});
            $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/foodt/ajaxsql.php',
            type: 'post',
            data: {search:datos['a'][id]['accession'],type:4},
            dataType: 'json',
            success:function(response){
                if (response==true) {
                    x=true;
                }
                            if (x==true) {
                                var url = 'http://imdeafoodcompubio.com/index.php/foodresults/' ;
                var form = $('<form action="' + url + '" method="post" target="_blank">' +
                '<input type="text" name="text" value="'+ '<?php echo "a" ?>'+'"/>' +
                '</form>');
                                $('body').append(form);
                form.submit(); 
                form.hide();
               
            }
                }});
});

// Download Event 

$(document).on('click', '.descarga', function() {
    //Get the page where you are and what type of download it iss
           var descargaid= $(this).attr("id");
           var dataacopiar = [];
           var subid = descargaid.substr(8);
           var datapage= pagesession*nregis;
            var data10= datanew.slice(datapage,datapage+nregis);
//Copy with the obtained data, with this it is added to an input and the copy command is executed later the input is deleted
            // With this is on the clipboard
            if (subid == "copy" ) {
                            for (let i = 0; i < data10.length; i++) {
            dataacopiar[i]=[];
            var contador = 0;
            for (var  dato in data10[i]){
    dataacopiar[i][contador]=data10[i][dato];
    contador++;
}
}
                   $('<input id="textcopy">').val(dataacopiar).appendTo('body').select();         
            document.execCommand('copy'); 
            var el = document.getElementById('textcopy');
            el.remove();
            }
                        //TSV OR CSV the file is sent to descargararchivo.php and the associative array is sent
            else {
                $.ajax({
            url:'<?php echo get_stylesheet_directory_uri(); ?>/downloadfile.php',
            type: 'post',
            data: {key:subid,data:datos['a'],name:"tablafoodstudies"},
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


            //Events when clicking on the img of the header, of any of the two tables
//This event executes and obtains the row to later order it in the function
// It happens that if it is ascending or descending and the field of the array
        $(document).on('click', '.imgcabezera', function() { 
        var imgid = $(this).attr("id");
        var imgorden = imgid.substr(0,2);
        var imgtipo = arraynom[imgid.substr(2,1)];
        ordenar(imgtipo,imgorden);
    }); 
//Change number of samples

  $("#select-nregis").on("change", function(){
    var select = $("#select-nregis");
  nregis=select.val();
  pagination();
  
            });

    //Search event in a the table 'tablebusqueda1'
        
$(document).on('keyup', '#tablabusqueda1', function() {
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
selectregis();
pagination();
pagesession=0;
load_data(0);
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
//Sort String
else if (idcabezera==arraynom[3]) {
    datanew.sort(function(a, b) {
        return a[arraynom[3]].localeCompare(b[arraynom[3]]);
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}
//Sort String
else if (idcabezera==arraynom[4]) {
  
    datanew.sort(function(a, b) {
        return a[arraynom[4]].localeCompare(b[arraynom[4]]);
});
if (imgorden=="up") {
    datanew=datanew.reverse();
}
}

pagesession=0;
load_data(0);
}

//Function 'mostrartablas' sends a request to ajax so that it returns the corresponding values
function mostrartablas(){
    var key = $('#key').val();
    $.ajax({
    url:'<?php echo get_stylesheet_directory_uri(); ?>/foodt/ajaxsql.php',
    type: 'post',
    data: {search:key, type:2,search2:""},
    dataType: 'json',
    success:function(response){
        $("#headertable").show();
        datos['a']=response;
        datanew=response;
        $("#content").empty();
        selectregis();
        pagination();
    } ,error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    }  
    });
}
// Function pagination where the page change buttons are created, their maximum length is conditioned by the number of records
//displayed at the same time on the same page
function pagination(){
    pagesession=0;
    $("#pagination_data").empty();
    var len =  datanew.length;
    var longi=Math.ceil(len/nregis);
 if (longi!=1) {
    idmax= "page"+(longi-1);
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page0>1</button>");
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Back>Back </button>");            
            $("#pagination_data").append("<button class='pagination_link' type='button' id=Next>Next </button>"); 
            $("#pagination_data").append("<button class='pagination_link' type='button' id=page"+(longi-1)+">"+longi+"</button>");                     
           }
            $("#Back").hide();
           load_data(pagesession);
}

            
// Function selectregis where the select is created that is responsible for displaying x rows of the array
function selectregis(){
        var size = datanew.length;
        $("#select-nregis").empty();
        if (size <= 2 ) {
            registrotrue=false;
         document.getElementById("registros1").style.visibility = "hidden";
        }else {
        registrotrue=true;
            document.getElementById("registros1").style.visibility = "visible";
            $("#select-nregis").append("<option value='2'>2</option>");
            $("#select-nregis").append("<option  selected='selected' value='5'>5</option>");
            for (let i = 10; i <= size && i < 100; i+= 5) {
                $("#select-nregis").append("<option value='"+i+"'>"+i+"</option>");
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
//Set the number of samples to be displayed, which is calculated by the page number and the number of records
    //If t is greater than the length of the array, it will not be equal to the length of this
    //If t is equal to 0, "Data Not Found" will be displayed
    var t=0;
    if(a>0){
        a=(a*nregis);
        t=a+nregis;
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
                if(registrotrue==true){
                    document.getElementById("registros1").style.visibility = "visible";
                }
                 
                                  document.getElementById("htbotones").style.visibility = "visible";
                $("#pagination1").show();
                 $("#data").hide();
                 $("#tabla1").show();
        $("#content").append("<tr id=content1></tr>");
            $("#content1").append(" <td class='contenttd1' id='accession'><div class='containertd'>  <div class='containertd1'>"+
            " accession </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up0'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw0'>"+
             " </div> </div> </div></td>");
                         $("#content1").append(" <td class='contenttd1' id='gpl'><div class='containertd'>  <div class='containertd1'>"+
            " gpl </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up1'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw1'>"+
             " </div> </div> </div></td>");
                         $("#content1").append(" <td class='contenttd1' id='title'><div class='containertd'>  <div class='containertd1'>"+
            " title </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up2'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw2'>"+
             " </div> </div> </div></td>");
                         $("#content1").append(" <td class='contenttd1' id='abstract'><div class='containertd'>  <div class='containertd1'>"+
            " abstract </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up3'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw3'>"+
             " </div> </div> </div></td>");
                         $("#content1").append(" <td class='contenttd1' id='study_type'><div class='containertd'>  <div class='containertd1'>"+
            " study_type </div> <div class='containertd2'>"+
            "<div class='imgtd'>"+ 
            "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaarriba.png' class='imgcabezera' id='up4'> </div>" +
            "<div class='imgtd'>"+ 
             "<img src='http://imdeafoodcompubio.com/wp-content/uploads/2022/04/flechaabajo.png' class='imgcabezera' id='dw4'>"+
             " </div> </div> </div></td>");

        for( var i = a; i<t; i++){
            $("#content").append("<tr class='tablacontenido' id=content1"+i+"></tr>");
            $("#content1"+i).append("<td> <a href='https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE"+datanew[i]['accession']+"' target='_blank'>"+datos['a'][i]['accession']+"</a></td>");
            $("#content1"+i).append("<td> <a href='https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GPL"+datanew[i]['gpl']+"' target='_blank'>"+datos['a'][i]['gpl']+"</a></td>");
            $("#content1"+i).append("<td>"+datanew[i]['title']+"</td>");
            $("#content1"+i).append("<td>"+datanew[i]['abstract']+"</td>");
            $("#content1"+i).append("<td>"+datanew[i]['study_type']+"</td>");
        }
}
}

    });
</script>
</html>
