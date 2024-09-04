<?php

namespace App\Livewire\Entries\Sales;

use Aaran\Common\Models\Common;
use Aaran\Entries\Models\Sale;
use Aaran\Master\Models\Company;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\ContactDetail;
use Aaran\Master\Models\Product;
use Aaran\MasterGst\Models\MasterGstEway;
use Aaran\MasterGst\Models\MasterGstIrn;
use App\Livewire\Forms\MasterGstApi;
use App\Livewire\Trait\CommonTraitNew;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EwayBill extends Component
{
    use CommonTraitNew;

    #region[E-invoice properties]
    public MasterGstApi $masterGstApi;
    public $e_invoiceDetails;
    public $e_wayDetails;
    public $token;
    public $irnData;
    public $IrnCancel;
    public $sales_id;
    public $Irn_no;
    public $CnlRsn;
    public $CnlRem;
    public $distance=0;
    public $showModel=false;
    public $successMessage='';
    public $Transid;
    public $Transname;
    public $Transdocno;
    public $TransdocDt;
    public $Vehno;
    public $Vehtype;
    public $TransMode;
    #endregion

    #region[Properties]
    public string $uniqueno = '';
    public string $acyear = '';
    public string $invoice_no = '';
    public string $invoice_date = '';
    public string $sales_type = '';
    public string $destination = '';
    public string $bundle = '';
    public mixed $total_qty = 0;
    public mixed $total_taxable = '';
    public string $total_gst = '';
    public mixed $additional = '';
    public mixed $round_off = '';
    public mixed $grand_total = '';
    public mixed $qty = '';
    public mixed $price = '';
    public string $gst_percent = '';
    public string $itemIndex = "";
    public $itemList = [];
    public $description;

    public string $company;
    public string $contact;
    public string $order;
    public string $transport;
    public string $ledger;
    public string $sale;
    public string $product;
    public string $colour;
    public string $size;
    public mixed $job_no = '';
    public $po_no;
    public $grandtotalBeforeRound;
    public $dc_no;
    public $no_of_roll;
    public $contact_id;
    public $contact_name;
    public $order_id;
    public $order_name;
    public $billing_id;
    public $billing_address;
    public $shipping_id;
    public $shipping_address;
    public $style_id;
    public $style_name;
    public $despatch_id;
    public $despatch_name;
    public $transport_id;
    public $transport_name;
    public $ledger_id;
    public $ledger_name;
    #endregion

    #region[mount]
    public function mount($id): void
    {
        $this->invoice_no = Sale::nextNo();
        if ($id != 0) {
            $obj = Sale::find($id);
            $this->common->vid = $obj->id;
            $this->uniqueno = $obj->uniqueno;
            $this->acyear = $obj->acyear;
            $this->contact_id = $obj->contact_id;
            $this->contact_name = $obj->contact->vname;
            $this->invoice_no = $obj->invoice_no;
            $this->invoice_date = $obj->invoice_date;
            $this->order_id = $obj->order_id;
            $this->order_name = $obj->order->vname;
            $this->billing_id = $obj->billing_id;
            $this->billing_address = ContactDetail::printDetails($obj->billing_id)->get('address_1');
            $this->shipping_id = $obj->shipping_id;
            $this->shipping_address = ContactDetail::printDetails($obj->shipping_id)->get('address_1');
            $this->style_id = $obj->style_id;
            $this->style_name = $obj->style->vname;
            $this->despatch_id = $obj->despatch_id;
            $this->despatch_name = $obj->despatch_id ? Common::find($obj->despatch_id)->vname : '';
            $this->job_no = $obj->job_no;
            $this->sales_type = $obj->sales_type;
            $this->transport_id = $obj->transport_id;
            $this->transport_name = $obj->transport_id ? Common::find($obj->transport_id)->vname : '';
            $this->destination = $obj->destination;
            $this->bundle = $obj->bundle;
            $this->distance = $obj->distance;
            $this->TransMode = $obj->TransMode;
            $this->Transid = $obj->Transid;
            $this->Transname = $obj->Transname;
            $this->Transdocno = $obj->Transdocno;
            $this->TransdocDt = $obj->TransdocDt;
            $this->Vehno = $obj->Vehno;
            $this->Vehtype = $obj->Vehtype;
            $this->total_qty = $obj->total_qty;
            $this->total_taxable = $obj->total_taxable;
            $this->total_gst = $obj->total_gst;
            $this->ledger_id = $obj->ledger_id;
            $this->ledger_name = $obj->ledger_id ? Common::find($obj->ledger_id)->vname : '';
            $this->additional = $obj->additional;
            $this->round_off = $obj->round_off;
            $this->grand_total = $obj->grand_total;
            $this->common->active_id = $obj->active_id;

            $data = DB::table('saleitems')->select('saleitems.*',
                'products.vname as product_name',
                'colours.vname as colour_name',
                'sizes.vname as size_name',)->join('products', 'products.id', '=', 'saleitems.product_id')
                ->join('commons as colours', 'colours.id', '=', 'saleitems.colour_id')
                ->join('commons as sizes', 'sizes.id', '=', 'saleitems.size_id')->where('sale_id', '=',
                    $id)->get()->transform(function ($data) {
                    return [
                        'saleitem_id' => $data->id,
                        'po_no' => $data->po_no,
                        'dc_no' => $data->dc_no,
                        'no_of_roll' => $data->no_of_roll,
                        'product_name' => $data->product_name,
                        'product_id' => $data->product_id,
                        'colour_name' => $data->colour_name,
                        'colour_id' => $data->colour_id,
                        'size_name' => $data->size_name,
                        'size_id' => $data->size_id,
                        'qty' => $data->qty,
                        'price' => $data->price,
                        'description' => $data->description,
                        'gst_percent' => $data->gst_percent,
                        'taxable' => $data->qty * $data->price,
                        'gst_amount' => ($data->qty * $data->price) * ($data->gst_percent) / 100,
                        'subtotal' => $data->qty * $data->price + (($data->qty * $data->price) * $data->gst_percent / 100),
                    ];
                });
            $this->itemList = $data;
            $this->e_invoiceDetails=MasterGstIrn::where('sales_id',$this->common->vid)->first();
            $this->e_wayDetails=MasterGstEway::where('sales_id',$this->common->vid)->first();
        } else {
            $this->uniqueno = session()->get('company_id').'~'.session()->get('acyear').'~'.$this->invoice_no;
            $this->common->active_id = true;
            $this->sales_type = 'CGST-SGST';
            $this->gst_percent = 5;
            $this->additional = 0;
            $this->grand_total = 0;
            $this->total_taxable = 0;
            $this->round_off = 0;
            $this->total_gst = 0;
            $this->invoice_date = Carbon::now()->format('Y-m-d');
            $this->TransMode=1;
            $this->Vehtype='R';
            $this->TransdocDt=Carbon::now()->format('Y-m-d');
        }

        $this->calculateTotal();
    }

    #endregion

    #region[Calculate total]

    public function calculateTotal(): void
    {
        if ($this->itemList) {

            $this->total_qty = 0;
            $this->total_taxable = 0;
            $this->total_gst = 0;
            $this->grandtotalBeforeRound = 0;

            foreach ($this->itemList as $row) {
                $this->total_qty += round(floatval($row['qty']), 3);
                $this->total_taxable += round(floatval($row['taxable']), 2);
                $this->total_gst += round(floatval($row['gst_amount']), 2);
                $this->grandtotalBeforeRound += round(floatval($row['subtotal']), 2);
            }
            $this->grand_total = round($this->grandtotalBeforeRound);
            $this->round_off = $this->grandtotalBeforeRound - $this->grand_total;

            if ($this->grandtotalBeforeRound > $this->grand_total) {
                $this->round_off = round($this->round_off, 2) * -1;
            }

            $this->qty = round(floatval($this->qty), 3);
            $this->total_taxable = round(floatval($this->total_taxable), 2);
            $this->total_gst = round(floatval($this->total_gst), 2);
            $this->round_off = round(floatval($this->round_off), 2);
            $this->grand_total = round((floatval($this->grand_total)) + (floatval($this->additional)), 2);
        }
    }

    #endregion

    #region[EwayBill]
    public function EwayBill()
    {
        $company = Company::find(session()->get('company_id'));
        $contact = Contact::find($this->contact_id);
        $contactDetail = ContactDetail::where('contact_id', $contact->id)->first();
        $bodyData = [
            "supplyType" => "O",
            "subSupplyType" => "1",
            "subSupplyDesc" => " ",
            "docType" => "INV",
            "docNo" => $this->invoice_no,
            "docDate" => date('d/m/Y', strtotime($this->invoice_date)),
            "fromGstin" => $company->gstin,
            "fromTrdName" => $company->vname,
            "fromAddr1" => $company->address_1,
            "fromAddr2" =>$company->address_2,
            "fromPlace" => Common::find($company->city_id)->vname,
            "actFromStateCode" => (int)(Common::find($company->state_id)->desc),
            "fromPincode" =>(int)( Common::find($company->pincode_id)->vname),
            "fromStateCode" => (int)(Common::find($company->state_id)->desc),
            "toGstin" => $contact->gstin,
            "toTrdName" =>$contact->vname,
            "toAddr1" => $contactDetail->address_1,
            "toAddr2" => $contactDetail->address_2,
            "toPlace" => Common::find($contactDetail->city_id)->vname,
            "toPincode" =>(int) (Common::find($contactDetail->pincode_id)->vname),
            "actToStateCode" =>(int)(Common::find($contactDetail->state_id)->desc),
            "toStateCode" =>(int)(Common::find($contactDetail->state_id)->desc),
            "transactionType" => 4,
            "dispatchFromGSTIN" => $company->gstin,
            "dispatchFromTradeName" => $company->vname,
            "shipToGSTIN" => $contact->gstin,
            "shipToTradeName" =>$contact->vname,
            "totalValue" => $this->total_taxable,
            "totInvValue" =>$this->grand_total,
            "transMode" =>  (string)($this->TransMode),
            "transDistance" => $this->distance,
            "transDocNo" => $this->Transdocno,
            "transDocDate" => date('d/m/Y', strtotime($this->TransdocDt)),
            "vehicleNo" =>  $this->Vehno,
            "vehicleType" => $this->Vehtype,
            "itemList" => []
        ];
        if ($this->sales_type == 'CGST-SGST') {
            $bodyData["sgstValue"] = $this->total_gst/2;
            $bodyData["cgstValue"] = $this->total_gst/2;
            $bodyData["igstValue"] = 0;
        } else {
            $bodyData["igstValue"] = $this->total_gst;
            $bodyData["sgstValue"] =0;
            $bodyData["cgstValue"] = 0;
        }
        foreach ($this->itemList as $index => $row) {
            $productData = Product::find($row['product_id']);
            $itemData = [
                "productName"=>$productData->vname,
                "productDesc"=>$productData->vname,
                "hsnCode" => Sale::commons($productData->hsncode_id),
                "quantity" => (int)($row['qty']),
                "qtyUnit" => Sale::commons($productData->unit_id),
                "taxableAmount" => $row['taxable'],
            ];
            if ($this->sales_type == 'CGST-SGST') {
                $itemData["sgstRate"] = $row['gst_percent'] / 2;
                $itemData["cgstRate"] = $row['gst_percent'] / 2;
                $itemData["igstRate"] = 0;
            } else {
                $itemData["igstRate"] = $row['gst_percent'];
                $itemData["sgstRate"] =0;
                $itemData["cgstRate"] = 0;
            }

            $bodyData["itemList"][] = $itemData;
        }
        $result=$this->masterGstApi->EwayBillGenerate(new Request(),$bodyData,$this->common->vid);

        if (isset($result['data']['ewayBillNo'])) {
            $this->successMessage = 'E-wayBill generated successfully: ' . $result['data']['ewayBillNo'];
        } else {
            $this->successMessage = 'Failed to generate E-wayBill.';
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => $this->successMessage]);
        $this->getRoute();
    }
    #endregion

    public function render()
    {
        return view('livewire.entries.sales.eway-bill');
    }
}
