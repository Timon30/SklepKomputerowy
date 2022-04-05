<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Szkoła Ponadgimnazjalna</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../zadanie3/styl.css" rel="stylesheet">
    </head>
    <body>
        <div class="center">
            <div class="baner">
                <h1>Oceny uczniów: język polski</h1>
            </div>
            <div class="paneleLewy">
                <h2>Lista uczniów: </h2>
                <ol>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'szkola');

                    $sql1 = 'SELECT imie, nazwisko FROM uczen';

                    $query1 = mysqli_query($conn, $sql1);

                    $result1 = mysqli_num_rows($query1);

                    while ($wynik1 = mysqli_fetch_assoc($query1)) {
                        echo '<li>' .
                            $wynik1['imie'] .
                            ' ' .
                            $wynik1['nazwisko'] .
                            '</li>';
                    }

                    mysqli_close($conn);
                    ?>
                </ol>
            </div>
            <div class="panelePrawy">
                <p>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'szkola');

                    $sql2 = 'SELECT imie, nazwisko FROM uczen WHERE id = 2';
                    $sql3 =
                        'SELECT AVG(przedmiot_id) FROM ocena WHERE uczen_id = 2';

                    $query2 = mysqli_query($conn, $sql2);
                    $query3 = mysqli_query($conn, $sql3);

                    $result2 = mysqli_num_rows($query2);
                    $result3 = mysqli_num_rows($query3);

                    while ($result2 = mysqli_fetch_assoc($query2)) {
                        $result3 = mysqli_fetch_assoc($query3);
                        echo '<h2>' .
                            'Uczeń: ' .
                            $result2['imie'] .
                            ' ' .
                            $result2['nazwisko'] .
                            '</h2>';
                        echo ' Średnia ocen z języka polskiego: ' .
                            $result3['AVG(przedmiot_id)'];
                    }
                    ?>
                </p>
            </div>
            <div class="stopka">
                <h3>Zespół Szkół Ponadgimnazjalnych</h3>
                <p>Stronę opracował: 09732987356</p>
            </div>
        </div>
    </body>
</html>