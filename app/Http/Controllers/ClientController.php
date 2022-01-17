<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    public function welcome()
    {
        return view('Auth.Login');
    }
    public function credentials(){
        $client_id = "SEGUROS";
        $secret = "pruebas2021*";
        $url = "http://3.208.158.199/magnussucre/wsdl/tokenApp";
        $data = [
            'grant_type' => 'client_credentials',
        ];
        $response =  Http::asForm()
            ->withBasicAuth($client_id, $secret)
            ->post($url, $data);
        $client_find=json_decode($response->body());
        return $client_find->token;
    }
    public function login(Request $request){
        $client_id = $request->username;
        $secret = $request->password;
        $url = "http://3.208.158.199/magnussucre/wsdl/tokenApp";
        $data = [
            'grant_type' => 'client_credentials',
        ];
        $response =  Http::asForm()
            ->withBasicAuth($client_id, $secret)
            ->post($url, $data);
        $client_find=json_decode($response->body());
        if ($client_find->codigo === "200") {
            return redirect()->route('index');
        } else {
            return redirect()->back();
        }
    }
    public function index()
    {
        return view('Clients.Index');
    }
    public function Customer()
    {
        return view('Clients.Create');
    }
    public function create(CustomerRequest $request){
        $url = "http://3.208.158.199/magnussucre/wsdl/customerApp";
        $postInput = [
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'email' => $request->email,
            'document' => $request->document,
            'phone' => $request->phone,
            'mobile_phone' => $request->mobile_phone,
            'address' => $request->address,
        ];
        $token= $this->credentials();
        $response = Http::withToken($token)->post($url, $postInput);
        $client_find=json_decode($response->body());
        if(!empty($client_find)){
            return redirect()->route('index')->with('success', 'Registration Success');
        }else{
            return back()->with('error', 'Errors in registration');
        }
    }
}
