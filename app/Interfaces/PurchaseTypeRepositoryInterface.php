<?php
namespace App\Interfaces;

interface PurchaseTypeRepositoryInterface{
    function register($storableArray);
    function delete(int $PurchaseTypeId);
    function getAll();
    function getLatestMenu();
}
?>
