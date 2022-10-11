<?php

namespace Database\Seeders;

use App\Models\ReportReason;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReportReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reason = [
            [
                'reason' =>  'Breaks Terms of Service',
            ],
            [
                'reason' =>  'Contains tags not related to the post',
            ],
            [
                'reason' =>  'Title,description or tags are offensive',
            ],
            [
                'reason' => 'Other',
            ],
        ];

        foreach($reason as $key => $value) {
            ReportReason::create($value);
        }
    }
}
