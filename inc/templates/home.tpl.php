<?php foreach ($articlesList as $articleId => $articleObject) : ?>
  <article class="card">
    <div class="card-body">
      <h2 class="card-title"><a href="index.php?page=article&id=<?= $articleId ?>"><?= $articleObject->title ?></a></h2>
      <p class="card-text"><?= $articleObject->content ?></p>
      <p class="infos">
        Posté par <a href="#" class="card-link">
          <?= $articleObject->author ?>
        </a> le <time datetime="<?= $articleObject->date ?>">
          <?= $articleObject->getDateFr() ?></time> dans <a href="#" class="card-link">#<?= $articleObject->category ?></a>
      </p>
    </div>
  </article>
<?php endforeach; ?>


<nav aria-label="Page navigation" class="mb-4">
  <ul class="pagination justify-content-between">
    <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
    <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
  </ul>
</nav>