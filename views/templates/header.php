<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php echo $this->title ?? "Zadanie 1"; ?></title>
</head>
<body>


<div class="px-4 py-5 mb-5 text-center bg-dark">
    <h1 class="display-5 fw-bold text-white"><?php echo $this->title ?? "Zadanie 1"; ?></h1>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Lista miast</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?controller=City&action=listZipCode">Lista kodów pocztowych z miastem</a>
        </li>
    </ul>
</div>

<div class="container">
    <?php \App\Core\AlertDraw::draw();?>
</div>