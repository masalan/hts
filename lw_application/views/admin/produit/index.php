

<?php $this ->load ->view('admin/template/header.php') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Produits</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title">Liste des produits</h3>
                            </div>
                            <div class="col-3 text-right">
                                <a href="<?= site_url('produit/newPdt') ?>" class="btn btn-primary">Nouveau produit</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($pdts as $pdt) : ?>
                                <tr>
                                    <td><?= $pdt ->id ?></td>
                                    <td>
                                        <img src="<?= latestFile('uploads/thumb/' . $pdt->thumbnail) ?>" alt="<?= $pdt->name ?>" width="80" class="img-thumbnail">
                                    </td>
                                    <td><?= substr($pdt ->name, 0, 50) ?>...</td>
                                    <td><?= $pdt ->price ?></td>
                                    <td>
                                        <a href="<?= site_url('produit/show/'.$pdt ->id) ?>" class="btn btn-md btn-info">Voir</a>
                                        <a href="<?= site_url('produit/edit/'.$pdt ->id) ?>" class="btn btn-md btn-warning">Editer</a>
                                        <a href="<?= site_url('produit/delete/'.$pdt ->id) ?>" class="btn btn-md btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this ->load ->view('admin/template/footer.php') ?><?php
