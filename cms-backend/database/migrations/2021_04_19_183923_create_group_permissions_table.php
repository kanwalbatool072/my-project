<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_permissions', function (Blueprint $table) {
            $table->increments('id');
           $table->integer('group_id')->unsigned()->nullable();
           $table->integer('permission_id')->unsigned()->nullable();
           $table->foreign('group_id')
                ->references('id')
                ->on('groups');
           $table->foreign('permission_id')
                ->references('id')
                ->on('permissions');
            
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
        Schema::dropIfExists('group_permissions');
    }
}
