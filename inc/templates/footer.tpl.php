</main>
<aside class="col-lg-3">
    <!-- Champ de recherche: https://getbootstrap.com/docs/5.0/components/input-group/ -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Rechercher un article..." aria-label="Rechercher un article..." aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Allez</button>
        </div>
    </div>

    <!-- Catégories: https://getbootstrap.com/docs/5.0/components/card/#list-groups-->
    <div class="card">
        <h3 class="card-header">Catégories</h3>
        <ul class="list-group list-group-flush">
            <?php
            foreach ($dataCategoriesList as $id_category => $object_category) :
            ?>
                <li class="list-group-item">
                    <a href="index.php?page=category&id=<?= $id_category ?>">
                        <?= $object_category->name ?>
                    </a>
                </li>
            <?php
            endforeach;
            ?>
        </ul>
    </div>

    <!-- Auteurs: https://getbootstrap.com/docs/5.0/components/card/#list-groups -->
    <div class="card">
        <h3 class="card-header">Auteurs</h3>
        <ul class="list-group list-group-flush">
            <?php
            foreach ($dataAuthorsList as $id_author => $object_author) :
            ?>
                <li class="list-group-item">
                    <a href="index.php?page=author&id=<?= $id_author ?>">
                        <?= $object_author->name ?>
                    </a>
                </li>
            <?php
            endforeach;
            ?>
        </ul>
    </div>

</aside>
</div><!-- /.row -->


<footer>

    <!-- Je crée une nouvelle ligne dans ma grille virtuelle: https://getbootstrap.com/docs/5.0/layout/grid/
            Je déclare également que ces elements doivent être centré (flex): https://getbootstrap.com/docs/5.0/utilities/flex/#justify-content
            ainsi que leur textes: https://getbootstrap.com/docs/5.0/utilities/text/#text-alignment -->
    <div class="row justify-content-center text-center">
        <div class="col-6 social-networks">
            <!-- Je créé une liste: https://getbootstrap.com/docs/5.0/components/list-group/ -->
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#"><i class="fs-2 bi bi-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fs-2 bi bi-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fs-2 bi bi-linkedin"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fs-2 bi bi-share"></i></a></li>
            </ul>
        </div>
    </div>

    <!-- Je crée une nouvelle ligne dans ma grille virtuelle: https://getbootstrap.com/docs/5.0/layout/grid/
            Je déclare également que ces elements doivent être centré (flex): https://getbootstrap.com/docs/5.0/utilities/flex/#justify-content
            ainsi que leur textes: https://getbootstrap.com/docs/5.0/utilities/text/#text-alignment -->
    <div class="row justify-content-center text-center">
        <div class="col-9 links">
            <!-- Je créé une liste: https://getbootstrap.com/docs/5.0/components/list-group/ -->
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Nous contacter</a></li>
                <li class="list-inline-item"><a href="#">Qui sommes nous ?</a></li>
                <li class="list-inline-item"><a href="#">Mentions légales</a></li>
            </ul>
        </div>
    </div>

</footer>

</div> <!-- /.container -->
<!-- Optional JavaScript -->
<!-- Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</script>
</body>

</html>