<!-- Front Page

Page that deals with the first view that the user makes when entering the web app

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
    #container2 , #container3{
        display: none;
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
        font-size:250%;
    }
    .cont{
        height: auto;
        float:left;
        margin-top:25px;
    }
    #bcont2{
        width:50%;
        margin-left:5%;
    }
    .cont2{
        height: auto;
        float:left;
        margin-top:25px;
        width:40%;
    }

    #img2{
        width:100%;
        height: auto;
    }
            button{         
  background-color: #4CAF50; 
  color: white;
  height: 100%;
  text-align: center;
  text-decoration: none;
  font-size: 22px;
        }
    #containercont2{
margin-left:12%;

    }
.containercolumn > h3 {
    font-size:200%;
}

    #centrar{
        visibility: hidden;
        float:left;
width:8%;
    }
#imgflech{
    width:50px;
    height:50px,
}


        #ccont2{
        margin-left:5%;
    }

        .cont3{
        height: auto;
        float:left;
        margin-top:25px;
        width:45%;
    }
     #enlacebutton {
  color: #FF0000;
    text-decoration: none;

}
#bot {
    width:20%;
    clear:left;
    float:left;
} 
#bcont3 p , #ccont3 p{
width:75%;
float:right;
}
#botonesdiv .boton2{
    font-size:14px;
    width:30%;
}
p {
    font-size:16px;
}
.divbotones{
float:left;
margin-top:5%;
clear:right;
}
#ccont3{
     margin-top:5%;
    float:left;
    clear:left;
}
#avai{
    color:red;
    margin-top:5%;
    text-align:center;
}
</style>

</head>
<body>
    <img  id="imgflech" src="http://imdeafoodcompubio.com/wp-content/uploads/2022/05/fleizq-e1651737284230.png" width="50" height="50"> 
<div id="container1">
    <h1>Welcome to FooDrugs!</h1>
<h3>FooDrugs is your go-to application for food-drug interaction information. Developed by the IMDEA Food Institue as part of the FNS-Cloud project we aim to 'provide a centralised information portal for food-diet-drug interactions' through the analysis of molecular and textual data.</h3>
    <div id="cont" class="cont">    
        <div class="containercolumn">
        <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/03/FDI_copyright_free.png"/>
        </div>
        <div class="containercolumn">
            <h3>What is a food-drug interaction?</h3>
        <p>A drug interaction occurs when a substance affects the activity of a drug. When a foods, beverage or dietary supplement causes these interactions we say a food-drug ineraction is taking place. These interactions can cause a drugs effect to increase, decrease or can generate a new effect.</p>
        <h3>Why FooDrugs?</h3>
        <p>A problem clinitians and researchers face is that food-drug interaction information is dispersed over many different databases, some of which are incomplete or contain contradicting information.</p>
        <p>We aim to provide a centralized portal for this information, through the analysis of molecular and textual data</p>
        </div>
    </div>
    <div id="centrar"> xxxx </div>
    <div id="cont2" class="cont">
        <h1 id="ana">Analysis</h1>
    <div  class="containercolumn2">
    <h2>Researchers</h2>
    <p>Look for potential food drug interactions as evidenced by gene expression studies</p>
    <button type="button" id="botonres">Analyze</button>
    </div>
    <div  class="containercolumn2" id="containercont2">
    <h2>Clinicians and nutritionists</h2>
    <p>Look for food drug interactions described in the scientific literature and in public databases</p>
    <button type="button" id="buttonanali">Analyze</button>    
</div>
    </div>
</div>

<div id="container2">
    <h1>Researcher space</h1>
        <p>This section is for molecular scientists and similar professions. We have compiled potential positive and negative food drug interactions based on transcriptomic profile similarity, using GEO food/food compound datasets and the connectivity map. The interactions found in this manner can serve as a starting point for future research.</p>
    <div id="bcont" class="cont2" >    
        <div>
        <img id="img2" src="http://imdeafoodcompubio.com/wp-content/uploads/2022/03/cmap_diagram.png" width="300" height="300">
        </div>
        <div>
            </div>
    </div>
    <div id="bcont2" class="cont2">
        <div>
    
        <h2>Molecular signatures approach overview</h2>
        <p>(1) Search GEO for food transcriptomics datasets in human subjects or cell lines.</p>
        <p>(2) For each food/food compound concentration and time point, compare gene expression profiles w.r.t control</p>
        <p>(3) Send top 150 UP and top 150 DOWN regulated genes to query the CMAP</p>
        <p>(4) Build signed bipartite interaction network of food and drugs based on tau cutoff. Default: abs(tau) >= 90.</p>
        <p>(5) Annotate drugs with different annotation systems. For a food condition, run enrichment analysis on positive and negative neighbours.</p>
</div>
 </div>   
  <div id="bcont3" >
<h1 id="avai" >Available analyses</h1>
<div class="divbotones">
        <a href="http://imdeafoodcompubio.com/index.php/food-cmap/" id="bot" id="enlacebutton"><button type="button" class="boton2">FOOD-CMAP</button>  </a>
        <p>Search for food/food-compound - drug/gene interactions based on gene expression profiles from the public repository gene expression omnibus and the connectivity map. Additionally, do enrichment analysis on drug classes, and community visualizations</p>
</div>
<div class="divbotones">
        <a href="http://imdeafoodcompubio.com/index.php/gene_sets/" id="bot" id="enlacebutton"><button type="button" class="boton2">GENE SETS</button>  </a>
        <p>See the top 150 upregulated and bottom 150 downregulated bingspace genes for each food/food compound available. Addiitonally, connect to reactome and gene ontology APIs to do enrichment analysis on those gene sets</p>
</div>
<div class="divbotones">
        <a href="http://imdeafoodcompubio.com/index.php/food_transcriptomic_studies/" id="bot" id="enlacebutton"> <button type="button" class="boton2">FOOD TRANSCRIPTOMIC STUDIES</button>  </a>
        <p>Search for food transcriptomic studies from GEO available in the app. Download its data and sample metadata</p>
</div>
</div>


   
    </div>
</div>

<div id="container3">
    <h1>Clinician and nutritionist space</h1>
    <p>This section is for clinicians and nutritionists and similar professions. See what food drug interactions have been described in the scientific literature and various drug databases.</p>
    <div id="ccont" class="cont3">    
        <div>
        <img src="http://imdeafoodcompubio.com/wp-content/uploads/2022/03/TM.png" id="img2">
        </div>
        
    </div>
    <div id="ccont2" class="cont3">
    
    <h3>Text mining approach overview</h3>
    <p>(1) Search for food-drug information in different databases, using APIs when possible, web scraping when neccessary</p>
<p>(2) NER: Using state of the art machine learning models and traditional dictionary approaches, extract food, food compound and drug names from text</p>
<p>(3) RE: Using state of the art machine learning models, determine, for every food-drug pair in a sentence, if they interact or not</p>
<p>(4) Store results in a structured database.</p>

    </div>
    <div id="ccont3">
<a href="http://imdeafoodcompubio.com/index.php/text-mining/" id="enlacebutton" id="bot" class="botonttext"> <button type="button" class="boton2">Literature FDIs </button>  </a>
<p>Explore food-drug interactions found by text mining scientific and medical databases. Links to where you can find the original texts are available for further consultation. Feedback is appreciated.</p>
</div>
</div>

<script>

jQuery(document).ready(function($) {
    //Click events
    //When one of the buttons/arrow image is pressed the content of the page will be changed showing another one
    $('#imgflech').hide();
    $(document).on('click', '#botonres', function() { 
    $('#container1').hide();
    $('#container2').show();
    $('#imgflech').show();    
});
$(document).on('click', '#buttonanali', function() { 
    $('#container1').hide();
    $('#container3').show();
    $("#boton32").text("Researcher");
    $('#imgflech').show();       
});
$(document).on('click', '#imgflech', function() { 
    $('#container1').show();
    $('#container2').hide();
    $('#container3').hide();
    $('#imgflech').hide();       
});
});
</script>


</body>
</html>
