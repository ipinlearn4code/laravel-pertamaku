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
            ['area' => 'Bekasi Timur', 'name' => 'Kecamatan Bekasi Timur', 'district' => 'Bekasi Timur', 'status' => 'active', 'description' => 'Area dengan coverage excellent'],
            ['area' => 'Bekasi Barat', 'name' => 'Kecamatan Bekasi Barat', 'district' => 'Bekasi Barat', 'status' => 'active', 'description' => 'Area dengan coverage excellent'],
            ['area' => 'Bekasi Utara', 'name' => 'Kecamatan Bekasi Utara', 'district' => 'Bekasi Utara', 'status' => 'active', 'description' => 'Area dengan coverage good'],
            ['area' => 'Bekasi Selatan', 'name' => 'Kecamatan Bekasi Selatan', 'district' => 'Bekasi Selatan', 'status' => 'active', 'description' => 'Area dengan coverage good'],
            ['area' => 'Mustika Jaya', 'name' => 'Kecamatan Mustika Jaya', 'district' => 'Mustika Jaya', 'status' => 'active', 'description' => 'Area dengan coverage excellent'],
            ['area' => 'Pondok Melati', 'name' => 'Kecamatan Pondok Melati', 'district' => 'Pondok Melati', 'status' => 'active', 'description' => 'Area dengan coverage good'],
            ['area' => 'Jati Asih', 'name' => 'Kecamatan Jati Asih', 'district' => 'Jati Asih', 'status' => 'active', 'description' => 'Area dengan coverage good'],
            ['area' => 'Jati Sampurna', 'name' => 'Kecamatan Jati Sampurna', 'district' => 'Jati Sampurna', 'status' => 'planned', 'description' => 'Area dengan coverage fair'],
            ['area' => 'Medan Satria', 'name' => 'Kecamatan Medan Satria', 'district' => 'Medan Satria', 'status' => 'active', 'description' => 'Area dengan coverage good'],
            ['area' => 'Bantargebang', 'name' => 'Kecamatan Bantargebang', 'district' => 'Bantargebang', 'status' => 'maintenance', 'description' => 'Area dengan coverage fair'],
            ['area' => 'Tambelang', 'rt' => '01', 'rw' => '05', 'name' => 'Perumahan Tambelang Indah', 'district' => 'Bekasi Utara', 'status' => 'active', 'description' => 'Coverage area RT 01/RW 05'],
            ['area' => 'Harapan Indah', 'rt' => '02', 'rw' => '10', 'name' => 'Cluster Harapan Indah', 'district' => 'Bekasi Utara', 'status' => 'active', 'description' => 'Coverage area RT 02/RW 10'],
            ['area' => 'Galaxy City', 'rt' => '03', 'rw' => '08', 'name' => 'Perumahan Galaxy City', 'district' => 'Bekasi Selatan', 'status' => 'active', 'description' => 'Coverage area RT 03/RW 08'],
            ['area' => 'Kemang Pratama', 'rt' => '01', 'rw' => '15', 'name' => 'Cluster Kemang Pratama', 'district' => 'Bekasi Barat', 'status' => 'planned', 'description' => 'Coverage area RT 01/RW 15'],
            ['area' => 'Grand Galaxy Park', 'rt' => '05', 'rw' => '12', 'name' => 'Cluster Grand Galaxy Park', 'district' => 'Bekasi Selatan', 'status' => 'active', 'description' => 'Coverage area RT 05/RW 12'],
            ['area' => 'Villa Nusa Indah', 'rt' => '02', 'rw' => '07', 'name' => 'Perumahan Villa Nusa Indah', 'district' => 'Bekasi Utara', 'status' => 'active', 'description' => 'Coverage area RT 02/RW 07'],
            ['area' => 'Summarecon Bekasi', 'rt' => '01', 'rw' => '20', 'name' => 'Cluster Summarecon Bekasi', 'district' => 'Bekasi Utara', 'status' => 'active', 'description' => 'Coverage area RT 01/RW 20'],
            ['area' => 'Metland Menteng', 'rt' => '04', 'rw' => '18', 'name' => 'Cluster Metland Menteng', 'district' => 'Bekasi Timur', 'status' => 'active', 'description' => 'Coverage area RT 04/RW 18'],
            ['area' => 'Pekayon Jaya', 'rt' => '03', 'rw' => '14', 'name' => 'Perumahan Pekayon Jaya', 'district' => 'Bekasi Selatan', 'status' => 'maintenance', 'description' => 'Coverage area RT 03/RW 14'],
            ['area' => 'Jaka Setia', 'rt' => '02', 'rw' => '11', 'name' => 'Cluster Jaka Setia', 'district' => 'Bekasi Selatan', 'status' => 'active', 'description' => 'Coverage area RT 02/RW 11'],
        ];

        foreach ($areas as $area) {
            ServiceArea::create($area);
        }
    }
}
