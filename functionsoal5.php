<?php

function karakterTerbanyak($kata)
{
    for ($i = 0; $i < strlen($kata); $i++) {
        $karakter[$kata[$i]] = isset($karakter[$kata[$i]]) ? $karakter[$kata[$i]] + 1 : 1;
    }

    $maxKemunculan = 0;
    $karterTerbanyak = '';

    foreach($karakter AS $k => $v) {
        if($v > $maxKemunculan) {
            $maxKemunculan = $v;
            $karterTerbanyak = $k;
        }
    }

    return $karterTerbanyak . ' ' . $maxKemunculan . ' x';
}
