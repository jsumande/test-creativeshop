<?php

namespace App\Http\Controllers\Admin;

use App\PaymentCard;
use App\Helper\Reply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentCardController extends Controller
{

    
    public function index()
    {
        echo "hello";
    }


    public function update(Request $request, $id)
    {
        $card = PaymentCard::find($id);
        $card->account_name = $request->account_name;
        $card->address = $request->address;
        $card->country = $request->country;
        $card->card_number = $request->card_number;
        $card->cvv = $request->cvv;
        $card->exp  = $request->exp;
        $card->save();

        return Reply::redirect(route('admin.settings.index'), __('messages.updatedSuccessfully'));
    }
}
