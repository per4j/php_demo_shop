public function getCategory($value='')
<?php

namespace App\Http\Controllers\Service;

use App\Tool\validate\ValidateCode;
use App\Tool\validate\VCode;
use App\Tool\validate\Code;
use App\Http\Controllers\Controller;

class ValidateCodeController extends Controller
{
  public function create()
  {
    // phpinfo();
    // $validateCode = new ValidateCode;
    // return $validateCode->doimg();
    // $vCode = new VCode(80, 30, 4);
    // return $validateCode->doimg();
    $code = new Code;
    return $code->getCode(4,60,20);
  }
}
