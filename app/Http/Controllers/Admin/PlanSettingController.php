<?php

namespace App\Http\Controllers\Admin;

use App\Plan;
use App\Helper\Reply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanSettingController extends Controller
{


	public function index()
    {
        echo "Hzzz";
    }

    public function update(Request $request, $id)
    {
        $card = Plan::find($id);
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
