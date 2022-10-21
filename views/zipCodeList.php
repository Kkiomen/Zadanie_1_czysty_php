<?php include 'templates/header.php'; ?>


    <div class="container">

        <div class="text-end">
            <a href="index.php?controller=City&action=updateZipCodeView"><button class="btn btn-info">Dodaj kod pocztowy</button></a>
        </div>

        <div class="mt-3 mb-5">
            <div class="card">
                <div class="card-header">
                    Wyszukiwarka/filtr po kodzie pocztowym <?php if(isset($_GET['value'])): ?><strong>[<?= $_GET['value'] ?>]</strong><?php endif; ?>
                </div>
                <div class="card-body">
                    <form method="post" action="#">
                        <div class="mb-3">
                            <label class="form-label">Kod pocztowy</label>
                            <input type="text" class="form-control" placeholder="11-111" name="zipcode">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-info col-12" type="submit" name="button_form">Szukaj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Miasto</th>
                    <th>Kod pocztowy</th>
                    <th>Opcje</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($this->cities as $city): ?>
                    <tr>
                        <td><?= $city['name'] ?></td>
                        <td><?= $city['zipCode'] ?></td>
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