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
        <title>CompetenceInsertIHM.php</title>
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
            <h1>Ajouter une compétence</h1>
            <img src="../images/Skills.jpg"  alt="Image ajout compétence" />
            <form action='../controls/CompetenceControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idCompetence' class='etiquette'>Id Competence</label>
                        </td>
                        <td>
                            <input type='text' value='100' name='idCompetence' id='idCompetence' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='Competence' class='etiquette'>nom Compétence</label>
                        </td>
                        <td>
                            <input type='text' value='Big Dev' name='Competence' id='Competence' />
                        </td>
                    </tr>

                    
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="CompetenceInsertValidation" />
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

        <footer id="footer">
            <?php
            include 'partials/Footer.php';
            ?>
        </footer>
    </body>
</html>
