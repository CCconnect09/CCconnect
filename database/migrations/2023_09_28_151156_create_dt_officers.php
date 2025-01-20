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
        Schema::create('dt_officers', function (Blueprint $table) {
            $table->id("id_officer");

            $table->unsignedBigInteger("id_user")->unique();
            $table->string('nip', 18)->unique()->nullable();
            $table->enum('flag_active', ["Y", "N"]);

            $table->foreign("id_user")
                ->references("id_user")
                ->on("mst_users")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->timestamps();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dt_officers');
    }
};