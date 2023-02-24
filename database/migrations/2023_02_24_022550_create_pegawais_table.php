<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->uuid('uuid')->default(DB::raw('uuid()'))->primary();
            $table->uuid('parent_uuid')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('department_code', 25)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('empl_id', 25)->nullable();
            $table->date("join_date")->nullable();
            $table->string('ext_no', 5)->nullable();
            $table->timestamps();
            $table->softDeletes()->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
        });

        // generate uuid and insert it into the table
        $uuid = Uuid::uuid4();
        DB::table('pegawais')->insert(['uuid' => $uuid->toString(), 'uuid' => 'data']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
