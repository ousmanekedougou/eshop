<?php

use App\Model\Admin\info;
use App\Model\Admin\user;
use App\Model\User\contact;
use App\Model\Admin\category;
use App\Model\User\newsleter;



if(! function_exists('page_info')){
    function page_info()
    {
        $info = info::all();
        return $info;
    }
}


if(! function_exists('contacte_header')){
    function contacte_header()
    {
        $sms = contact::where('lire','0')->get();
        return $sms;
    }
}


if(! function_exists('abonner_eshop')){
    function abonner_eshop()
    {
        $sms = user::where('status','0')->get();
        return $sms;
    }
}


if(! function_exists('admin_header')){
    function admin_header()
    {
        $news = newsleter::all();
        return $news;
    }
}


if(! function_exists('page_category')){
    function page_category()
    {
        $category = category::limit(9)->get();
        return $category;
    }
}



if(! function_exists('page_title')){
    function page_title($title)
    {
        $empro = 'Eshop.Sn';
        if($title === '')
        {
            return $empro;
        }else{
           return $title . ' | ' .$empro;
        }
    }
}



if(! function_exists('set_active_route')){
    function set_active_route($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}


function getPrice($priceInDecimals)
{
    $price = floatval($priceInDecimals) / 100;
    
    return number_format($price, 2, ',' , ' ') . ' f';
}