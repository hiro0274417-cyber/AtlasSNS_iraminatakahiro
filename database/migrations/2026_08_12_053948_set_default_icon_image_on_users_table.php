<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    DB::statement(
        "UPDATE users SET icon_image = 'icon1.png'
         WHERE icon_image IS NULL OR icon_image = ''"
    );

    DB::statement(
        "ALTER TABLE users MODIFY icon_image VARCHAR(255) NOT NULL DEFAULT 'icon1.png'"
    );
}



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement(
            "ALTER TABLE users MODIFY icon_image VARCHAR(255) NULL DEFAULT NULL"
        );
    }
};
