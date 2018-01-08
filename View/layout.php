<?php require_once ('Controller/routes_header.php');?>
<!DOCTYPE html>
    <html>

        <head>
            <meta charset="utf-8" />
            <?php
            if (!empty($page_title)) { echo "<title>" . $page_title . "</title>\n";}  ?>
            <link rel="stylesheet" href="View/style.css" />
            <script src="View/Content/js/lalahomejs.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        </head>

        <header>
            <?php require_once ('pages/header.php'); ?>
        </header>

        <body>
            <?php require_once('Controller/routes.php'); ?>
        </body>

        <footer class="footer">
            <?php require_once ('pages/footer.php')?>
        </footer>

    </html>