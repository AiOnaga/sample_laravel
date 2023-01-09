<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // 追加するテーブルの指定
    public function up()
    {
        //tweetテーブルを作成
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //upの逆？よくわからない
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
};
