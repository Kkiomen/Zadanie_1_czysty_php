<?php include 'templates/header.php'; ?>


    <div class="container">
        <div class="card">
            <div class="card-header">
                Dodawanie miasta
            </div>
            <div class="card-body">

                <form action="index.php?controller=City&action=updateZipCode" method="post">
                    <div class="mb-3">
                        <label class="form-label">Miasto</label>
                        <select class="form-control" name="city">
                            <?php foreach($this->cities as $city): ?>
                                <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kod pocztowy</label>
                        <input type="text" class="form-control" placeholder="11-111" name="zipcode">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-info col-12" type="submit">Dodaj kod pocztowy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include 'templates/footer.php'; ?>