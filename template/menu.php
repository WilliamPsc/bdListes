<?php
$page = $_SESSION['baseURL'] . $_SERVER['PHP_SELF'];

$currPage = preg_replace("/\/fr\//", "/fr/", $page);

$newPageEn = preg_replace("/\/fr\//", "/en/", $page);

$newPageIt = preg_replace("/\/fr\//", "/it/", $page);
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top ps-4 align-items-bottom">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="navbar-brand">
                <a href="<?php echo $_SESSION['baseURL'] . "/bdListe/asterix.php" ?>" style="color:white">Astérix</a>
            </li>
            <li class="navbar-brand">
                <a href="<?php echo $_SESSION['baseURL'] . "/bdListe/lucky_luke.php" ?>" style="color:white">Lucky Luke</a>
            </li>
            <li class="navbar-brand">
                <a href="<?php echo $_SESSION['baseURL'] . "/bdListe/tuniques_bleues.php" ?>" style="color:white">Les Tuniques Bleues</a>
            </li>
        </ul>
    </div>
</nav>