<?php

namespace Database\Seeders;

use App\Models\ServiceArea;
use Illuminate\Database\Seeder;

class ServiceAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            ['area_name' => 'Bekasi Timur', 'is_covered' => true, 'coverage_quality' => 'excellent'],
            ['area_name' => 'Bekasi Barat', 'is_covered' => true, 'coverage_quality' => 'excellent'],
            ['area_name' => 'Bekasi Utara', 'is_covered' => true, 'coverage_quality' => 'good'],
            ['area_name' => 'Bekasi Selatan', 'is_covered' => true, 'coverage_quality' => 'good'],
            ['area_name' => 'Mustika Jaya', 'is_covered' => true, 'coverage_quality' => 'excellent'],
            ['area_name' => 'Pondok Melati', 'is_covered' => true, 'coverage_quality' => 'good'],
            ['area_name' => 'Jati Asih', 'is_covered' => true, 'coverage_quality' => 'good'],
            ['area_name' => 'Jati Sampurna', 'is_covered' => true, 'coverage_quality' => 'fair'],
            ['area_name' => 'Medan Satria', 'is_covered' => true, 'coverage_quality' => 'good'],
            ['area_name' => 'Bantargebang', 'is_covered' => true, 'coverage_quality' => 'fair'],
        ];

        foreach ($areas as $area) {
            ServiceArea::create($area);
        }
    }
}
