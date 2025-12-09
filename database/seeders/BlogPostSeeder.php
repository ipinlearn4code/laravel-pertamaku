<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have a user for author
        $author = User::first() ?? User::factory()->create([
            'name' => 'Admin AlpiNet',
            'email' => 'admin@alpinet.id',
            'password' => bcrypt('password')
        ]);

        $posts = [
            [
                'title' => 'Memulai Perjalanan dengan Laravel',
                'summary' => 'Laravel adalah framework PHP yang powerful dan elegant untuk pengembangan web modern.',
                'content' => 'Laravel menyediakan berbagai fitur yang memudahkan developer dalam membangun aplikasi web. Dengan sintaks yang ekspresif dan dokumentasi yang lengkap, Laravel menjadi pilihan utama untuk banyak developer. Framework ini dilengkapi dengan ORM Eloquent yang memudahkan interaksi dengan database, sistem routing yang fleksibel, dan berbagai tool lainnya yang mempercepat proses development.',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Tips dan Trik PHP untuk Pemula',
                'summary' => 'Kumpulan tips berguna untuk memulai programming dengan bahasa PHP.',
                'content' => 'PHP adalah bahasa pemrograman yang sangat populer untuk pengembangan web. Berikut adalah beberapa tips yang dapat membantu pemula dalam mempelajari PHP: 1) Mulai dengan syntax dasar, 2) Pelajari konsep OOP, 3) Praktik dengan project kecil, 4) Gunakan framework seperti Laravel, 5) Selalu update dengan versi terbaru.',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Database Design Best Practices',
                'summary' => 'Panduan lengkap untuk merancang database yang efisien dan scalable.',
                'content' => 'Merancang database yang baik adalah fondasi dari aplikasi yang sukses. Beberapa best practices: 1) Normalisasi data untuk menghindari redundansi, 2) Gunakan index dengan bijak, 3) Tentukan primary key dan foreign key dengan tepat, 4) Buat naming convention yang konsisten, 5) Pertimbangkan scalability dari awal.',
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Frontend vs Backend Development',
                'summary' => 'Memahami perbedaan dan peran masing-masing dalam pengembangan web.',
                'content' => 'Frontend development fokus pada user interface dan user experience, menggunakan teknologi seperti HTML, CSS, dan JavaScript. Backend development menangani server-side logic, database management, dan API development menggunakan bahasa seperti PHP, Python, atau Node.js. Keduanya bekerja sama untuk menciptakan aplikasi web yang complete.',
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Keamanan Web: Dasar-dasar yang Harus Diketahui',
                'summary' => 'Prinsip-prinsip dasar keamanan web yang wajib dipahami developer.',
                'content' => 'Keamanan web mencakup berbagai aspek: 1) Input validation untuk mencegah SQL injection, 2) Authentication dan authorization yang proper, 3) HTTPS untuk enkripsi data, 4) Protection terhadap XSS attacks, 5) Regular security updates, 6) Backup data secara berkala. Setiap developer harus memahami dan mengimplementasikan prinsip-prinsip ini.',
                'published_at' => now()->subDays(25),
            ]
        ];

        foreach ($posts as $post) {
            BlogPost::create([
                'title' => $post['title'],
                'summary' => $post['summary'],
                'content' => $post['content'],
                'author_id' => $author->id,
                'published_at' => $post['published_at'],
                'is_published' => true,
            ]);
        }
    }
}
