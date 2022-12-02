<?php

use App\Models\School;
use App\Models\User;
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
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedBigInteger('code');
            $table->string('first_name');
            $table->string('last_name');
            $table->tinyInteger('grade');
            $table->foreignIdFor(User::class, 'parent_id');
            $table->foreignIdFor(School::class)->nullable();
            $table->boolean('approved')->default(0);
            $table->timestamps();
            $table->primary('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
