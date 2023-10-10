<?php
/*
✔ Stampare tutti i nostri hotel con tutti i dati disponibili.

✔ Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.

Bonus:
✔ Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.

Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)

NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore) Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. */

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

            <tbody>

                <?php foreach ($hotels as $key => $hotel) : ?>

                    <?php $have_parking = $_GET['parking'] ?>

                    <tr>
                        <?php if ($have_parking == null || $have_parking == 'all') : ?>

                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td><?php echo $hotel['name'] ?></td>
                            <td><?php echo $hotel['description'] ?></td>
                            <td>
                                <?php if ($hotel['parking'] == 1) {
                                    echo 'Available';
                                } else {
                                    echo 'Not available';
                                }
                                ?>
                            </td>
                            <td><?php echo $hotel['vote'] . '/5' ?></td>
                            <td><?php echo $hotel['distance_to_center'] . 'Km' ?></td>

                        <?php elseif ($have_parking == 'yes' && $hotel['parking']) : ?>

                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td><?php echo $hotel['name'] ?></td>
                            <td><?php echo $hotel['description'] ?></td>
                            <td>
                                <?php if ($hotel['parking'] == 1) {
                                    echo 'Available';
                                } else {
                                    echo 'Not available';
                                }
                                ?>
                            </td>
                            <td><?php echo $hotel['vote'] . '/5' ?></td>
                            <td><?php echo $hotel['distance_to_center'] . 'Km' ?></td>

                        <?php elseif ($have_parking == 'no' && !$hotel['parking']) : ?>

                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td><?php echo $hotel['name'] ?></td>
                            <td><?php echo $hotel['description'] ?></td>
                            <td>
                                <?php if ($hotel['parking'] == 1) {
                                    echo 'Available';
                                } else {
                                    echo 'Not available';
                                }
                                ?>
                            </td>
                            <td><?php echo $hotel['vote'] . '/5' ?></td>
                            <td><?php echo $hotel['distance_to_center'] . 'Km' ?></td>

                        <?php endif; ?>

                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <!-- /.table -->

        <form method="GET" class="mt-5">

            <div class="d-flex fs-4 gap-4 justify-content-center">
                <div>
                    Parking:
                </div>

                <select name="parking" id="parking" class="form-select w-25">
                    <option value="all" selected>All</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>

            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>


        </form>
    </div>
    <!-- /.container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>