This github deals with the content of the FNS Cloud website, in this document we can find all the commented code of it.

To replicate the same aspect as the page with the link http://imdeafoodcompubio.com/ we must have wordpress with the bento-child theme and configure the 
menus and the icon with Conditional Menus , in turn we will have to add the things of the footer and the header which are 2 images in the footer along with 
an explanation of the project and a disclaimer, in the header we will only have to add a link to the main icon which in this case is the IMDEA icon.

Due to problems with linking js files, there are common functions that are repeated in the different files that contain the pages.

The web uses jquery 3.5, AJAX, python 2.7, php 7.4, wordpress 6.0.2 and MariaDB 10.5, if you wanted to set up a local server without wordpress you would 
have to remove the get_stylesheet_directory_uri() since it is not native to php.

For the graphics we use vis network https://unpkg.com/vis-network/standalone/umd/vis-network.min.js

Also, if you want to have this page locally, you should know what Internet connection is needed for the gene set function and what is connected to external 
databases.

Explanation of the various pages and related files

Foodrugs is related to front.php which is the page that will be shown to the user when they enter the web

Food-CMAP has as its main page a CMAP.php which talks to ajaxsql.php to get the top responses, and then talks to the test.php and binom_test.py files to do 
the enrichment. When the enrichment is done, the enrichment page is started, which has the enrichment.php file.

GeneSet has geneset.php as its main page, which communicates with geneset/ajaxsql.php to get the main answers, and then communicates with the files
lectura.php and python.php in the geneset folder to do the enrichment and functions of the geneset. own page with an external connection, when the 
enrichment is done if you launch the enrichmentgen.php file from the geneset folder and the page that will show that information is started.

Food Transcriptomic Studies has foodstudies.php as its main page that communicates with foodt/ajaxsql.php , when you want to obtain more information about
a node, the information will be launched in foodt/foodresults.php.

Text-Mining has as its main page text mining.php which communicates with textmining/ajaxsql.php.

Help has as main page help.php.

Download has as main page download.php.

To download the database http://imdeafoodcompubio.com/index.php/download/


