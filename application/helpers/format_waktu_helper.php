<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('tanggal_indonesia'))
{
    function tanggal_indonesia($datetime)
    {
        $hari = [
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        ];

        $bulan = [
            'January'   => 'Januari',
            'February'  => 'Februari',
            'March'     => 'Maret',
            'April'     => 'April',
            'May'       => 'Mei',
            'June'      => 'Juni',
            'July'      => 'Juli',
            'August'    => 'Agustus',
            'September' => 'September',
            'October'   => 'Oktober',
            'November'  => 'November',
            'December'  => 'Desember'
        ];

        $timestamp = strtotime($datetime);
        $hari_en = date('l', $timestamp);
        $bulan_en = date('F', $timestamp);

        return $hari[$hari_en] . ', ' . date('d', $timestamp) . ' ' . $bulan[$bulan_en] . ' ' . date('Y', $timestamp) . ' - ' . date('H:i:s', $timestamp);
    }
}
