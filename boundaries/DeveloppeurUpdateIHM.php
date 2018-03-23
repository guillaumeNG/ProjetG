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
        <link rel="stylesheet" type="text/css" href="../css/DeveloppeurInsertIHM.css">
        <title>DeveloppeurUpdateIHM.php</title>
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
                <select name="listeDeveloppeurs">
                    <?php
                    //... boucle sur le tableau stLines et retour $tLines[i]
                    //...qui correspond à une ligne du tableau stockée dans
                    //...une variable $line.
                    for ($i = 0; $i < count($tLines); $i++) {

                        $line = $tLines[$i];
                        ?>
                        <option value="<?php echo $line->getIdDeveloppeur(); ?>"><?php echo $line->getNomDeveloppeur(); ?></option>

                        <?php
                    }
                    ?>
                </select> 

                <input type="hidden" name="action" value="DeveloppeurUpdateSelection" />
                <button type='submit'>Sélectionner</button>

            </form>
            
            <form action='../controls/MainControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idDeveloppeur' class='etiquette'>Id projet</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $idDeveloppeur; ?>' name='idDeveloppeur' id='idDeveloppeur' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomDeveloppeur' class='etiquette'>Nom projet</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $nomDeveloppeur; ?>' name='nomDeveloppeur' id='nomDeveloppeur' />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="DeveloppeurUpdateValidation" />
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
