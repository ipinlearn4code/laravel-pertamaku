<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInfo::create([
            'type' => 'address',
            'label' => 'Alamat Kantor',
            'value' => 'Jl. Raya Bekasi No. 123, Bekasi Timur, Bekasi 17113',
            'is_primary' => true,
            'is_active' => true
        ]);

        ContactInfo::create([
            'type' => 'phone',
            'label' => 'Telepon',
            'value' => '021-12345678',
            'is_primary' => true,
            'is_active' => true
        ]);

        ContactInfo::create([
            'type' => 'whatsapp',
            'label' => 'WhatsApp',
            'value' => '+6281234567890',
            'is_primary' => true,
            'is_active' => true
        ]);

        ContactInfo::create([
            'type' => 'email',
            'label' => 'Email',
            'value' => 'info@alpinet.id',
            'is_primary' => true,
            'is_active' => true
        ]);

        ContactInfo::create([
            'type' => 'hours',
            'label' => 'Jam Operasional',
            'value' => 'Senin - Jumat: 08:00 - 17:00\nSabtu: 09:00 - 15:00\nMinggu: Tutup',
            'is_primary' => true,
            'is_active' => true
        ]);
    }
}
