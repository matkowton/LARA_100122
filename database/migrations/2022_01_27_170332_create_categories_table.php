<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
        });

        DB::table('categories')
            ->insert([
                ['name' => 'Sport'],
                ['name' => 'Health']
            ]);

        Schema::table('news', function (Blueprint $table) {
            $table->bigInteger('category_id')
                ->nullable(true)
                ->default(null)
                ->unsigned()
                ->index();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('news', ['category_id']);
        Schema::dropIfExists('categories');
    }
}
