<?php

if (!function_exists('formatRupiah')) {
    function formatRupiah($amount, $prefix = 'Rp')
    {
        return $prefix . number_format($amount, 0, ',', '.');
    }
}
