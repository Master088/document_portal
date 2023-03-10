<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'created_by');
            $table->tinyInteger('is_archive')->default(0);
            $table->foreignIdFor(\App\Models\User::class, 'last_modified_id');
            $table->string('name', 100);
            $table->string('type', 20);
            // change this to foriegn key later
            $table->bigInteger('parent');
            $table->bigInteger('doc_left');
            $table->bigInteger('doc_right');
            $table->timestamp('date_modified')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
