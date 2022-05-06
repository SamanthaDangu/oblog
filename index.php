<?php

include 'kint.phar';

// index.php est le fichier point d'entrée unique de notre site
// => quelle que soit la page demandée, on passe toujours et
// uniquement par index.php
// Avantage, on factorise une partie du code qui est nécessaire à
// toutes les pages, par exemple l'inclusion de la classe Article
// ou l'inclusion des templates header et footer

// ===========================================================
// Inclusion des fichiers nécessaires
// ===========================================================

require __DIR__ . '/inc/classes/Article.php';
require __DIR__ . '/inc/classes/Author.php';
require __DIR__ . '/inc/classes/Category.php';

// ===========================================================
// Récupération des données nécessaires à toutes les pages
// du site (pour le moment on ne récupère que la page à
// afficher, mais d'autres données viendront se rajouter
// plus tard)
// ===========================================================

// -----------------------------------------------------
// Récupération de la page à afficher
// -----------------------------------------------------

// Par défaut, on considère qu'on affichera la page d'accueil
$pageToDisplay = 'home';
// Mais si un paramètre 'page' est présent dans l'URL, c'est
// qu'on veut afficher une autre page
if (isset($_GET['page']) && $_GET['page'] !== '') {
    $pageToDisplay = $_GET['page'];
}

// ===========================================================
// Chaque page nécessite une préparation différente car elle
// affiche des informations différentes
// ===========================================================


// Récupération du tableau Php contenant la liste
// d'objets Article
require __DIR__ . '/inc/data_from_db.php';

// ------------------
// Page d'Accueil
// ------------------
if ($pageToDisplay === 'home') {
    $articlesList = $dataArticlesList;
} else if ($pageToDisplay === 'article') {
    // ------------------
    // Page Article
    // ------------------

    $articlesList = $dataArticlesList;
    // On souhaite récupérer uniquement les données de l'article
    // à afficher
    $articleId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    // filter_input renvoie null si la paramètre n'existe pas
    // et false si le filtre de validation échoue
    // On s'assure donc de ne pas tomber ni sur false, ni sur null
    if ($articleId !== false && $articleId !== null) {
        $articleToDisplay = $articlesList[$articleId];
    } else {
        // Si l'id n'est pas fourni, on affiche la page d'accueil
        // plutôt que d'avoir un message d'erreur
        $pageToDisplay = 'home';
    }
} else if ($pageToDisplay === 'author') {
    // ------------------
    // Page Auteur
    // ------------------

    // filter_input : $_GET avec vérification
    $authorId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    // Si filter_input ne valide pas la valeur elle sera null ou false

    // Si la valeur est correcte
    if ($authorId !== false && $authorId !== null) {

        // On récupère l'auteur à afficher
        $authorToDisplay = $dataAuthorsList[$authorId];

        // On crée le tableau vide destiné à recevoir les articles de l'auteur sélectionné
        $articlesAuthorList = [];

        // On boucle sur tous les articles 
        foreach ($dataArticlesList as $idArticle => $objectArticle) {
            // Si le nom de l'auteur correspond au nom de l'auteur dans l'article
            if ($authorToDisplay->name == $objectArticle->author) {
                // On ajoute l'objet article au tableau
                $articlesAuthorList[$idArticle] = $objectArticle;
            }
        }
    } else {

        $pageToDisplay = 'home';
    }
} else if ($pageToDisplay === 'category') {
    // ------------------
    // Page Catégorie
    // ------------------
    // http://localhost/s04/S04-E04-atelier-oblog-pauline-oclock/php/index.php?page=category&id=1


    // filter_input : $_GET avec vérification
    $categoryId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($categoryId !== false && $categoryId !== null) {

        $categoryToDisplay = $dataCategoriesList[$categoryId];

        $articlesCategoryList = [];

        // On peut remplacer ça par
        foreach ($dataArticlesList as $idArticle => $objectArticle) {
            if ($categoryToDisplay->name == $objectArticle->category) {
                $articlesCategoryList[$idArticle] = $objectArticle;
            }
        }
    } else {

        $pageToDisplay = 'home';
    }
}

// ===========================================================
// Affichage
// ===========================================================

// Rappel : les variables définies dans index.php, et dans les
// fichiers inclus par index.php (inc/data.php par exemple)
// seront accessibles dans le code des templates inclus
// ci-dessous

require __DIR__ . '/inc/templates/header.tpl.php';
require __DIR__ . '/inc/templates/' . $pageToDisplay . '.tpl.php';
require __DIR__ . '/inc/templates/footer.tpl.php';
