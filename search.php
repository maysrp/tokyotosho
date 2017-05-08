<?php
	require  './class/medoo.php';
	require './class/tokyo.php';
	include_once 'phpQuery/phpQuery.php';

	$tokyo=new tokyo();
	$name=isset($_GET['name'])?$_GET['name']:0;
	$num=isset($_GET['num'])?$_GET['num']:100;
	$start=isset($_GET['start'])?$_GET['start']:0;
	if($name){
		$tokyo->search($name,$start,$num);
	}