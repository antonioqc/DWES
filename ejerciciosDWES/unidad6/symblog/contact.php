<?php
require_once "vendor\autoload.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
    <link href="css/screen.css" type="text/css" rel="stylesheet" />
    <link href="css/sidebar.css" type="text/css" rel="stylesheet" />
    <link href="css/blog.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/favicon.ico" />
</head>

<body>
    <section id="wrapper">
        <header id="header">
            <div class="top">
                <nav>
                <ul class="navigation">
                        <li><a href="/ejerciciosDWES/unidad6/symblog/">Home</a></li>
                        <li><a href="/ejerciciosDWES/unidad6/symblog/login">Login</a></li>
                        <li><a href="/ejerciciosDWES/unidad6/symblog/about">About</a></li>
                        <li><a href="/ejerciciosDWES/unidad6/symblog/contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <hgroup>
                <h2><a href="index.php/">symblog</a></h2>
                <h3><a href="index_sb.php/">creating a blog in Symfony2</a></h3>
            </hgroup>
        </header>
        <section class="main-col">
        <h1>Contact symblog</h1>
        <p>Want to contact symblog?</p>
            <form method="post" action="">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name">
            </br></br>
            <label for="email">Email</label>
            <textarea rows="5" cols="40" name="email" id="email"></textarea>
            </br></br>
            <label for="Subject">Subject</label>
            <input type="text" name="subject" id="Subject">
            </br></br>
            <label for="Body">Body</label>
            <input type="text" name="Body" id="Body">
            </br></br>
            <input type="submit" value="Contactar">
        </form>
        </section>
        <aside class="sidebar">
            <section class="section">
                <header>
                    <h3>Tag Cloud</h3>
                </header>
                <p class="tags">
                    <?php
                        foreach ($blogs as $blog) {
                            echo "<span class=\"weight-".$blog["id"]."\">".$blog["tags"]."</span>";
                        }
                    ?>
                </p>
            </section>
            <section class="section">
                <header>
                    <h3>Latest Comments</h3>
                </header>
                <?php
                    foreach ($blogs as $blog) {
                        echo "<article class=\"comment\">
                            <header>
                            <p class=\"small\"><span class=\"highlight\">".$blog["user"]."</span> commented on
                                <a href=\"#\">".$blog["title"]."</a>
                            </p>
                            </header>
                            </article>";
                    }
                ?>
            </section>
        </aside>
        <div id="footer">
            dwes symblog - created by <a href="#">dwes</a>
        </div>
    </section>
</body>

</html>