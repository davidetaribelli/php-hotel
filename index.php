<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Hotel</title>
</head>

<body>
    <?php

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

    // Filtro gli hotel

    $withParking = isset($_GET['parking']); // controllo se la casella del parcheggio è stata selezionata
    if ($withParking) {
        foreach ($hotels as $hotel) {
            if ($hotel['parking']) {
                $hotel_filtrati[] = $hotel; // Aggiungo l'hotel filtrato solo se ha il parcheggio
            }
        }
    } else {
        $hotel_filtrati = $hotels; // Se la casella di controllo non è selezionata, mostro tutti gli hotel
    }
    ?>
    <main>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-6 d-flex flex-column border border-3 ">
                    <form action="index.php" method="GET">
                        <div class="d-flex align-items-center gap-1 py-3">
                            <label for="parking">Free Parking</label>
                            <input type="checkbox" name="parking" id="parking">
                        </div>
                        <div class="d-flex align-items-center gap-1 py-3">
                            <label for="vote">Vote</label>
                            <input type="number" name="vote" id="vote" min="0" max=5>
                        </div>
                        <div class="d-flex align-items-center gap-1 py-3">
                            <button type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <table class="table table-dark table-striped ">
                        <thead>
                            <tr>
                                <?php foreach ($hotels[0] as $key => $value) { ?>
                                    <th scope="col"> <?php echo $key;  } ?> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($hotel_filtrati as $hotel) {
                                echo "<tr>";
                                foreach ($hotel as $key => $value) {
                                    echo "<td> $value </td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>

</body>

</html>