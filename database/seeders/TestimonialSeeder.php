<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Budi',
                'location' => 'Warga Burangkeng',
                'message' => 'Internetnya stabil banget, cocok buat kerja WFH.',
                'email' => 'budi@example.com',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Ibu Sari',
                'location' => 'Warga Tambelang',
                'message' => 'Anak-anak bisa belajar online lancar, harga juga ramah.',
                'email' => 'sari@example.com',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Ahmad',
                'location' => 'Warga Jatibening',
                'message' => 'Gaming jadi lancar, ping rendah. Mantap AlpiNet!',
                'email' => 'ahmad@example.com',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'name' => 'Ibu Nina',
                'location' => 'Warga Pondok Gede',
                'message' => 'Support nya responsif, masalah langsung diatasi. Recommended!',
                'email' => 'nina@example.com',
                'is_published' => false,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
