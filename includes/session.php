<?php
	if (session_status() != PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
		//session_id($_SESSION['usuario']);
		session_start();
	}
	if(!isset ($_SESSION['login']) == true){
		unset($_SESSION['login']);
		//unset($_SESSION);
		header('location:./');
	}