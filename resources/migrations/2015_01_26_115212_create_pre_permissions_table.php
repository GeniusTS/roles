<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_permissions', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned()->default(0)->comment('权限id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->integer('pre_permission_id')->unsigned()->default(0)->comment('前置权限id');
            $table->foreign('pre_permission_id')->references('id')->on('permissions')->onDelete('cascade');
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
        Schema::drop('pre_permissions');
    }
}
