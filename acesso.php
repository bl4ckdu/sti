<?php
include_once 'class/Log.php';
$login = $_POST['user'];
$s = $_POST['password'];
$senha=hash('sha256',"$s");
$acesso = new Log();
$acesso->logon($login,$senha);
