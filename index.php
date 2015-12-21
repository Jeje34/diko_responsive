<html>
    <head>
        <meta charset="UTF-8">
        <title>Diko Responsive</title>
        
        <!-- inclusion de JQuery et Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="bootstrap/js/jquery-1.11.3.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
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
                        } else {
                            include("accueil.php");
                        }
                    ?>
                </div>
                
                <div id="menu" class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <?php
                            foreach(array_keys($tabMenu) as $e) {
                                echo '<li><a href="#' . $tabMenu[$e] . '">' . $e .  '</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            
            <footer>
                <hr>
                Ismail Khaled Belhaine & Jérémy Pastor - Université de Montpellier © <?php echo date("Y"); ?><br/>
                <div id="bottomFooter">
                    Reseau lexical issus de <a href="http://www.jeuxdemots.org/diko.php">JeuxDeMots - Le Diko</a><br/>
                    Site réalisé dans le cadre du cours Responsive Design de <a href="http://www.lirmm.fr/~lafourcade/">Mathieu Lafourcade</a>
                </div>
            </footer>
        </div>
        
        <script type="text/javascript" src="js/script.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </body>
</html>