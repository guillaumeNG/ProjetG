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
        
        <title>ProjetInsertIHM.php</title>
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
            <h1>Créer un projet</h1>
            <img src="../images/creerprojet.jpg"  alt="Image création projet" />
            <form action='../controls/MainControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idProjet' class='etiquette'>Id projet</label>
                        </td>
                        <td>
                            <input type='text' value='100' name='idProjet' id='idProjet' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomProjet' class='etiquette'>Nom projet</label>
                        </td>
                        <td>
                            <input type='text' value='Big Data - Redis' name='nomProjet' id='nomProjet' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='dateDebut' class='etiquette'>Date debut</label>
                        </td>
                        <td>
                            <input type='text' value='2018-04-01' name='dateDebut' id='dateDebut' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='description' class='etiquette'>Description</label>
                        </td>
                        <td>
                            <input type='text' value='Intro Big Data Paris Picpus' name='description' id='description' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="ProjetInsertValidation" />
                        </td>
                        <td>
                            <button type='submit'>Ajouter</button>
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
        
        <style>

</style>

        <footer id="footer">
            <?php
            include 'partials/Footer.php';
            ?>
        </footer>
    </body>
</html>
