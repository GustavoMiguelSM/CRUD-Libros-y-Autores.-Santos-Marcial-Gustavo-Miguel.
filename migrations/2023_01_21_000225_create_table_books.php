<?php

use App\Models\Author;
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
        Schema::create('table_books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('autor');
            $table ->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('Author');
            $table->integer('release_year')->nullable();
            $table->string('isbn')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_books');
    }
};
