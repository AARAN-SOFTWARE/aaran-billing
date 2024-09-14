<?php

namespace Aaran\Transaction\Database\Factories;

use Aaran\Common\Models\Common;
use Aaran\Master\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{

    public function definition(): array
    {
        $users = User::pluck('id');
        $orders = Order::pluck('id');
        $trans = Common::pluck('id')->where('label_id', '=', '19');
        $receipttypes = Common::pluck('id')->where('label_id', '=', '14');
        $modes = Common::pluck('id')->where('label_id', '=', '20');


        return [
            'acyear' => '2024_25',
            'company_id' => 1,
            'contact_id' => 1,
            'order_id' => $orders->random(),
            'trans_type_id' => $trans->random(),
            'mode_id' => $modes->random(),
            'vname' => $this->faker->randomNumber(),
            'receipttype_id_' => $receipttypes->random(),
            'remarks' => $this->faker->realText(),
            'chq_no' => $this->faker->randomNumber(),
            'chq_date' => $this->faker->date(),
            'bank_id' => $banks->random(),
            'deposit_on' => $this->faker->date(),
            'realised_on' => $this->faker->date(),
            'against_id' => $this->faker->randomNumber(),
            'ref_no' => $this->faker->randomNumber(),
            'ref_amount' => $this->faker->randomNumber(),
            'user_id' => $users->random(),
            'active_id' => $this->faker->randomNumber(),

        ];
    }
}
