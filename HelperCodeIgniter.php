<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Date Format Function
if ( !function_exists('format_tanggal') ) {
	
	function format_tanggal($tgl){ // tgl = 2020-07-18
		if (!empty($tgl)) {
			$pecah = explode('-', $tgl);
			$hasil = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];

			return $hasil; //return 18-07-2020
		}
	}

}

// Format Rupiah Function  **maybe, can be used by any currency
if ( !function_exists('format_rupiah') ) {

    function format_rupiah($angka){ //ex : $angka = 1100000
        if (!empty($angka)) {
            $rupiah = number_format($angka,0,',','.');

            return $rupiah; //ex : return = 1.100.000
        }
    }

}

// Fungsi ubah format tanggal Indonesia
if ( !function_exists('format_tanggal_indo') ) {
	
	function format_tanggal_indo($tgllengkap){
		if (!empty($tgllengkap)) {
			$pecah = explode(' ', $tgllengkap);
			$tanggal = $pecah[0];
			$jam = $pecah[1];

			$BulanIndo = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
			$tahun = substr($tanggal, 0, 4);
			$bulan = substr($tanggal, 5, 2);
			$tgl   = substr($tanggal, 8, 2);
 
			$hasil = $tgl.' '.$BulanIndo[(int)$bulan].' '.$tahun.', '.$jam;

			return $hasil;
		}
	}

}

// Phone Indo Function
if ( !function_exists('phone_indo') ) {

    function phone_indo($number){ 
        //check the first number of the telephone number
        $cek_tlp = substr($number, 0,1);
        //if the first number is 0 then ........
        if ($cek_tlp=='0') {
            $tlp = substr($number, 1);
            $phone = '62'.$tlp; // 62 is Indonesia Phone Code
        }else{
            $phone = $telepon;
        } 

        return $phone;  //Return
    }
}

// ID String Function ex. ID-001, ID-002, ID-010, ID-100, ID-999
if ( !function_exists('id_string') ) {

    function id_string($id_num){ // $id_num contains the id number

        // $id_length to get the length id_num
        $id_length = strlen($id_num);

        //check id_num length, if length is 1 then ......., and if .......
        if ($id_length==1) {
            $id_string = 'ID-00'.$id_num; //ID-001 - ID-OO9
        }
        else if ($id_length==2) {
            $id_string = 'ID-0'.$id_num; //ID-010 - ID-O99
        }
        else if ($id_length==3){
            $id_string = 'ID-'.$id_num; //ID-100 - ID-999
        }
        return $id_string; //return id string
    }
}
