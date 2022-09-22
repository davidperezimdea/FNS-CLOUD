<!-- Help Page

Page that deals with the explanation of the different functionalities and pages of the web, it is built with
the bento-child wordpress html and css theme.

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

    .containercolumn{
        width:50%;
        float:left;
    }
      .containercolumn2{
        width:40%;
        float:left;
        margin-left:5%;
    }
    #ana{
        text-align:center;
    }
    .cont{
        height: auto;
        float:left;
        margin-top:25px;
        border:1px solid green;
    }
    #bcont2{
        margin-left:5%;
    }
    .cont2{
        height: auto;
        float:left;
        margin-top:25px;
        width:40%;
    }

        .boton3{      
            color:white;
            background-color: red;    
  height: 100%;
  text-align: center;
  text-decoration: none;
  font-size: 22px;
        }


#titulo,#tit{
    text-align:center;
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
/*On Hover Color Change*/
    #myBtn:hover {
        background-color: #7dbbf1;
}
</style>

</head>
<body> 
    <div id="contacto">    
    <h3>Contact : enrique.carrillo@imdea.org</h3>
    <h3>Technical Contact : david.perez@imdea.org</h3>
    </div>
    <h1 id="tit">FooDrugs help</h1>
    <h2><a href="#titulo" >1  Researchers</a></h2>
    <h3><a href="#cmap"> 1.1-Food-CMAP</a></h3>
    <h3><a href="#gen"> 1.2-Gene sets</a></h3>
    <h3><a href="#food"> 1.3-Food Transcriptomic studies</a></h3>
    <h2><a href="#clin">2  Clinicians</a></h2>
    <h3><a href="#text">2.1 Text mining</a></h3>
<h1 id="titulo">Researchers</h1>
<div id="container1">
    <div id="cmap">
    <h2>1-Food-CMAP</h2>
    <hr>
    <p>In this section you will have access to the potential FDI found by comparison of food transcriptomic</p>
    <div>
    <h3>1.1 Query</h3>
    <p>Search for food/drugs and their interactions</p>
     <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/cmap1-1.png" width="400" height="400"/>
     <p>There are three query options to choose from:</p>
     <ul>
<li><strong>Food-drug interactions</strong> Search for food/food compounds from GEO and get the interactions with CMAP compounds </li>
<li><strong>Food-gene interactions</strong> Search for food/food compounds from GEO and get the interactions with CMAP gene silencing/overexpression experiments </li>
<li><strong>Drug-food interactions</strong> Search for CMAP compounds and get the interactions with food/food compounds from GEO </li>
     </ul>
     <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/cmap2.png" width="400" height="400"/>
     <p>Aditionally, for each query option you may specify which origin (cell line, tissue...) you want the query to be found in</p>
     <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/cmap5.png" width="500" height="500"/>
     <p>Each food/drug may have been tested in multiple conditions (origin, concentration, time point....) so below the search box you will see a table of all availabe conditions. Click on one to get the interactions for that particular condition</p>
     <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/cmap4.png" width="400" height="400"/>
     <p> <strong>Tau threshold</strong> This parameter controls the strictness criteria for considering an interaction to occur. The higher it is, less but more confident interactions will be found</p>
</div>
<div>
     <h3>1.2 Enrichment analysis</h3>
     <p>Drugs and food compounds have been classified by numerous systems: drugs.com, drugbank, MeSH, cmap, kegg phytochemicals.</p>
     <p>For each selected condition, run a binomial test on all classes for a given classification system to find out if a given food compound interacts positively/negatively more than expected by chance with a given class of drugs.</p>
     <p>Run p value adjustement based on benjamini-hochberg or bonferroni</p>
     <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/06/foodrugsselectdatabase.png" width="400" height="400"/>
     <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/foodr.png" width="400" height="400"/>
</div>
<div>
    <h3>1.3 Community analysis</h3>
    <p>Network communities were found for interactions with a tau threshold of 90. Click on the button to access the communities of the selected condition</p>
    <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/foodr2.png" width="300" height="300"/>
</div>
    </div>
    <div>
        <h2 id="gen" >2-Gene sets</h2>
        <hr>
        <p> In this section you will have access to the top 150 UP and bottom 150 DOWN regulated genes obtained from differential expression analysis of food/food compounds in GEO. The differential expression was carried out with the typical limma + ebayes or voom + limma + ebayes methodology for microarray and RNA-seq data, respectively. These gene sets were sent to the CMAP to determone potential FDI</p>
        
       <div>
        <h3>2.1 Query</h3>
         
         <p>Search for food/food compounds from GEO to get their gene sets</p>
         <p>Each food/food compound may have been tested in multiple conditions (origin, concentration, time point...) so below the search box you will see a table of all availabe conditions. Click on one to get the gene sets for that particular condition</p>
        <p>Aditionally, for each query option you may specify which origin (cell line, tissue...) you want the query to be found in</p>
        <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/06/geneset2.png" width="400" height="400"/>
        <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/06/geneset1.png" width="400" height="400"/>
</div>
<div>
    <h3>2.2 Enrichment analysis</h3>
    <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/06/genesetselectdatabase.png" width="400" height="400"/>
     <p>There exists many APIs for which to run enrichment analysis on gene sets. Available are all three gene ontology APIs, as well as reactome. More to come in the future. Click the button to send both UP and DOWN regulated gene sets to the respective APIs, with default options enabled.</p>
</div>
</div>
    <div>
        <h2 id="food" >3-Food Transcriptomic studies</h2>
        <hr>
        <p>In this section you will hace access to the GEO studies used for food/food compound trancriptomic analysis.</p>
        <p>These studies were searched for using a keyword approach, collected from various food databases. Due to the high number of false positivies, unsupervised keyword extraction was done to manually search for promising candidates.</p>
        <p>Next, metadata had to be manually extracted and normalized.</p>
        <p>Metadata collected includes:</p>
        <ul>
        <li><strong>Study metadata</strong> Title, platform, series number, study type, abstract </li>
         <li><strong>Sample metadata</strong> Accession number, treatment, concentration, time point was extracted for all samples (not found is -). Additional metadata was also extracted for each specific study, not included in the results. </li>
    </ul>
    <div>
        <h3>3.1 Query</h3>
        <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/food1-1.png" width="400" height="400"/>
        <p>Search for food/food compounds from GEO.</p>
        <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/food2-1.png" width="500" height="500"/>
        <p>Each food/food compound may have been tested in multiple studies so the result will include all studies for that food/food compound.</p>
        <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/food3-1.png" width="800" height="800"/>
        <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/food4-1.png" width="800" height="800"/>
        <p>Click on one to get its sample information, as well as the nodes. Nodes are treatment-concentration-time point condtions which were analyzed for differential expression w.r.t to untreated control and sent to CMAP.</p>
        <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/food5-1.png" width="400" height="400"/>
        <p>Aditionally, for each query option you may specify which origin (cell line, tissue...) you want the query to be found in.</p>
</div>
</div>
</div>
<a name="clin" id="clin"></a> 
<div id="container2">
    
    <h1>Clinicians and nutritionists</h1>
    <h2 id="text" >1-Text mining</h2>
    <hr>
    <p>In this section you will have access to the FDI found by text mining on drugs.com, drugbank, medline and openFDA</p>
    <div>
        <h3>1.1 Query</h3>
        <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/mining1.png" width="400" height="400"/> 
        <p>Search for any food, food compound or drug. Below the search box there will be all FDI found for that search term. Click on them to see the original text where it was extracted from, as well as a link to the source. The text mining system is not perfect, so there may be a few false positives</p>
            <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/mining2.png" width="500" height="500"/> 
    </div>
</div>
<button id="myBtn"><a href="#top" style="color: white">Top</a></button>

</body>
</html>
