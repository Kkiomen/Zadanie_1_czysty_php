<?php include 'templates/header.php'; ?>


<div class="container">

    <div class="text-end">
        <a href="index.php?controller=City&action=create"><button class="btn btn-info">Dodaj miasto</button></a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Miasto</th>
                    <th>Opcje</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($this->cities as $city): ?>
                    <tr>
                        <td><?= $city['name'] ?></td>
                        <td>
                            <a href="index.php?controller=City&action=delete&id=<?= $city['id'] ?>"><button class="btn btn-danger">Usuń</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $this->paginateLinks ?>
        </div>
        <div class="col-md-6 text-end">
            <?= $this->paginatePageInfo ?>
        </div>
    </div>
</div>


<?php include 'templates/footer.php'; ?>