<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTokenTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users_token', function (Blueprint $table) {
            $table->increments('token_id');
            $table->integer('user_id', false, TRUE);
            $table->addColumn('text', 'api_token');
            $table->addColumn('text', 'social_media_type');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->index('user_id');
        });
        DB::statement('ALTER TABLE `users_token` ADD FULLTEXT `api_token` (`api_token`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users_token');
    }

}
