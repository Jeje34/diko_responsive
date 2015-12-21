<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img id="mini_logo" src="img/mini_logo_diko.png" alt="Logo de Diko" />
                Responsive
            </a>
        </div>
               
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" action="index.php" method="get">
                <div class="form-group" >
                    <!-- on utilise un tableau pour aligner le input et le bouton -->
                    <table>
                        <tr>
                            <td id="tdInput"><input id="terme" name="terme" placeholder="Veuillez saisir un terme" class="form-control input-xs" type="search"></td>
                            <td id="tdButton"><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button></td>    
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</nav>