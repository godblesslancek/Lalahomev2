<?php require_once ('Controller/routes_header.php');?>
<!DOCTYPE html>
    <html>

        <head>
            <?php
            if (!empty($page_title)) {

                // Dynamic tag
                echo "<title>" . $page_title . "</title>\n";
            }
            ?>
        </head>

        <header>
            <?php require_once ('pages/header.php'); ?>
        </header>

        <body>
            <?php require_once('Controller/routes.php'); ?>
        </body>

        <footer>
            <?php require_once ('pages/footer.php')?>
        </footer>

    </html>