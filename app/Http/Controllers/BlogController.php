<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Data dummy untuk blog posts
        $posts = collect([
            [
                'id' => 1,
                'title' => 'Memulai Perjalanan dengan Laravel',
                'summary' => 'Laravel adalah framework PHP yang powerful dan elegant untuk pengembangan web modern.',
                'content' => 'Laravel menyediakan berbagai fitur yang memudahkan developer dalam membangun aplikasi web. Dengan sintaks yang ekspresif dan dokumentasi yang lengkap, Laravel menjadi pilihan utama untuk banyak developer.',
                'created_at' => '2024-01-15'
            ],
            [
                'id' => 2,
                'title' => 'Tips dan Trik PHP untuk Pemula',
                'summary' => 'Kumpulan tips berguna untuk memulai programming dengan bahasa PHP.',
                'content' => 'PHP adalah bahasa pemrograman yang sangat populer untuk pengembangan web. Berikut adalah beberapa tips yang dapat membantu pemula dalam mempelajari PHP.',
                'created_at' => '2024-01-10'
            ],
            [
                'id' => 3,
                'title' => 'Database Design Best Practices',
                'summary' => 'Panduan lengkap untuk merancang database yang efisien dan scalable.',
                'content' => 'Merancang database yang baik adalah fondasi dari aplikasi yang sukses. Artikel ini akan membahas berbagai best practices dalam database design.',
                'created_at' => '2024-01-05'
            ],
            [
                'id' => 4,
                'title' => 'Frontend vs Backend Development',
                'summary' => 'Memahami perbedaan dan peran masing-masing dalam pengembangan web.',
                'content' => 'Dalam pengembangan web, terdapat dua area utama: frontend dan backend. Keduanya memiliki peran yang berbeda namun saling melengkapi.',
                'created_at' => '2024-01-01'
            ],
            [
                'id' => 5,
                'title' => 'Keamanan Web: Dasar-dasar yang Harus Diketahui',
                'summary' => 'Prinsip-prinsip dasar keamanan web yang wajib dipahami developer.',
                'content' => 'Keamanan web adalah aspek yang sangat penting dalam pengembangan aplikasi. Artikel ini membahas dasar-dasar keamanan yang harus dipahami setiap developer.',
                'created_at' => '2023-12-28'
            ]
        ]);

        // Implementasi pagination sederhana
        $perPage = 3;
        $currentPage = request('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        
        $paginatedPosts = $posts->slice($offset, $perPage);
        $totalPages = ceil($posts->count() / $perPage);

        return view('pages.blog.index', compact('paginatedPosts', 'currentPage', 'totalPages'));
    }

    public function show($id)
    {
        // Data dummy untuk blog post detail
        $posts = collect([
            [
                'id' => 1,
                'title' => 'Memulai Perjalanan dengan Laravel',
                'summary' => 'Laravel adalah framework PHP yang powerful dan elegant untuk pengembangan web modern.',
                'content' => 'Laravel menyediakan berbagai fitur yang memudahkan developer dalam membangun aplikasi web. Dengan sintaks yang ekspresif dan dokumentasi yang lengkap, Laravel menjadi pilihan utama untuk banyak developer. Framework ini dilengkapi dengan ORM Eloquent yang memudahkan interaksi dengan database, sistem routing yang fleksibel, dan berbagai tool lainnya yang mempercepat proses development.',
                'created_at' => '2024-01-15'
            ],
            [
                'id' => 2,
                'title' => 'Tips dan Trik PHP untuk Pemula',
                'summary' => 'Kumpulan tips berguna untuk memulai programming dengan bahasa PHP.',
                'content' => 'PHP adalah bahasa pemrograman yang sangat populer untuk pengembangan web. Berikut adalah beberapa tips yang dapat membantu pemula dalam mempelajari PHP: 1) Mulai dengan syntax dasar, 2) Pelajari konsep OOP, 3) Praktik dengan project kecil, 4) Gunakan framework seperti Laravel, 5) Selalu update dengan versi terbaru.',
                'created_at' => '2024-01-10'
            ],
            [
                'id' => 3,
                'title' => 'Database Design Best Practices',
                'summary' => 'Panduan lengkap untuk merancang database yang efisien dan scalable.',
                'content' => 'Merancang database yang baik adalah fondasi dari aplikasi yang sukses. Beberapa best practices: 1) Normalisasi data untuk menghindari redundansi, 2) Gunakan index dengan bijak, 3) Tentukan primary key dan foreign key dengan tepat, 4) Buat naming convention yang konsisten, 5) Pertimbangkan scalability dari awal.',
                'created_at' => '2024-01-05'
            ],
            [
                'id' => 4,
                'title' => 'Frontend vs Backend Development',
                'summary' => 'Memahami perbedaan dan peran masing-masing dalam pengembangan web.',
                'content' => 'Frontend development fokus pada user interface dan user experience, menggunakan teknologi seperti HTML, CSS, dan JavaScript. Backend development menangani server-side logic, database management, dan API development menggunakan bahasa seperti PHP, Python, atau Node.js. Keduanya bekerja sama untuk menciptakan aplikasi web yang complete.',
                'created_at' => '2024-01-01'
            ],
            [
                'id' => 5,
                'title' => 'Keamanan Web: Dasar-dasar yang Harus Diketahui',
                'summary' => 'Prinsip-prinsip dasar keamanan web yang wajib dipahami developer.',
                'content' => 'Keamanan web mencakup berbagai aspek: 1) Input validation untuk mencegah SQL injection, 2) Authentication dan authorization yang proper, 3) HTTPS untuk enkripsi data, 4) Protection terhadap XSS attacks, 5) Regular security updates, 6) Backup data secara berkala. Setiap developer harus memahami dan mengimplementasikan prinsip-prinsip ini.',
                'created_at' => '2023-12-28'
            ]
        ]);

        $post = $posts->firstWhere('id', (int)$id);

        if (!$post) {
            abort(404);
        }

        return view('pages.blog.show', compact('post'));
    }
}
