<?php include 'templates/header.php'; ?>


    <div class="container">
        <div class="card">
            <div class="card-header">
                Dodawanie miasta
            </div>
            <div class="card-body">
                <form action="index.php?controller=City&action=save" method="post">
                    <div class="mb-3">
                        <label class="form-label">Miasto</label>
                        <input type="text" class="form-control" placeholder="Kraków" name="city">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-info col-12" type="submit">Dodaj miasto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include 'templates/footer.php'; ?>