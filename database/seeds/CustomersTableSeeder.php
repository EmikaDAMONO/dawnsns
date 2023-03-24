<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; //下記記述のHash::makeを使用するための記述

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            DB::table('users')->insert([
            [
                'username' => '花子T',
                'mail' => 'anpan@mail.com',
                'password' => Hash::make('anpanl0ve'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => '身体はあんパンでできている。',
                'images' => 'dawn.png',
                'created_at' => '2021-3-2 18:35:48',
                'modified_at' => '2021-3-2 18:35:48',
            ],
            [
                'username' => 'スグル',
                'mail' => 'suguru@mail.com',
                'password' => Hash::make('anpanl0ve'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => 'オッサンではない',
                'images' => 'dawn.png',
                'created_at' => '2021-2-1 11:30:03',
                'modified_at' => '2021-3-3 08:17:22',
            ],
            [
                'username' => '城ヶ崎弟',
                'mail' => 'manabu.j@mail.com',
                'password' => Hash::make('anpanl0ve'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => '浮上率低め。',
                'images' => 'dawn.png',
                'created_at' => '2021-2-1 10:30:03',
                'modified_at' => '2021-3-3 08:12:20',
            ],
            [
                'username' => 'キャシー',
                'mail' => 'c.nyan@mail.com',
                'password' => Hash::make('anpanl0ve'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => 'にゃんこの画像bot',
                'images' => 'dawn.png',
                'created_at' => '2021-2-1 10:45:03',
                'modified_at' => '2021-3-3 21:03:43',
            ],
            [
                'username' => 'ベティー',
                'mail' => 'cbcb@mail.com',
                'password' => Hash::make('anpanl0ve'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => 'お仕事はDMかメールで。次→M.J.collection',
                'images' => 'dawn.png',
                'created_at' => '2021-2-1 10:45:03',
                'modified_at' => '2021-3-3 00:10:52',
            ],
        ]);
    }
}
