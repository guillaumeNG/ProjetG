<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/CompetenceInsertIHM.css">
        <title>CompetenceUpdateIHM.php</title>
    </head>

    <body>
        <header id="header">
            <?php
            include 'partials/Header.php';
            ?>
        </header>

        <nav id="nav">
            <?php
            include 'partials/Nav.php';
            ?>
        </nav>

        <article id="article">
            <h1>Modifier un projet</h1>
             <img src="../images/update.png"  alt="Image création projet" />
            <form action="../controls/MainControl.php" method="POST">
                <select name="listeCompetences">
                    <?php
                    //... boucle sur le tableau stLines et retour $tLines[i]
                    //...qui correspond à une ligne du tableau stockée dans
                    //...une variable $line.
                    for ($i = 0; $i < count($tLines); $i++) {

                        $line = $tLines[$i];
                        ?>
                        <option value="<?php echo $line->getIdCompetence(); ?>"><?php echo $line->getNomCompetence(); ?></option>

                        <?php
                    }
                    ?>
                </select> 

                <input type="hidden" name="action" value="CompetenceUpdateSelection" />
                <button type='submit'>Sélectionner</button>

            </form>
            
            <form action='../controls/MainControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idCompetence' class='etiquette'>Id projet</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $idCompetence; ?>' name='idCompetence' id='idCompetence' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomCompetence' class='etiquette'>Nom projet</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $nomCompetence; ?>' name='nomCompetence' id='nomCompetence' />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="CompetenceUpdateValidation" />
                        </td>
                        <td>
                            <button type='submit'>Modifier</button>
                        </td>
                    </tr>
                </table>
            </form>
            <p>
                <label id='lblMessage'>
                    <?php
                    echo $lsMessage;
                    ?>
                </label>
            </p>

        </article>

        <footer id="footer">
            <?php
            include 'partials/Footer.php';
            ?>
        </footer>
    </body>
</html>
