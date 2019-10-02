

<?php $this ->load ->view('admin/template/header.php') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Nouvelle catégorie</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form method="post" action="<?= site_url('categorie/add') ?>" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title">Ajouter une nouvelle catégorie</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" name="nom" class="form-control" autocomplete="off" required>
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $this ->load ->view('admin/template/footer.php') ?>
