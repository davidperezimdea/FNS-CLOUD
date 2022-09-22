<!-- http://imdeafoodcompubio.com/index.php/download/

Page Download

-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>IMDEA COMPUBIO</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
<style>
    body{
        font-family: Arial, sans-serif;
        
    }
    .site-content{
        height: auto;
    }
</style>

</head>
<body>


<div id="container1">
<table id="tabla1">
                <thead id="cabezera">
                    <th class="cabezera" id="Data">Data</th>
                    <th class="cabezera" id="Uploaded">Uploaded</th>
                    <th class="cabezera" id="Link">Link</th>
                    <th class="cabezera" id="Size">Size</th>
                </thead>
               <tbody id="content">     
                   <tr>
                   <td class="cabezera" id="Data1">FooDrugs MYSQL Dump</td>
                    <td class="cabezera" id="Uploaded1">31 de Enero de 2022 </td>
                    <td class="cabezera" id="Link1"><a id="descargar">Download</a></td>
                    <!-- We get the size of file on MB -->
                    <td class="cabezera" id="Size1"><?php echo round(filesize("/home/u992250224/public_html/wp-content/uploads/2022/desc/FinalFooDrugs_v2.sql")/(1024*1024))?> MB</td>
</tr>



                </tbody>
                
            </table>
            <h1 style="text-align:center;">Cite</h1>
            
            <table id="tabla1">
                <thead id="cabezera">
                    <th class="cabezera" id="Autor">Autor</th>
                    <th class="cabezera" id="Database">Database</th>
                    <th class="cabezera" id="doi">DOI</th>

                </thead>
               <tbody id="content">     
                   <tr>
                   <td class="cabezera" id="Autor">Carrillo de Santa Pau, Enrique, Garranzo, Marco, & Laguna Lobo, Teresa. (2022)</td>
                    <td class="cabezera" id="Database">A database with molecular and text information about food - drug interactions (2.0.0) [Data set]. Zenodo.</td>
                    <td class="cabezera" id="doi"><a href="https://doi.org/10.5281/zenodo.6638470" target="no_blank">https://doi.org/10.5281/zenodo.6638470</a></td>
</tr>



                </tbody>
            </table>
            
</div>

<script>
    //Download event when you click on the do
jQuery(document).ready(function($) {
    $(document).on('click', '#iddownload', function() { 
        fileUrl="http://imdeafoodcompubio.com/wp-content/uploads/2022/desc/FinalFooDrugs_v2.sql";
        fileName="FinalFooDrugs_v2.sql";
  var a = document.createElement("a");
  a.href = fileUrl;
  a.setAttribute("download", fileName);
  a.click();

});

});
</script>
</body>
</html>