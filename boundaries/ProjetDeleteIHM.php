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
        <link rel="stylesheet" type="text/css" href="../css/ProjetInsertIHM.css">
        <title>ProjetDeleteIHM.php</title>
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
            <h1>Supprimer un projet</h1>
            <img src="../images/suppr.jpg"  alt="Image création projet" />
            <form action="../controls/MainControl.php" method="POST">
                <select name="listeProjets">
                    <?php
                    //... boucle sur le tableau stLines et retour $tLines[i]
                    //...qui correspond à une ligne du tableau stockée dans
                    //...une variable $line.
                    for ($i = 0; $i < count($tLines); $i++) {

                        $line = $tLines[$i];
                        ?>
                        <option value="<?php echo $line->getIdProjet(); ?>"><?php echo $line->getNomProjet(); ?></option>

                        <?php
                    }
                    ?>
                </select> 

                <input type="hidden" name="action" value="ProjetDeleteSelection" />
                <button type='submit'>Sélectionner</button>

            </form>
            
            <form action='../controls/MainControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idProjet' class='etiquette'>Id projet</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $idProjet; ?>' name='idProjet' id='idProjet' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomProjet' class='etiquette'>Nom projet</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $nomProjet; ?>' name='nomProjet' id='nomProjet' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='dateDebut' class='etiquette'>Date debut</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $dateDebut; ?>' name='dateDebut' id='dateDebut' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='description' class='etiquette'>Description</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $description; ?>' name='description' id='description' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="ProjetUpdateValidation" />
                        </td>
                        <td>
                            <button type='submit'>Supprimer</button>
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
