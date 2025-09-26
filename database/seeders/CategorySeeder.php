<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama' => 'Undangan', 'keterangan' => 'Surat undangan acara'],
            ['nama' => 'Pengumuman', 'keterangan' => 'Surat pengumuman resmi'],
            ['nama' => 'Nota Dinas', 'keterangan' => 'Nota dinas internal'],
            ['nama' => 'Pemberitahuan', 'keterangan' => 'Surat pemberitahuan'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['nama' => $category['nama']], 
                $category
            );
        }
    }
}