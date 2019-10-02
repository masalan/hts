

<?php $this ->load ->view('admin/template/header.php') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Catégories</h1>
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
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <div class="col-3 text-right">
                                <a href="<?= site_url('categorie/newCatg') ?>" class="btn btn-primary">Nouvelle catégorie</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Catégorie</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($catgs as $catg) : ?>
                                    <tr>
                                        <td><?= $catg ->id ?></td>
                                        <td><?= $catg ->name ?></td>
                                        <td>
                                            <a href="<?= site_url('categorie/show/' . $catg->id) ?>" class="btn btn-md btn-info">Voir</a>
                                            <a href="<?= site_url('categorie/edit/' . $catg->id) ?>" class="btn btn-md btn-warning">Editer</a>
                                            <a href="<?= site_url('categorie/edit/' . $catg->id) ?>" class="btn btn-md btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Catégorie</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this ->load ->view('admin/template/footer.php') ?><?php
