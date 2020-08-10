<?php

$link = mysqli_connect('localhost', 'root', '', 'test_rubric')
        and print_r('подключен к localhost' . '</br>')
        or die("Ошибка " . mysqli_error($link));
$out;

function print_site($par_id) {
    global $out;
    global $link;
    $res = mysqli_query($link, "SELECT * FROM rubric WHERE parent_id = $par_id");

    $out .= '<ul>';
    while ($rows = mysqli_fetch_assoc($res)) {

        $out .= '<li><a href="?id=' . $rows['id'] . '">' . $rows['Название_рубрики'] . '</a></li>';
        print_site($rows['id']);
    }
    $out .= '</ul>';
    return $out;
}

echo print_site(0);
