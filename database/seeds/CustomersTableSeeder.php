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
                'username' => '山姥切国広',
                'mail' => 'manbachan@mail.com',
                'password' => Hash::make('manba'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => '俺は偽物なんかじゃない。',
                'images' => 'manba.png',
                'created_at' => '2021-3-2 18:35:48',
                'updated_at' => '2021-3-2 18:35:48',
            ],
            [
                'username' => '鶴丸国永',
                'mail' => 'tsurusan@mail.com',
                'password' => Hash::make('white'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => '驚きの白さだぜ。',
                'images' => 'tsuru.png',
                'created_at' => '2021-2-1 11:30:03',
                'updated_at' => '2021-3-3 08:17:22',
            ],
            [
                'username' => '薬研藤四郎',
                'mail' => 'tsukamade@mail.com',
                'password' => Hash::make('yageniki'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => 'ま、なかよくやろうや大将。',
                'images' => 'yagen.png',
                'created_at' => '2021-2-1 10:30:03',
                'updated_at' => '2021-3-3 08:12:20',
            ],
            [
                'username' => '蜻蛉切',
                'mail' => 'tonbokiri@mail.com',
                'password' => Hash::make('bonji'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => '武功を立てるは武人の役目。',
                'images' => 'tonbo.png',
                'created_at' => '2021-2-1 10:45:03',
                'updated_at' => '2021-3-3 21:03:43',
            ],
        ]);
    }
}
