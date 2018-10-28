<?php
if (!function_exists('currentRoute')) {
    function currentRoute(...$routes)
    {
        foreach($routes as $route) {
            if(request()->url() == $route) {
                return ' active';
            }
        }
    }
}

if (!function_exists('formatPrice')) {

    /**
     * Format integer to a price
     *
     * @param integer $price
     *
     * @return string
     */
    function formatPrice($price)
    {
        // Do your necessary logic
		$price = number_format($price, 2, ',', ' ') . ' €';
        return $price;
    }
}