

<?php $this ->load ->view('admin/template/header.php') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Catégorie <u><?= $catg ->name ?></u></h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <a href="<?= site_url('categorie/edit/'.$catg ->id) ?>" class="card-header bg-warning"> Editer <a/>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span class="font-weight-bold">Nom : </span> <?= $catg ->name ?>
                            </li>
                        </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title">Liste des produits</h3>
                            </div>
                            <div class="col-3 text-right">
                                <a href="<?= site_url('produit/newPdt') ?>" class="btn btn-primary d-none">Nouveau produit</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="<?= site_url('categorie/update/'.$catg ->id) ?>">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" name="nom" value="<?= $catg ->name ?>" class="form-control" autocomplete="off" required>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this ->load ->view('admin/template/footer.php') ?>
