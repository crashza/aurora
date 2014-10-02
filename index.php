<?php
include 'library-new.php';
$login = new AUTH;
$authenticate = $login->login();
$content = new content();
$menu = $content->menu($authenticate);
$footer = "logged in as $authenticate";

$dropdown = new DB;
$return = $dropdown->drop_models();
$html = '


<!DOCTYPE>
<html>
<head>
        <link rel="stylesheet" type="text/css" href="style.css" />
</head>
        <body>
        <div id=main>
                <div id=heading>
                </div>
                <div id=banner>
                <h1>Grandstream Provisioning Ver1.1</h1>
                </div>
                <div id=page>
                        <div id=menu>
                        '.$menu.'
                        </div>
                        <div id=content>
                                <div id="head-content">
                                        <h2>Config File List</h2>
                                </div>
                                <div id="main-content">
                                                <form action="createconfig.php" method="post">
                                                <select name="chooser">
                                                <!--<option selected value="2"></option>--!>
                                                '.$return.'
                                                </select>
                                                <b>Device Model</b>
                                                <br><input type="submit" value="Submit">
                                                </form>

        
                                </div>
                        </div>
                </div>
                <div id=footer>
                        <p>'.$footer.'</p>
                </div>
        </div>
        </body>
</html>
';
echo $html;
