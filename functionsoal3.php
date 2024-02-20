
<?php
function rambuLaluLintas($counter)
{
    $colors = ['merah', 'kuning', 'hijau'];
    $index = ($counter - 1) % count($colors);
    return $colors[$index];
}

if (isset($_GET['counter'])) {
    $counter = intval($_GET['counter']);
    $result = rambuLaluLintas($counter);
    echo $result;
}
?>