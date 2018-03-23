

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
        <title>CompetenceDeleteIHM.php</title>
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
            <h1>Supprimer un Competence</h1>
            <img src="../images/suppr.jpg"  alt="Image création projet" />
            <form action='../controls/CompetenceControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idCompetence' class='etiquette'>Id Competence</label>
                        </td>
                        <td>
                            <input type='text' value='100' name='idCompetence' id='idProjet' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomCompetence' class='etiquette'>Nom Competence</label>
                        </td>
                        <td>
                            <input type='text' value='' name='nomCompetence' id='nomProjet' />
                        </td>
                    </tr>
                   
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="CompetenceDeleteValidation" />
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



