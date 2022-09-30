<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reports = [
            [
                'report' =>  'Breaks Terms of Service',
            ],
            [
                'report' =>  'Contains tags not related to the post',
            ],
            [
                'report' =>  'Title,description or tags are offensive',
            ],
            [
                'report' => 'Other',
            ],
        ];

        foreach($reports as $key => $value) {
            Report::create($value);
        }
    }
}
