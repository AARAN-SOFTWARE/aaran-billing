<?php

namespace App\Livewire\Forms;

use Aaran\MasterGst\Models\MasterGstIrn;
use Aaran\MasterGst\Models\MasterGstToken;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Form;

class MasterGstApi extends Form
{
    public $auth_token;

    public function authenticate()
    {
        try {
            $response = Http::withHeaders([
                'username' => 'mastergst',
                'password' => 'Malli#123',
                'ip_address' => '103.231.117.198',
                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
                'gstin' => '29AABCT1332L000',
            ])->get('https://api.mastergst.com/einvoice/authenticate', [
                'email' => 'aaranoffice@gmail.com',
            ]);

            if ($response->successful()) {
                $data = $response->json();
//                session()->put('gst_auth_token', $data['data']['AuthToken']);
                $this->updateOrCreateToken($data['data']);

                return $data;
            } else {
                return response()->json(['error' => 'Request failed with status code: ' . $response->status()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function updateOrCreateToken($data)
    {
        $this->auth_token = MasterGstToken::orderByDesc('id')->first();

        if ($this->auth_token) {
            $this->auth_token->token = $data['AuthToken'];
            $this->auth_token->expires_at = $data['TokenExpiry'];
            $this->auth_token->save();
        } else {
            MasterGstToken::create([
                'token' => $data['AuthToken'],
                'expires_at' => $data['TokenExpiry'],
                'user_id' => 1,
            ]);
        }
    }

    public function getIrn(Request $request, $token=null, $jsonData=null,$sales_id=null)
    {

        try {
            $response = Http::withHeaders([
                'ip_address' => '103.231.117.198',
                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
                'username' => 'mastergst',
                'auth-token' => $token,
                'gstin' => '29AABCT1332L000',
                'Content-Type' => 'application/json',
            ])->post('https://api.mastergst.com/einvoice/type/GENERATE/version/V1_03?email=aaranoffice%40gmail.com', $jsonData);
            if ($response->successful()) {
                $data = $response->json();
                MasterGstIrn::create([
                    'sales_id'=>$sales_id,
                    'ackno' => $data['data']['AckNo'],
                    'ackdt' => $data['data']['AckDt'],
                    'irn' => $data['data']['Irn'],
                    'signed_invoice' => $data['data']['SignedInvoice'],
                    'signed_qrcode' => $data['data']['SignedQRCode'],
                    'status'=>'Generated',
                ]);
                return response()->json($response->json());
            } else {
                Log::error('API Request Failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'headers' => $response->headers(),
                ]);
                return response()->json([
                    'error' => 'Request failed with status code: ' . $response->status(),
                    'message' => $response->body(),
                ], $response->status());
            }
        } catch (\Exception $e) {
            Log::error('An error occurred while fetching IRN', ['exception' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function getIrnCancel(Request $request,$jsonData=null,$token=null,$sales_id=null)
    {

        try {
            $response = Http::withHeaders([
                'ip_address' => '103.231.117.198',
                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
                'username' => 'mastergst',
                'auth-token' => $token,
                'gstin' => '29AABCT1332L000',
                'Content-Type' => 'application/json',
            ])->post('https://api.mastergst.com/einvoice/type/CANCEL/version/V1_03?email=aaranoffice%40gmail.com',
                $jsonData);

            if ($response->successful()) {
                $obj=  MasterGstIrn::where('sales_id',$sales_id)->first();
                $obj->status="Canceled";
                $obj->save();
                return response()->json($response->json());
            } else {
                Log::error('API Request Failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'headers' => $response->headers(),
                ]);
                return response()->json([
                    'error' => 'Request failed with status code: '.$response->status(),
                    'message' => $response->body(),
                ], $response->status());
            }
        } catch (\Exception $e) {
            Log::error('An error occurred while fetching IRN', ['exception' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred: '.$e->getMessage()], 500);
        }

    }
}
