<?php
// Initialisation à vide du tableau $dataArticlesList
$dataArticlesList = [];

// Initialisation à vide du tableau $dataCategoriesList
$dataCategoriesList = [];

// Initialisation à vide du tableau $dataAuthorsList
$dataAuthorsList = [];

try {
    // Préparation des paramètres de connexion
    $host = 'mysql:host=localhost;dbname=oblog';
    $user = 'blog';
    $pass = 'mdpblog';

    // Connexion à la bdd
    $pdoConnexion = new PDO(
        $host,
        $user,
        $pass,
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
} catch (PDOException $ex) {
    die('Une erreur est survenue lors de la connexion à la bdd: ' . $ex->getMessage());
}

// Remplissage de la liste des articles

// Structure JOIN: 

/* 
    SELECT * 
    FROM tablea JOIN tableb 
    ON tablea.champ = tableb.champ
*/
$sql = "
    SELECT 
        p.id,
        title,
        content,
        a.name AS author_name, 
        published_date,
        c.name AS category_name

    FROM post p
        JOIN author a
            ON p.author_id = a.id
        JOIN category c
            ON p.category_id = c.id
    ";

$pdoStatement = $pdoConnexion->query($sql);

// On récupère le tableau sur lequel on va boucler pour créer notre tableau d'objets
$dataArticlesListTemp = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

/*
d($dataArticlesListTemp);
die;
*/

// On crée notre tableau associatif d'objets qui va correspondre au format précédent dans data.php
foreach ($dataArticlesListTemp as $article) {
    $index_actuel = $article['id'];
    // On peut aussi écrire: 
    //$dataArticlesList[$article['id']]
    $dataArticlesList[$index_actuel] = new Article(
        $article['title'],
        $article['content'],
        $article['author_name'],
        $article['published_date'],
        $article['category_name']
    );
    /*
     Exemple de ce qui est attendu: 
    1 => new Article(
        'Ivre, il refait tous les challenges en un week-end sans dormir.',
        'Ou comment j\'ai appris plein de choses en faisant une nouvelle fois tous les challenges que j\'avais loupé.',
        'Alexandre',
        '2017-07-13',
        'Ma Vie De Dev'
    ),
    */
}


// Remplissage de la liste des catégories
$sql = 'SELECT * FROM category';

$pdoStatement = $pdoConnexion->query($sql);

$dataCategoriesListTemp = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

//$dataCategoriesList
foreach ($dataCategoriesListTemp as $category) {
    $dataCategoriesList[$category['id']] = new Category(
        $category['name']
    );
}

/*
Exemple de ce qui est attendu: 

$dataCategoriesList = [
    1 => new Category('TeamBack')
];
*/
/*

d($dataCategoriesList);
die;
*/


// Remplissage de la liste des auteurs
$sql = 'SELECT * FROM author';

$pdoStatement = $pdoConnexion->query($sql);

$dataAuthorsListTemp = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

foreach ($dataAuthorsListTemp as $author) {
    $dataAuthorsList[$author['id']] = new Author(
        $author['name']
    );
}

/*
d($dataAuthorsList);
die;
*/