<?php

namespace App\Livewire\Demo\Data\Contact;

use Aaran\Common\Models\Common;
use Aaran\Master\Models\Contact;
use Aaran\Master\Models\ContactDetail;
use Livewire\Component;

class Index extends Component
{
    public function loadDummy()
    {
        $this->Contact();
    }

    private function Contact()
    {
        $contact_name = [
            'A BLUES CLOTHING',
            'A . D . S APPARELS',
            'ANISHKA FASHIONS',
            'APPAREL KINGDOM PVT LTD',
            'ATTIRE CREATION CO',
            'CACTUS FASHIONS',
            'CHAWLA EXPORTS',
            'CHERISH KNITS',
            'DOLLAR EXPORTSS',
            'EASTMAN EXPORTS GLOBAL CLOTHING PRIVATE LIMITED',
            'EASTMAN EXPORTS GLOBAL CLOTHING PRIVATE LIMITED-DOMESTIC DIVISION',
            'EMEL ENTERPRISES LLP',
            'ESHAA APPARELS',
            'FIBRA GARMENTS',
            'GRANDNEUR FASHION',
            'KUNAL CLOTHING PRIVATE LTD',
            'MCWIN INTERNATIONAL',
            'MERCER APPARELS',
            'NAGESH KNIT & WEAR',
            'OMKARA CREATIONS',
            'PENTAGON APPARELS UNIT-1',
            'PROTOCOL LABELS INDIA PVT LTD',
            'RAYAR EXPORTS',
            'ROOT APPARELS',
            'SAMRUTHI TEXTILES PVT LTD',
            'SR FABS',
            'SRI KUMARN APPARELS',
            'SRI VARSHINI KNIT FASHIONS',
            'SWEATERS INDIA PRIVATE LIMITED',
            'TCI EXIM PVT LTD',
            'TENE APPARELS',
            'THE RAJLAKSHMI COTTON MILLS PVT.LTD',
            'VKNP DESIGNS PRIVATE LIMITED',
            'YUVA KNITS',
            'YUVA TEX',
            'KPM PAPER BOARDS',
            'SHRIRAAM TRADINGS',
            'SS LABELS',
            'COLOUR WORLD AGENCY',
            'SANKER TEXTILES PRIVATE LIMITED',
            'BALAJI DESIGENERS',
            'TECHSPACE SOLUTIONS',
            'CREATE KNIT FASHION',
            'M.V.KNITSS'
        ];

        for ($i = 0; $i < count($contact_name); $i++) {

            $phone_number = substr(str_shuffle("0123456789"), 0, 8);
            $gst_number = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 15);
            $obj = Contact::create([

                'vname' => $contact_name[$i],
                'mobile' => '91' . $phone_number,
                'whatsapp' => '63' . $phone_number,
                'contact_person' => '-',
                'contact_type' => 'Debtor',
                'msme_no' => $phone_number,
                'msme_type' => 'Creditor',
                'opening_balance' => 0,
                'effective_from' => date('Y-m-d'),
                'gstin' => $gst_number,
                'email' => '-',
                'user_id' => auth()->id(),
                'company_id' => session()->get('company_id'),
                'active_id' => 1,
            ]);

            $address = substr(str_shuffle("0123456789"), 0, 2);
            $city = Common::where('label_id','=','2')->pluck('id')->random();
            $state = Common::where('label_id','=','3')->pluck('id')->random();
            $country = Common::where('label_id','=','5')->pluck('id')->random();
            $pincode = Common::where('label_id','=','4')->pluck('id')->random();

            ContactDetail::create([
                'contact_id' => $obj->id,
                'address_1' => 'NO.'.$address,
                'address_2' => 'kuvempu layout',
                'city_id' => $city,
                'state_id' => $state,
                'country_id' => $country,
                'pincode_id' => $pincode,

            ]);

        }
        $successMessage = 'Contact Create Successfully.';
        $this->dispatch('notify', ...['type' => 'success', 'content' => $successMessage]);

    }

    public function render()
    {
        return view('livewire.demo.data.contact.index');
    }
}
