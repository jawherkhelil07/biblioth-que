<?php

require_once 'paniet.php';

$id=$_GET['id'];
$ii=$_GET['ii'];

$x=new paniet($id);
$x->ajouter();

header ('location:index_util.php?ii='.$ii.'');