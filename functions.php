<?php
    // librairie qui permet de parser du HTML
    include('advanced_html_dom.php');
    
    /* tableau associatif:
     * cle: le label (qui apparait dans le menu)
     * value: le label sans espace (utilisé comme ancre)
     */
    $tabMenu = array();
    
    function parseAndDisplay($terme) {
        
        $terme = strtolower($terme);
        $url = 'http://www.jeuxdemots.org/rezo-xml.php?gotermsubmit=Chercher&gotermrel=' . $terme . '&output=onlyxml';
        $html = file_get_html($url);
        
        echo '<h1>' . $terme . '</h1><hr>';
        
        // définitions
        
        echo getDefinitions($html);
        
        displayRelations(getRelations('r_raff_sem', $html), 'Raffinements sémantiques');
        displayRelations(getRelations('r_meaning', $html), 'Gloses');
        displayRelations(getRelations('r_inhib', $html), 'Inhibition');
        displayRelations(getRelations('r_associated', $html), 'Associations d\'idées');
        displayRelations(getRelations('r_aki', $html), 'Totaki');
        displayRelations(getRelations('r_wiki', $html), 'Wikipedia');
        displayRelations(getRelations('r_coocurrence', $html), 'Coocurrences');
        displayRelations(getRelations('r_domain', $html), 'Thèmes / Domaines');
        displayRelations(getRelations('r_domain_subst', $html), 'Substituts pour ' . $terme . ' comme domaine');
        displayRelations(getRelations('r_syn', $html), 'Synonymes');
        displayRelations(getRelations('r_anto', $html), 'Contraires');
        displayRelations(getRelations('r_isa', $html), 'Génériques');
        displayRelations(getRelations('r_hypo', $html), 'Spécifiques');
        displayRelations(getRelations('r_instance', $html), 'Instances de ' . $terme);
        displayRelations(getRelations('r_has_part', $html), 'Parties de ' . $terme);
        displayRelations(getRelations('r_holo', $html), $terme . ' fait partie de');
        displayRelations(getRelations('r_item>set', $html), 'Ensembles ayant ' . $terme . ' pour élément');
        displayRelations(getRelations('r_quantificateur', $html), 'Quantificateurs pour ' . $terme);
        displayRelations(getRelations('r_magn', $html), 'Plus intense que ' . $terme);
        displayRelations(getRelations('r_antimagn', $html), 'Moins intense que ' . $terme);
        displayRelations(getRelations('r_is_bigger_than', $html), 'Moins gros que ' . $terme);
        displayRelations(getRelations('r_family', $html), 'Termes étymologiquement apparentés');
        displayRelations(getRelations('r_locution', $html), 'Locutions / termes composés');
        displayRelations(getRelations('r_carac', $html), 'Caractéristiques de ' . $terme);
        displayRelations(getRelations('r_carac-1', $html), 'Ayant ' . $terme . ' pour caractéristique');
        displayRelations(getRelations('r_color', $html), 'Couleurs pour ' . $terme);
        displayRelations(getRelations('r_against', $html), 'A quoi ' . $terme . ' peut-il s\'opposer/combattre?');
        displayRelations(getRelations('r_against-1', $html), 'Qu\'est ce qui s\'oppose à ' . $terme . '?');
        displayRelations(getRelations('r_lieu', $html), 'Lieux où peut se trouver ' . $terme);
        displayRelations(getRelations('r_lieu-1', $html), 'Que peut-on trouver dans le lieu ' . $terme . '?');
        displayRelations(getRelations('r_agent-1', $html), 'Que peut faire ' . $terme . '?');
        displayRelations(getRelations('r_patient-1', $html), 'Que peut-on faire à/de ' . $terme . '?');
        displayRelations(getRelations('r_instr-1', $html), 'Que peut-on faire avec ' . $terme . '?');
        displayRelations(getRelations('r_conseq', $html), 'Conséquences associées à ' . $terme);
        displayRelations(getRelations('r_make', $html), 'Que peut produire/faire ' . $terme . '?');
        displayRelations(getRelations('r_sentiment', $html), 'Sentiments/émotions associés à ' . $terme);
        displayRelations(getRelations('r_chunk_sujet', $html), $terme . ' comme sujet');
        displayRelations(getRelations('r_chunk_objet', $html), $terme . ' comme objet');
        displayRelations(getRelations('r_chunk_head', $html), $terme . ' comme tête syntaxtique');        
    }  
        
    
    // retourne la/les définition(s)
    function getDefinitions($html) {        
        $definition = $html->find('def')->innertext;
        if (!empty($definition)) {
            echo '<h2>Définitions</h2>';
            return $definition;
        }
    }
    
    
    function getRelations($rel, $html) {
        $tab = array();
        foreach($html->find("rel[poids>0][type=$rel]") as $e) {
            // on supprime les termes bizarres qui commencent par '_' et ':r' pour r_associated
            if ((($rel == 'r_associated') && (substr($e->innertext , 0, 2) != ':r')
                    && (substr($e->innertext , 0, 1) != '_') && (!in_array($e->innertext, $tab)))
               || (!in_array($e->innertext, $tab) && (substr($e->innertext , 0, 2) != ':r') && (substr($e->innertext , 0, 1) != '_'))) {
                array_push($tab, $e->innertext);
            }
        }
        return $tab;
    }

    
    function displayRelations($tab, $label) {
        global $tabMenu;      
        
        $count = count($tab);
        if ($count != 0) {            
            $tabMenu[$label] = str_replace(' ', '', $label); 
            echo '<h2 id="' . $tabMenu[$label] . '">' . '<span class="glyphicon glyphicon-chevron-up"></span>  ' . $label . ' [' . $count. ']</h2>';
            echo '<div class="relations">';
            
            $lastElement = end($tab);
            foreach ($tab as $e) {
                if ($e != $lastElement) {
                    echo "<a href='index.php?terme=" . $e . "'>" . $e . "</a> &bull; ";
                }
                // pas de point de séparation à la fin si c'est le dernier + on ferme le block
                else echo "<a href='index.php?terme=" . $e . "'>" . $e . "</a></div>";
            }
        }        
    }