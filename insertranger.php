<?php
include_once 'class/Ranger.php';
$oct1=$_POST['oct1'];
$oct2=$_POST['oct2'];
$oct3=$_POST['oct3'];
$desc_ranger=$_POST['descricao'];
$ranger = new Ranger();
$ins_ranger = $ranger->incluirRanger($oct1,$oct2,$oct3,$desc_ranger);
var_dump($oct1);
var_dump($oct2);
var_dump($oct3);
var_dump($oct3);