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
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('category_id')->nullable(false)->comment('カテゴリID');
            $table->string('title')->nullable(false)->comment('タイトル');
            $table->string('body')->nullable(false)->comment('本文');
            $table->date('posted_date')->comment('投稿日');
            $table->timestamps();
            $table->softDeletes();
            // ALTER 文を実行しテーブルにコメントを設定
            DB::statement("ALTER TABLE flights COMMENT 'お知らせテーブル'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices');
    }
};
