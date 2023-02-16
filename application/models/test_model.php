<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_model extends CI_Model
{
	
	function calc()
	{
	
		//ambil nili inputan tiap person
		$ageofdeath_a  = $this->input->post('ageofdeath_a');
		$yearofdeath_a = $this->input->post('yearofdeath_a');
		$ageofdeath_b  = $this->input->post('ageofdeath_b');
		$yearofdeath_b = $this->input->post('yearofdeath_b');

		//hitung tahun kelahiran
		$yearofbirth_a = $yearofdeath_a-$ageofdeath_a;
		$yearofbirth_b = $yearofdeath_b-$ageofdeath_b;

		//cari perhitungan nilai total pembunuhan pada tahun kelahiran
		$totalkilled_a = $this->get_total_killed($yearofbirth_a);
		$totalkilled_b = $this->get_total_killed($yearofbirth_b);

		//hitung rata rata dari kedua tahun kelahiran
		$totalall = $totalkilled_a+$totalkilled_b;
		$avr = $totalall/2;

		if (($yearofbirth_a<1)|| ($yearofbirth_b<1)){
			$avr = -1;
		}
		//var_dump($avr);
		return $avr;
		
	}

	//fungsi untuk mengambil nilai pembunuhan pada tahun tertentu
	function get_total_killed($yearofbirth)
	{

		$year = 0;
		$lastkilledbefore = 0; //1 tahun sebelum tahun terakhir pembunuhan
		$lastkilled = 1; //tahun terakhir pembunuhan


		//perulangan untuk menghitung nilai pembunuhan pada tahun terakhir oleh penyihir
		for ($x = 1; $x <= $yearofbirth; $x++) {
			$year =$x;
			$item=array();
			$lastkilled2before=0;	
				if ($x<2){
					$lastkilled =1;
				} else {
					$total = $lastkilled+$lastkilledbefore+1;
					$lastkilled2before = $lastkilledbefore+1; 
					//nilai total pembunuhan pada 1 tahun sebelum tahun terakhir
					$lastkilledbefore = $lastkilled;
					$lastkilled = $total; //nilai total pembunuhan pada tahun terakhir
				}
			
		}

		//pengembalian nilai
		return $lastkilled;
		
	}

	function list_by_year()
	{

		$year = 0;
		$lastkilledbefore = 0;
		$lastkilled = 1;

		$list = array();
		for ($x = 1; $x <= 100; $x++) {
			$year =$x;
			$item=array();
			$lastkilled2before=0;	
				if ($x<2){
					$lastkilled =1;
					$lastkilled2before = 1;
				} else {
					$total = $lastkilled+$lastkilledbefore+1;
					$lastkilled2before = $lastkilledbefore+1;
					$lastkilledbefore = $lastkilled;
					$lastkilled = $total;
				}
			
			array_push($item, $lastkilledbefore."+".$lastkilled2before);
			array_push($item, $lastkilled);
			array_push($list, $item);


		}
		return $list;
		
	}



}
