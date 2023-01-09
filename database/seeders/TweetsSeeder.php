<?php

namespace Database\Seeders;

//runメソッドに追加したいデータを記述
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Tweet;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //TweetSeederを作成する
    public function run()
    
    {
        Tweet::factory()->count(10)->create(); 

        // DB::table('tweets')->insert([
        //     'content' => Str::random(100),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }
}

