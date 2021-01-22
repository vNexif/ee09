<?php
    $conn = mysqli_connect('localhost', 'root', '', 'wedkowanie');

    if(!$conn) {
        die('Blad polaczenia: ' . mysqli_connect_error());
    }

    $sql = 'SELECT nazwa, wystepowanie FROM ryby WHERE styl_zycia=1';
    $result = mysqli_query($conn, $sql);
    $objArr = [];

    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $obj = ['name' => $row['nazwa'], 'appearance' => $row['wystepowanie']];
            array_push($objArr, $obj);
        }
    } else {
        $obj = ['name' => null, 'appearance' => null];
        echo json_encode($obj);
    }
    echo json_encode($objArr);
    mysqli_close($conn);
?>