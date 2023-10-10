<?php
/*
✔ Stampare tutti i nostri hotel con tutti i dati disponibili.

✔ Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.

Bonus:
✔ Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.

✔ Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
*/

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
//var_dump($_GET['parking'])
//var_dump($_GET['vote'])

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">

        <table class="table table-striped table-hover border">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <!-- /thead -->

            <tbody>

                <?php foreach ($hotels as $key => $hotel) : ?>

                    <?php $parking_filter = $_GET['parking'] ?>
                    <?php $vote_filter = $_GET['vote'] ?>

                    <tr>

                        <?php if (($parking_filter == null || $parking_filter == 'all') || ($parking_filter == 'yes' && $hotel['parking']) || ($parking_filter == 'no' && !$hotel['parking'])) : ?>

                            <?php if (($vote_filter == null || $vote_filter == 'all') || ($vote_filter == '1' && $hotel['vote'] > 0) || ($vote_filter == '2' && $hotel['vote'] > 1) || ($vote_filter == '3' && $hotel['vote'] > 2) || ($vote_filter == '4' && $hotel['vote'] > 3) || ($vote_filter == '5' && $hotel['vote'] > 4)) : ?>


                                <th scope="row"><?php echo $key + 1 ?></th>
                                <td><?php echo $hotel['name'] ?></td>
                                <td><?php echo $hotel['description'] ?></td>
                                <td>
                                    <?php echo ($hotel['parking'] == 1) ? 'Available' : 'Not available' ?>
                                </td>
                                <td><?php echo $hotel['vote'] . '/5' ?></td>
                                <td><?php echo $hotel['distance_to_center'] . 'Km' ?></td>

                            <?php endif; ?>
                            <!-- /endif fot vote_filter -->

                        <?php endif; ?>
                        <!-- /endif fot parking_filter -->

                    </tr>
                    <!-- /tr -->

                <?php endforeach; ?>

            </tbody>
            <!-- /tbody -->

        </table>
        <!-- /.table -->

        <form method="GET" class="mt-5 d-flex justify-content-center gap-5">

            <div class="d-flex fs-4 gap-4">
                <div>
                    Parking:
                </div>

                <select name="parking" id="parking" class="form-select flex-grow-0">
                    <option value="all" selected>All</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>

            </div>

            <div class="d-flex fs-4 gap-4">
                <div>
                    Vote:
                </div>

                <select name="vote" id="vote" class="form-select flex-grow-0">
                    <option value="all" selected>All</option>
                    <option value="1">1+</option>
                    <option value="2">2+</option>
                    <option value="3">3+</option>
                    <option value="4">4+</option>
                    <option value="5">5</option>
                </select>

            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>


        </form>
    </div>
    <!-- /.container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>