<?php

if (! function_exists('moneyFormat')) {
    /**
     * moneyFormat
     *
     * @param  mixed $str
     * @return void
     */
    function moneyFormat($str) {
        return number_format($str, '0', '', '.');
    }
}

if (! function_exists('discount')) {
    /**
     * moneyFormat
     *
     * @param  mixed $str
     * @return void
     */
    function discount($price, $discount){
        return $price - ($price * $discount / 100);
    }
}
