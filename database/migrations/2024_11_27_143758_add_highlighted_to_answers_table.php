<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('answers', function (Blueprint $table) {
        $table->boolean('highlighted')->default(false); // Add a default value of false
    });
}

public function down()
{
    Schema::table('answers', function (Blueprint $table) {
        $table->dropColumn('highlighted');
    });
}
};
