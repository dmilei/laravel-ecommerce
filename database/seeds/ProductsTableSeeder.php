<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $p1 = [
        'name' => 'Learn to build websites in HTML5',
        'slug' => str_slug('Learn to build websites in HTML5'),
        'image' => 'products/book.png',
        'price' => 5000,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
      ];

      $p2 = [
        'name' => 'PHP Development in depth',
        'slug' => str_slug('PHP Development in depth'),
        'image' => 'products/book.png',
        'price' => 2400,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
      ];

      $p3 = [
        'name' => 'Build single page App with Node.JS',
        'slug' => str_slug('Build single page App with Node.JS'),
        'image' => 'products/book.png',
        'price' => 7400,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
      ];

      $p4 = [
        'name' => 'AI and Data Science with Python',
        'slug' => str_slug('AI and Data Science with Python'),
        'image' => 'products/book.png',
        'price' => 9999,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
      ];

      Product::create($p1);
      Product::create($p2);
      Product::create($p3);
      Product::create($p4);
    }
}
