<?php
    // librairie qui permet de parser du HTML
    include('advanced_html_dom.php');
    
    
    function parseAndDisplay($terme) {
        
        $terme = strtolower($terme);
        $url = 'http://www.jeuxdemots.org/rezo-xml.php?gotermsubmit=Chercher&gotermrel=' . $terme . '&output=onlyxml';
        $html = file_get_html($url);
        
        echo '<h1>' . $terme . '</h1>';
        
        // définitions
        echo '<h2>Définitions</h2>';
        echo getDefinitions($html);
        
        // raffinements sémantiques
        $raffSem = getRelations('r_raff_sem', $html);
        displayRelations($raffSem, 'Raffinements sémantiques');
        
        // gloses (termes évoquant les sens possibles)        
        $gloses = getRelations('r_meaning', $html);
        displayRelations($gloses, 'Gloses');
        
        // inhibition
        $inhib = getRelations('r_inhib', $html);
        displayRelations($inhib, 'Inhibition');
                        
        // associations d'idées        
        $associated = getRelations('r_associated', $html);
        displayRelations($associated, 'Associations d\'idées');
        
        // totaki
        $totaki = getRelations('r_aki', $html);
        displayRelations($totaki, 'Totaki');
        
        // wikipedia
        $wikipedia = getRelations('r_wiki', $html);
        displayRelations($wikipedia, 'Wikipedia');
        
        // cooccurrences
        $coocurrences = getRelations('r_coocurrence', $html);
        displayRelations($coocurrences, 'Coocurrences');
        
        // domaines
        $domaines = getRelations('r_domain', $html);
        displayRelations($domaines, 'Thèmes / Domaines');
        
        // domaines de substitutions
        $domainesSubst = getRelations('r_domain_subst', $html);
        displayRelations($domainesSubst, 'Substituts pour ' . $terme . ' comme domaine');
        
        // synonymes
        $synonymes = getRelations('r_syn', $html);
        displayRelations($synonymes, 'Synonymes et quasi-synonymes');

        // contraires
        $contraires = getRelations('r_anto', $html);
        displayRelations($contraires, 'Contraires');
        
        // génériques
        $generiques = getRelations('r_isa', $html);
        displayRelations($generiques, 'Génériques');
        
        // spécifiques
        $specifiques = getRelations('r_hypo', $html);
        displayRelations($specifiques, 'Spécifiques');
        
        // instances
        $instances = getRelations('r_instance', $html);
        displayRelations($instances, 'Instances de ' . $terme);
        
        // parties
        $parties = getRelations('r_has_part', $html);
        displayRelations($parties, 'Parties de ' . $terme);
        
        // fait partie de
        $faitPartieDe = getRelations('r_holo', $html);
        displayRelations($faitPartieDe, $terme . ' fait partie de');
        
        // ensembles
        $ensembles = getRelations('r_item>set', $html);
        displayRelations($ensembles, 'Ensembles ayant ' . $terme . ' pour élément');
        
        // quantificateurs
        $quantificateurs = getRelations('r_quantificateur', $html);
        displayRelations($quantificateurs, 'Quantificateurs pour ' . $terme);
        
        // amplifications
        $amplifications = getRelations('r_magn', $html);
        displayRelations($amplifications, 'Plus intense que ' . $terme);
        
        // inverse amplifications
        $antiamplifications = getRelations('r_antimagn', $html);
        displayRelations($antiamplifications, 'Moins intense que ' . $terme);
        
        // physiquement moins gros
        $moinsGros = getRelations('r_is_bigger_than', $html);
        displayRelations($moinsGros, 'Moins gros que ' . $terme);
        
        // termes étymologiquement apparentés
        $family = getRelations('r_family', $html);
        displayRelations($family, 'Termes étymologiquement apparentés');
        
        // locutions / termes composés
        $locutions = getRelations('r_locution', $html);
        displayRelations($locutions, 'Locutions / termes composés');
        
        // caractéristiques
        $caracteristiques = getRelations('r_carac', $html);
        displayRelations($caracteristiques, 'Caractéristiques de ' . $terme);
        
        // ayant le terme pour caractéristiques
        $antiCarac = getRelations('r_carac-1', $html);
        displayRelations($antiCarac, 'Ayant ' . $terme . ' pour caractéristique');
       
        // couleurs
        $couleurs = getRelations('r_color', $html);
        displayRelations($couleurs, 'Couleurs pour ' . $terme);
        
        // a quoi peut-il s'opposer ou combattre
        $against = getRelations('r_against', $html);
        displayRelations($against, 'A quoi ' . $terme . ' peut-il s\'opposer/combattre?');
                        
        // opposition
        $oppositions = getRelations('r_against-1', $html);
        displayRelations($oppositions, 'Qu\'est ce qui s\'oppose à ' . $terme . '?');
        
        // lieux
        $lieux = getRelations('r_lieu', $html);
        displayRelations($lieux, 'Lieux où peut se trouver ' . $terme);
        
        // que peut-on trouver dans
        $dans = getRelations('r_lieu-1', $html);
        displayRelations($dans, 'Que peut-on trouver dans le lieu ' . $terme . '?');
                        
        // agent
        $agent = getRelations('r_agent-1', $html);
        displayRelations($agent, 'Que peut faire ' . $terme . '?');
        
        // patient
        $patient = getRelations('r_patient-1', $html);
        displayRelations($patient, 'Que peut-on faire à/de ' . $terme . '?');
        
        // instrument
        $instrument = getRelations('r_instr-1', $html);
        displayRelations($instrument, 'Que peut-on faire avec ' . $terme . '?');
        
        // conséquences
        $consequences = getRelations('r_conseq', $html);
        displayRelations($consequences, 'Conséquences associées à ' . $terme);
                        
        // production
        $production = getRelations('r_make', $html);
        displayRelations($production, 'Que peut produire/faire ' . $terme . '?');
        
        // sentiments
        $sentiments = getRelations('r_sentiment', $html);
        displayRelations($sentiments, 'Sentiments/émotions associés à ' . $terme);
        
        // comme sujet
        $sujet = getRelations('r_chunk_sujet', $html);
        displayRelations($sujet, $terme . ' comme sujet');
        
        // comme objet
        $objet = getRelations('r_chunk_objet', $html);
        displayRelations($objet, $terme . ' comme objet');
        
        // comme tête syntaxtique
        $head = getRelations('r_chunk_head', $html);
        displayRelations($head, $terme . ' comme tête syntaxtique');        
    }  
        
    
    // retourne la/les définition(s)
    function getDefinitions($html) {        
        $definition = $html->find('def');
        return $definition->innertext;
    }
    
    
    function getRelations($rel, $html) {
        $tab = array();
        foreach($html->find("rel[poids>0][type=$rel]") as $e) {
            // autorise les doublons pour r_aki, r_wikipedia
            // vire les termes bizarres '_XXX' et ':rXXX pour r_associated
            if (($rel == 'r_aki')
               || ($rel == 'r_wiki')
               || (($rel == 'r_associated') && (substr($e->innertext , 0, 2) != ':r') && (substr($e->innertext , 0, 1) != '_'))
               || (!in_array($e->innertext, $tab) && (substr($e->innertext , 0, 2) != ':r') && (substr($e->innertext , 0, 1) != '_'))) {
                array_push($tab, $e->innertext);
            }
        }
        return $tab;
    }

    
    function displayRelations($tab, $label) {
        $count = count($tab);
        if ($count != 0) {
            echo '<h2>' . $label . ' (' . $count. ')</h2>';
            
            $lastElement = end($tab);
            foreach ($tab as $e) {
                if ($e != $lastElement) {
                    echo "<a href='index.php?terme=" . $e . "'>" . $e . "</a> &bull; ";
                }
                // pas de point de séparation à la fin si c'est le dernier
                else echo "<a href='index.php?terme=" . $e . "'>" . $e . "</a>";
            }
        }
        
    }