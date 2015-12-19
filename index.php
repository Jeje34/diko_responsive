<html>
    <head>
        <meta charset="UTF-8">
        <title>Diko Responsive</title>
    </head>
    
    <body>
        <div class="container">
        
            <?php
                // pour ne pas afficher les warnings
                error_reporting(E_ERROR | E_PARSE);
                header('Content-Type: text/html; charset=utf-8');

                include('functions.php');

                if (isset($_GET['terme'])) {
                    $terme = $_GET['terme'];
                    parseAndDisplay($terme);
                }
                else {
                    include('formulaire.php');
                }
            ?>
        </div>
        
        <!-- inclusion de JQuery et Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js">
    </body>
</html>






