<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminPayrollPerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_payroll_perusahaan', function (Blueprint $table) {
            $table->bigIncrements('id_admin_payroll_perusahaan', 8);
            $table->string('username', 25);
            $table->string('password');
            $table->timestamp('tgl_buat')->useCurrent();
            $table->timestamp('tgl_update')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_payroll_perusahaan');
    }
}
