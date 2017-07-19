<?php
session_start();
if(isset($_SESSION['idDevice'])){
    unset($_SESSION['idDevice']);
}
