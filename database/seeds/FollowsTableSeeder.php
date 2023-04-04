<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([
            ['post' => '1つ目の投稿になります'],
            ['post' => 'Laravelの投稿ページを作りました'],
            ['post' => '投稿についてのCRUD一式を作っています'],
            ['post' => 'MVCの役割を体験中です'],
            ['post' => '初期レコードがこれで終わりです。']
        ]);
    }
}
