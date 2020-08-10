<?php
$link = mysqli_connect('localhost', 'root', '', 'test_rubric')
        and print_r('подключен к localhost' . '</br>')
        or die("Ошибка " . mysqli_error($link));


    $res = mysqli_query($link, "SELECT products.`Наименование`, MAX(prices.Цена), MIN(prices.Цена) FROM products
INNER JOIN prices ON products.id_tovar=prices.id_tovara GROUP BY  products.`Наименование`");
 echo "<table border='1'><tr>";
 while ($row = mysqli_fetch_array($res)) {
    echo '<td>' . $row['Наименование'] . '</td>' . '<td>' . $row['MAX(prices.Цена)'] . '</td>' . '<td>' . $row['MIN(prices.Цена)'] . '</td>'; // выводим данные
    echo '</tr>';
}
