<?php
$id = $_GET['ii'];
require_once './paniet.php';
require_once './reserve.php';
require_once './livre.php';

$liste_livre = livre::getlivre();
$liste_reserve = reserve::getreserveByid($id);
$count = paniet::count();
$liste_paniet = paniet::getpaniet();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your keywords">
        <meta name="author" content="Your name">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/superfish.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/tms-0.4.1.js"></script>
        <script src="js/slider.js"></script>
        <style>
            input[type=button]{
                padding:3px;
                border:0px;
                width:120px;
                height: 20px;
                font-size: 20;
                background-color:#a54400;
            }
            input[type=button]:hover{
                background-color:#a9a9a9;
            }
        </style>
    </head>
    <body>
        <div class="main-bg">
            <!-- Header -->
            <header>
                <div class="inner">
                    <h1 class="logo"><a href="index.php"></a></h1>
                    <nav>
                        <ul class="sf-menu">
                            <li class="current"><a href="index_util.php?ii=<?php echo $id; ?>">home</a></li>
                            <li><a href="liste_reserve.php?id=<?php echo $id; ?>">Liste de votre reservation</a></li>
                            <li><a href="index.php">logout</a></li>
                        </ul>
                    </nav>
                    <div class="clear"></div>
                </div>
                <div class="slider-container">
                    <div class="mp-slider">
                        <ul class="items">
                            <li><img src="images/img1.jpg"/><div class="banner mp-ban-1"><span class="row-1">bienvenu</span><span class="row-2">à</span><span class="row-3">bebliotéque</span></div></li>
                            <li><img src="images/img2.jpg"/><div class="banner mp-ban-2"><span class="row-1">smart</span><span class="row-2">bibliotéque</span><span class="row-3">en ligne</span></div></li>
                            <li><img src="images/img3.jpg"/><div class="banner mp-ban-3"><span class="row-1">réservé</span><span class="row-2">votre</span><span class="row-3">livre</span></div></li>
                            <li><img src="images/img4.jpg"/><div class="banner mp-ban-3"><span class="row-1">nous</span><span class="row-2">à votre</span><span class="row-3">service</span></div></li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="mp-prev"></a>
                <a href="#" class="mp-next"></a>
            </header>
            <!-- Content -->
            <section id="content"><div class="ic">More Website Templates @ TemplateMonster.com. July 16, 2012!</div>
                <div class="container_24">
                    <div class="wrapper">
                        <div class="grid_24 content-bg">
                            <div class="wrapper">
                                <div class="grid_16 suffix_1 prefix_1 alpha">
                                    <center>
                                        <article class="indent-bot">
                                            <?php
                                            if ($count >= 2) {
                                                echo '<h3 style="color:yellow"> --> Vous avez reservé 2 livres au maximum <-- </h3></center>';
                                            }
                                            ?>
                                            <h2>*Les livres*</h2>
                                            <div class="wrapper hr-border-1">
                                                <?php
                                                foreach ($liste_livre as $livre) {
                                                    echo '<div class = "grid_4 alpha">';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo 'Id Livre:';
                                                    echo '</dt>';
                                                    echo '<dd>';
                                                    echo $livre['id'];
                                                    echo '</dd>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo 'Nom Livre:';
                                                    echo '</dt>';
                                                    echo '<dd>';
                                                    echo $livre['nom'];
                                                    echo '</dd>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo "Nom D'auteur:";
                                                    echo '</dt>';
                                                    echo '<dd>';
                                                    echo $livre['auteur'];
                                                    echo '</dd>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    if ($count >= 2) {
                                                        echo '<a href="reserve_action.php?id=' . $livre['id'] . '"><input type="hidden" value="Reservé"></a>';
                                                    } else {
                                                        echo '<a href="reserve_action.php?id=' . $livre['id'] . '& ii=' . $id . '"><input type="button" value="Reservé"></a>';
                                                    }
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo '-----------------------';
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '</div>';
                                                }
                                                ?>
                                            </div>
                                        </article>
                                        <br><br>
                                        <article class="banner-box">
                                            <div class="inner">
                                                <h3>Bibliotéque</h3>
                                                <h4>Qu'est ce que c'est site bibliotéque??</h4>
                                                <blockquote class="quote indent-right">
                                                    <strong>Ce site donner la droit à leur utilisateur de reservé les livres en ligne...</strong>
                                                </blockquote>
                                                <div class="alignright indent-right">
                                                    <span class="author">jawher khelil<i>(bibliotéquer)</i></span>
                                                </div>
                                            </div>
                                            <img src="images/banner-box-img.png" alt="" class="banner-box-img">
                                        </article>
                                    </center>
                                </div>
                                <div class="grid_5 suffix_1 omega">
                                    <article>
                                        <h3>Votre livres à reservé <?php echo $count; ?>:</h3>
                                        <article class="indent-bot">
                                            <div class="wrapper hr-border-1">
                                                <?php
                                                $livre1 = 0;
                                                $livre2 = 0;
                                                foreach ($liste_paniet as $pan) {
                                                    echo '<div class = "grid_4 alpha">';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo 'Id: ' . $pan['id'] . '';
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo "Id livre : " . $pan['id_livre'] . "";
                                                    if ($livre1 == 0) {
                                                        $livre1 = $pan['id_livre'];
                                                    } else {
                                                        $livre2 = $pan['id_livre'];
                                                    }
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo '<a href="supprimer_paniet.php?id=' . $pan['id'] . '& ii=' . $id . '"><input type="button" value="Supprimer"></a>';
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '<dl class = "def-list-1">';
                                                    echo '<dt>';
                                                    echo '-----------------------';
                                                    echo '</dt>';
                                                    echo '</dl>';
                                                    echo '</div>';
                                                }
                                                echo '<a href="confirm_reserve.php?id_livre1=' . $livre1 . '&id_livre2=' . $livre2 . '& id_util=' . $id . '"><input type="button" value="Confirmer"</a>';
                                                ?>
                                            </div>
                                        </article>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Footer -->
            <footer>
                <div class="container_24">
                    <div class="wrapper">
                        <div class="grid_24 footer-bg">
                            <div class="hr-border-2"></div>
                            <div class="wrapper">
                                <div class="grid_7 suffix_1 prefix_1 alpha">
                                    <div class="copyright">
                                        &copy; 2017 <strong class="footer-logo">Bibliotéque</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>