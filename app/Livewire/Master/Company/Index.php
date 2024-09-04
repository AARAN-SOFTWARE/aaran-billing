<?php

namespace App\Livewire\Master\Company;

use Aaran\Common\Models\Common;
use Aaran\Master\Models\Company;
use App\Livewire\Trait\CommonTraitNew;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    use CommonTraitNew;
    #region[properties]
    public string $mobile = '';
    public string $email = '';
    public string $gstin = '';
    public mixed $msme_no = '';
    public mixed $msme_type = '';
    public string $address_1 = '';
    public string $address_2 = '';
    public string $display_name = '';
    public string $landline = '';
    public string $website = '';
    public $logo = '';
    public $old_logo = '';
    public string $pan = '';
    public $bank;
    public $acc_no;
    public $ifsc_code;
    public $branch;
    public $isUploaded = false;


    public string $cities;
    public string $states;
    public string $pincode;
    public $tenant_id;
    public Collection $tenants;
    #endregion

    #region[city]
    public $city_id = '';
    public $city_name = '';
    public Collection $cityCollection;
    public $highlightCity = 0;
    public $cityTyped = false;

    public function decrementCity(): void
    {
        if ($this->highlightCity === 0) {
            $this->highlightCity = count($this->cityCollection) - 1;
            return;
        }
        $this->highlightCity--;
    }

    public function incrementCity(): void
    {
        if ($this->highlightCity === count($this->cityCollection) - 1) {
            $this->highlightCity = 0;
            return;
        }
        $this->highlightCity++;
    }

    public function setCity($name, $id): void
    {
        $this->city_name = $name;
        $this->city_id = $id;
        $this->getCityList();
    }

    public function enterCity(): void
    {
        $obj = $this->cityCollection[$this->highlightCity] ?? null;

        $this->city_name = '';
        $this->cityCollection = Collection::empty();
        $this->highlightCity = 0;

        $this->city_name = $obj['vname'] ?? '';;
        $this->city_id = $obj['id'] ?? '';;
    }

    #[On('refresh-city')]
    public function refreshCity($v): void
    {
        $this->city_id = $v['id'];
        $this->city_name = $v['name'];
        $this->cityTyped = false;

    }
    public function citySave($name)
    {
        $obj= Common::create([
            'label_id'=>1,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshCity($v);
    }

    public function getCityList(): void
    {
        $this->cityCollection = $this->city_name ?
            Common::search(trim($this->city_name))->where('label_id','=','1')->get() :
            Common::where('label_id','=','1')->get();
    }
    #endregion

    #region[state]
    public $state_id = '';
    public $state_name = '';
    public Collection $stateCollection;
    public $highlightState = 0;
    public $stateTyped = false;

    public function decrementState(): void
    {
        if ($this->highlightState === 0) {
            $this->highlightState = count($this->stateCollection) - 1;
            return;
        }
        $this->highlightState--;
    }

    public function incrementState(): void
    {
        if ($this->highlightState === count($this->stateCollection) - 1) {
            $this->highlightState = 0;
            return;
        }
        $this->highlightState++;
    }

    public function setState($name, $id): void
    {
        $this->state_name = $name;
        $this->state_id = $id;
        $this->getStateList();
    }

    public function enterState(): void
    {
        $obj = $this->stateCollection[$this->highlightState] ?? null;

        $this->state_name = '';
        $this->stateCollection = Collection::empty();
        $this->highlightState = 0;

        $this->state_name = $obj['vname'] ?? '';;
        $this->state_id = $obj['id'] ?? '';;
    }

    #[On('refresh-state')]
    public function refreshState($v): void
    {
        $this->state_id = $v['id'];
        $this->state_name = $v['name'];
        $this->stateTyped = false;

    }

    public function stateSave($name):void
    {
        $obj=Common::create([
            'label_id'=>2,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v=['name'=>$name,'id'=>$obj->id];
        $this->refreshState($v);
    }

    public function getStateList(): void
    {
        $this->stateCollection = $this->state_name ? Common::search(trim($this->state_name))->where('label_id','=',2)
            ->get() : Common::where('label_id','=',2)->get();
    }
    #endregion

    #region[pin-code]
    public $pincode_id = '';
    public $pincode_name = '';
    public Collection $pincodeCollection;
    public $highlightPincode = 0;
    public $pincodeTyped = false;

    public function decrementPincode(): void
    {
        if ($this->highlightPincode === 0) {
            $this->highlightPincode = count($this->pincodeCollection) - 1;
            return;
        }
        $this->highlightPincode--;
    }

    public function incrementPincode(): void
    {
        if ($this->highlightPincode === count($this->pincodeCollection) - 1) {
            $this->highlightPincode = 0;
            return;
        }
        $this->highlightPincode++;
    }

    public function enterPincode(): void
    {
        $obj = $this->pincodeCollection[$this->highlightPincode] ?? null;

        $this->pincode_name = '';
        $this->pincodeCollection = Collection::empty();
        $this->highlightPincode = 0;

        $this->pincode_name = $obj['vname'] ?? '';;
        $this->pincode_id = $obj['id'] ?? '';;
    }

    public function setPincode($name, $id): void
    {
        $this->pincode_name = $name;
        $this->pincode_id = $id;
        $this->getPincodeList();
    }

    #[On('refresh-pincode')]
    public function refreshPincode($v): void
    {
        $this->pincode_id = $v['id'];
        $this->pincode_name = $v['name'];
        $this->pincodeTyped = false;
    }

    public function pincodeSave($name)
    {
        $obj = Common::create([
            'label_id'=>3,
            'vname' => $name,
            'active_id' => '1'
        ]);
        $v = ['name' => $name, 'id' => $obj->id];
        $this->refreshPincode($v);
    }

    public function getPincodeList(): void
    {
        $this->pincodeCollection = $this->pincode_name ? Common::search(trim($this->pincode_name))
            ->where('label_id','=','3')
            ->get() : Common::where('label_id','=','3')->get();
    }
    #endregion

    #region[save]
    public function getSave():void
    {
        if ($this->common->vname!=''){
            if ($this->common->vid==''){
                $company=new Company();
                $extraFields=[
                    'display_name' => $this->display_name,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'mobile' => $this->mobile,
                    'landline' => $this->landline,
                    'gstin' => Str::upper($this->gstin),
                    'msme_no' => $this->msme_no,
                    'msme_type' => $this->msme_type,
                    'pan' => Str::upper($this->pan),
                    'email' => $this->email,
                    'website' => $this->website,
                    'city_id' => $this->city_id ?: '1',
                    'state_id' => $this->state_id ?: '1',
                    'pincode_id' => $this->pincode_id ?: '1',
                    'bank' => $this->bank,
                    'acc_no' => $this->acc_no,
                    'ifsc_code' => $this->ifsc_code,
                    'branch' => $this->branch,
                    'user_id' => Auth::id(),
                    'tenant_id' => $this->tenant_id ?: '1',
                    'logo' => $this->save_logo(),
                ];
                $this->common->save($company,$extraFields);
                $message = "Saved";
            }else {
                $company = Company::find($this->common->vid);
                $extraFields = [
                    'display_name' => $this->display_name,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'mobile' => $this->mobile,
                    'landline' => $this->landline,
                    'gstin' => Str::upper($this->gstin),
                    'msme_no' => $this->msme_no,
                    'msme_type' => $this->msme_type,
                    'pan' => Str::upper($this->pan),
                    'email' => $this->email,
                    'website' => $this->website,
                    'city_id' => $this->city_id ?: '1',
                    'state_id' => $this->state_id ?: '1',
                    'pincode_id' => $this->pincode_id ?: '1',
                    'bank' => $this->bank,
                    'acc_no' => $this->acc_no,
                    'ifsc_code' => $this->ifsc_code,
                    'branch' => $this->branch,
                    'user_id' => Auth::id(),
                    'tenant_id' => $this->tenant_id ?: '1',
                    'logo' => $this->save_logo(),
                ];
                $this->common->edit($company, $extraFields);
                $message = "Updated";
            }
            $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);
        }
    }
    #endregion

    #region[clear fields]
    public function clearFields()
    {
        $this->common->vid = '';
        $this->common->vname = '';
        $this->common->active_id = '1';
        $this->display_name = '';
        $this->address_1 = '';
        $this->address_2 = '';
        $this->mobile = '';
        $this->landline = '';
        $this->gstin = '';
        $this->msme_no = '';
        $this->msme_type = '';
        $this->pan = '';
        $this->email = '';
        $this->website = '';
        $this->city_id = '';
        $this->city_name = '';
        $this->state_id = '';
        $this->state_name = '';
        $this->pincode_id = '';
        $this->pincode_name = '';
        $this->bank = '';
        $this->acc_no = '';
        $this->ifsc_code = '';
        $this->branch = '';
        $this->logo='';
        $this->old_logo='';
    }
    #endregion

    #region[logo]
    public function save_logo()
    {
        if ($this->logo) {

            $image = $this->logo;
            $filename = $this->logo->getClientOriginalName();

            if (Storage::disk('public')->exists(Storage::path('public/images/' . $this->old_logo))) {
                Storage::disk('public')->delete(Storage::path('public/images/' . $this->old_logo));
            }

            $image->storeAs('public/images', $filename);

            return $filename;

        } else {
            if ($this->old_logo) {
                return $this->old_logo;
            } else {
                return 'no_image';
            }
        }
    }
    #endregion

    #region[obj]
    public function getObj($id)
    {
        if ($id) {
            $obj = Company::find($id);
            $this->common->vid = $obj->id;
            $this->common->vname = $obj->vname;
            $this->display_name = $obj->display_name;
            $this->address_1 = $obj->address_1;
            $this->address_2 = $obj->address_2;
            $this->mobile = $obj->mobile;
            $this->landline = $obj->landline;
            $this->gstin = $obj->gstin;
            $this->msme_no = $obj->msme_no;
            $this->msme_type = $obj->msme_type;
            $this->pan = $obj->pan;
            $this->email = $obj->email;
            $this->website = $obj->website;
            $this->city_id = $obj->city_id;
            $this->city_name = $obj->city_id ? Common::find($obj->city_id)->vname : '';
            $this->state_id = $obj->state_id;
            $this->state_name = $obj->state_id ? Common::find($obj->state_id)->vname : '';
            $this->pincode_id = $obj->pincode_id;
            $this->pincode_name = $obj->pincode_id ? Common::find($obj->pincode_id)->vname : '';
            $this->bank = $obj->bank;
            $this->acc_no = $obj->acc_no;
            $this->ifsc_code = $obj->ifsc_code;
            $this->branch = $obj->branch;
            $this->common->active_id = $obj->active_id;
            $this->old_logo = $obj->logo;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[route]
    public function getRoute(): void
    {
        $this->redirect(route('companies'));
    }
    #endregion

    #region[tenants]
    public function getTenants():void
    {
        $this->tenants = Tenant::all();

    }
    #endregion

    #region[render]
    public function render()
    {
        $this->getCityList();
        $this->getStateList();
        $this->getPincodeList();
        $this->getTenants();
        return view('livewire.master.company.index')->with([
            'list'=>$this->getListForm->getList(Company::class),
        ]);
    }
    #endregion
}
