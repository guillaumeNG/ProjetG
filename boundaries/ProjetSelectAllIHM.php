<!DOCTYPE html>
<!--
ProjetSelectAllIHM.php
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/ProjetInsertIHM.css">
        <title>ProjetSelectAllIHM</title>
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
            <img src="../images/selectall.jpg"  alt="Image création projet" />
            <h1>Projets</h1>
            <table>
                <thead>
                    <tr>
                        <th class='borde'>ID</th>
                        <th class='borde'>Nom</th>
                        <th class='borde'>Description</th>
                        <th class='borde'>Date de début</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $lsContenu;
                    ?>
                </tbody>
            </table>
        </article>
        <footer id="footer">
            <?php
            include 'partials/Footer.php';
            ?>
        </footer>
    </body>
</html>
