<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title','50')
                ->unique()
                ->nullable(false)
                ->comment('Заголовок новости');
            $table->text('content')
                ->nullable();
            $table->string('source', 100)
                ->nullable(true);
            $table->dateTime('publish_date')
                ->nullable('true')
                ->index();
            $table->string('image', 100)
                ->nullable(true);
            $table->softDeletes();
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
        Schema::dropIfExists('news');
    }
}
