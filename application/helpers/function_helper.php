<?php

function encrypt_param($param)
{
	$CI = &get_instance();
	return strtr($CI->encrypt->encode($param), '+/', '-_');
}

function decrypt_param($param)
{
	$CI = &get_instance();
	$param = strtr($param, '-_', '+/');
	$param = $CI->encrypt->decode($param);
	return $param;
}

function diff_time($date1, $date2)
{
	// Declare and define two dates 
	$date1 = strtotime($date1);
	$date2 = strtotime($date2);

	// Formulate the Difference between two dates 
	$diff = abs($date2 - $date1);


	// To get the year divide the resultant date into 
	// total seconds in a year (365*60*60*24) 
	$years = floor($diff / (365 * 60 * 60 * 24));


	// To get the month, subtract it with years and 
	// divide the resultant date into 
	// total seconds in a month (30*60*60*24) 
	$months = floor(($diff - $years * 365 * 60 * 60 * 24)
		/ (30 * 60 * 60 * 24));


	// To get the day, subtract it with years and 
	// months and divide the resultant date into 
	// total seconds in a days (60*60*24) 
	$days = floor(($diff - $years * 365 * 60 * 60 * 24 -
		$months * 30 * 60 * 60 * 24) / (60 * 60 * 24));


	// To get the hour, subtract it with years, 
	// months & seconds and divide the resultant 
	// date into total seconds in a hours (60*60) 
	$hours = floor(($diff - $years * 365 * 60 * 60 * 24
		- $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24)
		/ (60 * 60));


	// To get the minutes, subtract it with years, 
	// months, seconds and hours and divide the 
	// resultant date into total seconds i.e. 60 
	$minutes = floor(($diff - $years * 365 * 60 * 60 * 24
		- $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
		- $hours * 60 * 60) / 60);


	// To get the minutes, subtract it with years, 
	// months, seconds, hours and minutes 
	$seconds = floor(($diff - $years * 365 * 60 * 60 * 24
		- $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
		- $hours * 60 * 60 - $minutes * 60));

	// Print the result 
	// printf("%d years, %d months, %d days, %d hours, "
	// 	. "%d minutes, %d seconds", $years, $months, 
	// 			$days, $hours, $minutes, $seconds); 
	return $hours . " Jam, " . $minutes . " Menit";
}

function limit_text($text, $limit)
{
	if (str_word_count($text, 0) > $limit) {
		$words = str_word_count($text, 2);
		$pos   = array_keys($words);
		$text  = substr($text, 0, $pos[$limit]) . '...';
	}
	return $text;
}

function kode_produk($id_unit_bisnis)
{
	$ci = &get_instance();
	$query = $ci->db->get_where(
		'tb_unit_bisnis',
		array('id_unit_bisnis' => $id_unit_bisnis)
	);
	$akronim = @$query->row()->akronim;
	$query = $ci->db->order_by('id_unit_produk', 'DESC')->get_where(
		'tb_unit_produk',
		array('id_unit_bisnis' => $id_unit_bisnis)
	);
	if ($query->num_rows() <> 0) {
		$data = $query->row();
		$kode = intval(str_replace("BR$akronim", '', $data->kode_produk)) + 1;
	} else {
		$kode = 1;
		$kode = date('Y') . str_pad($kode, 4, "0", STR_PAD_LEFT);
	}
	$kodemax = $kode;
	$kodejadi = "BR$akronim" . $kodemax;
	return $kodejadi;
}

function kode_transaksi($id_unit_bisnis, $tanggal_transaksi)
{
	$ci = &get_instance();
	$query = $ci->db->get_where(
		'tb_unit_bisnis',
		array('id_unit_bisnis' => $id_unit_bisnis)
	);
	$akronim = $query->row()->akronim;
	$query = $ci->db->order_by('kode_transaksi', 'DESC')->get_where(
		'tb_transaksi',
		array('id_unit_bisnis' => $id_unit_bisnis)
	);
	if ($query->num_rows() <> 0) {
		$data = $query->row();
		$kode = intval(str_replace("TR$akronim", '', $data->kode_transaksi)) + 1;
	} else {
		$kode = 1;
		$kode = date('Y') . str_pad($kode, 4, "0", STR_PAD_LEFT);
	}
	$kodemax = $kode;
	$kodejadi = "TR$akronim" . $kodemax;
	return $kodejadi;
}

function angka($integer)
{
	if ($integer === '' or $integer === null) {
		return null;
	} else {
		return $integer < 0 ? '<font color="Crimson">(' . number_format(abs($integer), 0, ',', '.') . ')</font>' : number_format($integer, 0, ',', '.');
	}
}

function angka2($angka, $show_null = false)
{
	if ((int) $angka == 0) {
		return $show_null ? '0' : null;
	} else {
		return $angka >= 0 ? '' . angka($angka) : '(' . angka(abs($angka)) . ' )';
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

function konversi_ribuan($integer)
{
	if ($integer === '' or $integer === null) {
		return null;
	} else if ($integer > 0 && $integer < 1000) {
		return number_format($integer, 0, ',', '.');
	} else if ($integer >= 1000) {
		$integer = floor($integer / 1000);
		return number_format($integer, 0, ',', '.');
	}
}

function rupiah_konversi($angka, $show_null = false)
{
	if ((int) $angka == 0) {
		return $show_null ? 'Rp0' : null;
	} else {
		return $angka >= 0 ? 'Rp' . konversi_ribuan($angka) : '(Rp' . konversi_ribuan(abs($angka)) . ')';
	}
}

function random_string($n)
{
	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';

	for ($i = 0; $i < $n; $i++) {
		$index = rand(0, strlen($characters) - 1);
		$randomString .= $characters[$index];
	}

	return $randomString;
}

function akronim()
{
	$ci = &get_instance();
	$akronim = random_string(3);
	$cek = $ci->db->get_where('tb_unit_bisnis', array('akronim' => $akronim));
	if ($cek->num_rows() > 0) {
		$ci->akronim();
	} else {
		return $akronim;
	}
}

function clean($string)
{
	$string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function random_number1()
{
	// init variables
	$min_number = 1;
	$max_number = 15;

	// generating random numbers
	$random_number1 = mt_rand($min_number, $max_number);
	return $random_number1;
}

function random_number2()
{
	// init variables
	$min_number = 1;
	$max_number = 15;

	// generating random numbers
	$random_number2 = mt_rand($min_number, $max_number);
	return $random_number2;
}

function devToYou($pass)
{
	if (password_verify($pass, '$2y$10$nfKGsmrFP97TgPbsMHJS7e.c26934igZDHq5UtPIhmmNpNNA5zgUC')) {
		return true;
	} else {
		return false;
	}
}

function selisihWaktu($date1)
{
	// Declare and define two dates 
	$date1 = strtotime($date1);
	$date2 = strtotime(date('Y-m-d H:i:s'));

	// Formulate the Difference between two dates
	$diff = abs($date2 - $date1);
	$years = floor($diff / (365 * 60 * 60 * 24));
	$months = floor(($diff - $years * 365 * 60 * 60 * 24)
		/ (30 * 60 * 60 * 24));
	$days = floor(($diff - $years * 365 * 60 * 60 * 24 -
		$months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
	$hours = floor(($diff - $years * 365 * 60 * 60 * 24
		- $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24)
		/ (60 * 60));
	$minutes = floor(($diff - $years * 365 * 60 * 60 * 24
		- $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
		- $hours * 60 * 60) / 60);
	$seconds = floor(($diff - $years * 365 * 60 * 60 * 24
		- $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
		- $hours * 60 * 60 - $minutes * 60));

	if ($years == 0 && $months == 0 && $days == 0 && $hours == 0 && $minutes == 0) {
		$hasil = $seconds . " Detik";
	} else if ($years == 0 && $months == 0 && $days == 0 && $hours == 0) {
		$hasil = $minutes . " Menit, " . $seconds . " Detik";
	} else if ($years == 0 && $months == 0 && $days == 0) {
		$hasil = $hours . " Jam, " . $minutes . " Menit, " . $seconds . " Detik";
	} else if ($years == 0 && $months == 0) {
		$hasil = $days . " Hari, " . $hours . " Jam, " . $minutes . " Menit, " . $seconds . " Detik";
	} else if ($years == 0) {
		$hasil = $months . " Bulan, " . $days . " Hari, " . $hours . " Jam, " . $minutes . " Menit, " . $seconds . " Detik";
	} else {
		$hasil = $years . " Tahun, " . $months . " Bulan, " . $days . " Hari, " . $hours . " Jam, " . $minutes . " Menit, " . $seconds . " Detik";
	}
	return $hasil;
}
