<?php

namespace Database\Seeders;

use App\Models\InternetPackage;
use Illuminate\Database\Seeder;

class InternetPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InternetPackage::create([
            'name' => 'Basic',
            'speed_mbps' => 10,
            'price' => 150000,
            'description' => 'Cocok untuk browsing, sosial media, & chat',
            'features' => [
                'Kecepatan 10 Mbps',
                'Unlimited kuota',
                'Support 24/7',
                'Free instalasi'
            ],
            'is_popular' => false,
            'is_active' => true
        ]);

        InternetPackage::create([
            'name' => 'Family', 
            'speed_mbps' => 20,
            'price' => 250000,
            'description' => 'Cocok untuk streaming, meeting online, & belajar',
            'features' => [
                'Kecepatan 20 Mbps',
                'Unlimited kuota',
                'Support 24/7',
                'Free instalasi',
                'Free router WiFi'
            ],
            'is_popular' => true,
            'is_active' => true
        ]);

        InternetPackage::create([
            'name' => 'Premium',
            'speed_mbps' => 50,
            'price' => 400000,
            'description' => 'Cocok untuk gaming, usaha kecil, & streaming 4K',
            'features' => [
                'Kecepatan 50 Mbps',
                'Unlimited kuota',
                'Support 24/7',
                'Free instalasi',
                'Free router WiFi Premium',
                'Prioritas jaringan'
            ],
            'is_popular' => false,
            'is_active' => true
        ]);
    }
}
