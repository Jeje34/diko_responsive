<html>
    <head>
        <meta charset="UTF-8">
        <title>Diko Responsive</title>
        
        <!-- inclusion de JQuery et Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        
    </head>
       
    <body>
        <?php include("formulaire.php"); ?>
        
        <div class="container" >
            
            <div class="row">
                
                
                <div id="content" class="col-md-9">
                    <?php
                        // pour ne pas afficher les warnings
                        error_reporting(E_ERROR | E_PARSE);
                        header('Content-Type: text/html; charset=utf-8');
                        include('functions.php');

                        if (isset($_GET['terme'])) {
                            $terme = $_GET['terme'];
                            parseAndDisplay($terme);
                        }               
                    ?>
                </div>
                
                <?php include("menu.php"); ?>
            </div>
            
            <footer>
                <hr>
                Ismail Khaled Belhaine & Jérémy Pastor - Université de Montpellier © <?php echo date("Y"); ?><br/>
                Reseau lexical issus de <a href="http://www.jeuxdemots.org/diko.php">JeuxDeMots - Le Diko</a><br/>
                Site réalisé dans le cadre du cours de Responsive Design de <a href="http://www.lirmm.fr/~lafourcade/">Mathieu Lafourcade</a>
            </footer>
        </div>
        
        <script type="text/javascript" src="script.js"></script>
        <link href="style.css" rel="stylesheet" type="text/css">
    </body>
</html>






