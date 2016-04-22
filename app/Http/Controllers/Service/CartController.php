<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\M3Result;
use Log;

/**
 *
 */
class CartController extends Controller
{

  public function addCart(Request $request, $product_id)
  {

    $m3_result = new M3Result;
    $m3_result->status = 0;
    $m3_result->message = '添加成功';

    $bk_cart = $request->cookie('bk_cart');
    $bk_cart_arr = ($bk_cart!=null ? explode(',', $bk_cart) : array());

    $count = 1;
    foreach ($bk_cart_arr as &$value) { // &$value一定要传引用
      $index = strpos($value, ':');
      if (substr($value, 0, $index) == $product_id) {
        $count = ((int)substr($value, $index+1)) + 1;
        $value = $product_id . ":" . $count;
        break;
      }
    }

    if ($count == 1) {
      array_push($bk_cart_arr, $product_id . ':' . $count);
    }


    Log::info("添加到购物车" . $bk_cart);
    Log::info($m3_result->toJson());
    return response($m3_result->toJson())->withCookie('bk_cart', implode(',', $bk_cart_arr));
  }
}


 ?>
