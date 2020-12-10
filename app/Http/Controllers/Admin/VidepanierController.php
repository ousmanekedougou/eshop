<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class VidepanierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sup()
    {
        Cart::destroy();
        return redirect()->back();
    }
}
