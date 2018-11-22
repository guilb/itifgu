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
        if ($price != 0) {
		  $price = number_format($price, 2, ',', ' ') . ' €';
        }
        else
        {
            $price = "-";
        }
        return $price;
    }
}

if (!function_exists('displayStatus')) {

    /**
     * Format integer to a price
     *
     * @param integer $price
     *
     * @return string
     */
    function displayStatus($status)
    {
        // Do your necessary logic

        switch ($status) {
            case 'created':
                $status = "Créée";
            break;
            case 'cancelled':
                $status = "Annulée";
            break;
            case 'accepted':
                $status = "Acceptée";
            break;
            case 'finished':
                $status = "Terminée";
            break;
            case 'validated':
                $status = "Validée";
            break;
            case 'billed':
                $status = "Facturée";
            break;
            case 'waiting':
                $status = "En attente";
            break;
      }
        return $status;
    }
}

if (!function_exists('finishedOrders')) {

    function finishedOrders($user)
    {
        // Do your necessary logic
        return $user->orders->where('status', '=', 'finished')->count();
    }
}


if (!function_exists('classButtonStatus')) {

    function differentClassAdminUser($class_admin,$class_user)
    {

        $user = \Auth::user();
        if ( $user->role === 'admin') {
            return $class_admin;
        }
        else
        {
            return $class_user;
        }
    }
}

if (!function_exists('classButtonStatus')) {

    function classButtonStatus($order_status,$button_status,$order_total_price)
    {
        switch ([$order_status, $button_status]) {
            case ['created', 'finished']:
            case ['created', 'validated']:

            case ['waiting', 'accepted']:
            #case ['waiting', 'cancelled']:
            case ['waiting', 'finished']:
            case ['waiting', 'waiting']:
            #case ['waiting', 'validated']:

            #case ['accepted', 'created']:
            case ['accepted', 'accepted']:
            case ['accepted', 'cancelled']:
            case ['accepted', 'waiting']:
            case ['accepted', 'validated']:

            case ['validated', 'cancelled']:
            case ['validated', 'accepted']:
            #case ['validated', 'finished']:
            case ['validated', 'waiting']:
            case ['validated', 'validated']:

            case ['cancelled', 'cancelled']:
            case ['cancelled', 'accepted']:
            case ['cancelled', 'finished']:
            case ['cancelled', 'waiting']:
            case ['cancelled', 'validated']:

            case ['finished', 'accepted']:
            case ['finished', 'cancelled']:
            case ['finished', 'finished']:
            case ['finished', 'waiting']:
            case ['finished', 'validated']:

            case ['billed', 'accepted']:
            case ['billed', 'cancelled']:
            case ['billed', 'finished']:
            case ['billed', 'waiting']:
            case ['billed', 'validated']:

                $status = "btn-success disable-me";
            break;


            default:
                if ($order_total_price==null && $button_status =="accepted"){

                    $status = "btn-success disable-me";
                }
                else
                {
                    $status = "";
                }
        }

        return $status;
    }
}