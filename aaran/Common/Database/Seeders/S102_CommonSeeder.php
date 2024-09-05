<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Common;
use Illuminate\Database\Seeder;

class S102_CommonSeeder extends Seeder
{
    public static function run(): void
    {
        self::noRecord();
        self::city();
        self::state();
        self::pinCode();
        self::country();
        self::hsncode();
        self::colour();
        self::size();
        self::bank();
        self::ledger();
        self::receiptType();
        self::productType();
        self::units();
        self::gstPercent();
        self::salesType();
        self::transaction();

    }

    #region[noRecord]
    public static function noRecord(): void
    {
        Common::create([
            'label_id' => '1',
            'vname' => '-',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[City]
    public static function city(): void
    {
        Common::create([
            'label_id' => '1',
            'vname' => 'Tiruppur',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '1',
            'vname' => 'Erode',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '1',
            'vname' => 'Salem',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[State]
    public static function state(): void
    {
        Common::create([
            'label_id' => '2',
            'vname' => 'TAMIL NADU',
            'desc' => '33',
            'desc_1' => '-',
            'active_id' => '1'
        ]);

        Common::create([
            'label_id' => '2',
            'vname' => 'KERALA',
            'desc' => '32',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'PUDUCHERRY',
            'desc' => '34',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'JAMMU AND KASHMIR',
            'desc' => '1',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'HIMACHAL PRADESH',
            'desc' => '2',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'PUNJAB',
            'desc' => '3',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'CHANDIGARH',
            'desc' => '4',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'UTTARAKHAND',
            'desc' => '5',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'HARYANA',
            'desc' => '6',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'DELHI',
            'desc' => '7',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'RAJASTHAN',
            'desc' => '8',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'UTTAR PRADESH',
            'desc' => '9',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'BIHAR',
            'desc' => '10',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'SIKKIM',
            'desc' => '11',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'ARUNACHAL PRADESH',
            'desc' => '12',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'NAGALAND',
            'desc' => '13',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'MANIPUR',
            'desc' => '14',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'MIZORAM',
            'desc' => '15',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'TRIPURA',
            'desc' => '16',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'MEGHALAYA',
            'desc' => '17',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'ASSAM',
            'desc' => '18',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'WEST BENGAL',
            'desc' => '19',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'JHARKHAND',
            'desc' => '20',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'ODISHA',
            'desc' => '21',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'CHATTISGARH',
            'desc' => '22',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'MADHYA PRADESH',
            'desc' => '23',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'GUJARAT',
            'desc' => '24',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'DADRA AND NAGAR HAVELI AND DAMAN AND DIU',
            'desc' => '26',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'MAHARASHTRA',
            'desc' => '27',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'KARNATAKA',
            'desc' => '29',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'GOA',
            'desc' => '30',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'ANDAMAN AND NICOBAR ISLANDS',
            'desc' => '35',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'LAKSHADWEEP',
            'desc' => '31',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'TELANGANA',
            'desc' => '36',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'LADAKH',
            'desc' => '38',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '2',
            'vname' => 'Andhra Pradesh',
            'desc' => '37',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[Pincode]
    public static function pinCode(): void
    {
        Common::create([
            'label_id' => '3',
            'vname' => '641666',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);

        Common::create([
            'label_id' => '3',
            'vname' => '641602',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[Country]
    public static function country(): void
    {
        Common::create([
            'label_id' => '4',
            'vname' => 'India',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[Hsncode]
    public static function hsncode(): void
    {
        Common::create([
            'label_id' => '5',
            'vname' => '489653',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '5',
            'vname' => '146610',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[colour]
    public static function colour(): void
    {
        Common::create([
            'label_id' => '6',
            'vname' => 'Red',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '6',
            'vname' => 'Pink',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[size]
    public static function size(): void
    {
        Common::create([
            'label_id' => '7',
            'vname' => 'S',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '7',
            'vname' => 'M',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '7',
            'vname' => 'L',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '7',
            'vname' => 'XL',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '7',
            'vname' => '2XL',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '7',
            'vname' => 'AllSize',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[Bank]
    public static function bank(): void
    {
        Common::create([
            'label_id' => '8',
            'vname' => 'SBI BANK',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '8',
            'vname' => 'AXIS BANK',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '8',
            'vname' => 'ICICI',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[ledger]
    public static function ledger(): void
    {
        Common::create([
            'label_id' => '9',
            'vname' => 'Auto Charges',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[receipt type]
    public static function receiptType(): void
    {
        Common::create([
            'label_id' => '13',
            'vname' => 'Cash',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '13',
            'vname' => 'Cheque',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '13',
            'vname' => 'PhonePe',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '13',
            'vname' => 'GPay',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '13',
            'vname' => 'RTGS',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '13',
            'vname' => 'NEFT',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[Product Type]
    public static function productType(): void
    {
        Common::create([
            'label_id' => '14',
            'vname' => 'Goods',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '14',
            'vname' => 'Service',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[Units]
    public static function units(): void
    {
        Common::create([
            'label_id' => '15',
            'vname' => 'Kgs',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '15',
            'vname' => 'Mts',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '15',
            'vname' => 'Pcs',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '15',
            'vname' => 'Nos',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '15',
            'vname' => 'Lts',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[gstPercent]
    public static function gstPercent(): void
    {
        Common::create([
            'label_id' => '16',
            'vname' => '0',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '16',
            'vname' => '5',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '16',
            'vname' => '12',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '16',
            'vname' => '18',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '16',
            'vname' => '24',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[SalesType]
    public static function salesType(): void
    {
        Common::create([
            'label_id' => '17',
            'vname' => 'Invoice',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '17',
            'vname' => 'Billing',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '17',
            'vname' => 'Sales',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '17',
            'vname' => 'GST',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion

    #region[transaction]
    public static function transaction(): void
    {
        Common::create([
            'label_id' => '18',
            'vname' => 'Cash Book',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '18',
            'vname' => 'Bank Book',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '19',
            'vname' => 'Payment',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
        Common::create([
            'label_id' => '19',
            'vname' => 'Receipt',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
    #endregion
}
