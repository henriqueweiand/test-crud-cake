<?php
namespace App\View\Helper;

use Cake\View\Helper;

class PriceHelper extends Helper
{
    public function format($number)
    {
        return "U$ ".$number;
    }
}
?>
