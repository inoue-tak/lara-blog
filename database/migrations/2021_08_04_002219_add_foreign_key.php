<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users'); //usersテーブルのidを参照したuser_idである外部キーである
            $table->foreign('post_id')->references('id')->on('posts');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //

            $table->dropForeign('comments_user_id_foreign');
            $table->dropForeign('comments_post_id_foreign');

        });
    }
}
