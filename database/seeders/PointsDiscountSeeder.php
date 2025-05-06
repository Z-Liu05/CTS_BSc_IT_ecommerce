<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointsDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('points_discounts')->insert([
            [
                'points_needed' => 1000,
                'discount_percent' => 10,
                'stripe_discount_id' => 'V6b7MHlI',
                'created_at' => Carbon::now(),
            ],
            [
                'points_needed' => 1500,
                'discount_percent' => 15,
                'stripe_discount_id' => 'GQrJKxGr',
                'created_at' => Carbon::now(),
            ],
            [
                'points_needed' => 2000,
                'discount_percent' => 20,
                'stripe_discount_id' => 'DHwxzYQV',
                'created_at' => Carbon::now(),
            ],
            [
                'points_needed' => 2500,
                'discount_percent' => 25,
                'stripe_discount_id' => 'WssqpEEr',
                'created_at' => Carbon::now(),
            ],
            [
                'points_needed' => 3000,
                'discount_percent' => 30,
                'stripe_discount_id' => 'JDcKIKgS',
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}

