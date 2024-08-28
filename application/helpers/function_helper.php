<?php

function angka($integer)
{
	if ($integer === '' or $integer === null) {
		return null;
	} else {
		return $integer < 0 ? '<font color="Crimson">(' . number_format(abs($integer), 0, ',', '.') . ')</font>' : number_format($integer, 0, ',', '.');
	}
}

function rupiah($angka, $show_null = false)
{
	if ((int) $angka == 0 || empty(@$angka)) {
		return $show_null ? 'Rp0' : null;
	} else {
		return $angka >= 0 ? 'Rp' . angka($angka) : '( Rp' . angka(abs($angka)) . ' )';
	}
}
