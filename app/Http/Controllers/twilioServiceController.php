<?php
namespace App\Http\Controllers;

use App\Services\twilioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class twilioServiceController extends Controller
{
    protected $twilio;

    public function __construct(twilioService $twilio)
    {
        $this->twilio = $twilio;
    }
    public function showsms()
    {
        return view('twilioservice.form');
    }
    public function sendSms(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'From' => 'required',
            'Body' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        // Si la validation réussit, vous pouvez traiter les données
        $from = $request->input('From');;
        $body = $request->input('body');;
        return response()->json(['message' => 'Message envoyé avec succès'], 200);
    }
}
}
