<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Business', 'Food', 'Lifestyle', 'World News'];

        foreach($categories as $category){
            $blog_category = BlogCategory::create([
                'name' => $category,
                'description' => $category.' is a blog category. learn more and explore'
            ]);

            $blog = Blog::factory()->create(['blog_category_id' => $blog_category->id]);
            
            $blog_image = BlogImage::create([
                'image_url' => json_encode([UploadedFile::fake()->image('image1.jpg')->getClientOriginalName()]),
                'blog_id' => $blog->id
            ]);
        }
    }
}
