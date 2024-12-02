<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_payroll', function (Blueprint $table) {
            $table->bigIncrements('id_log', 8);
            $table->bigInteger('id_admin_payroll_perusahaan')->unsigned();
            $table->foreign('id_admin_payroll_perusahaan')->references('id_admin_payroll_perusahaan')->on('admin_payroll_perusahaan')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_payroll_admin')->unsigned();
            $table->foreign('id_payroll_admin')->references('id_payroll_admin')->on('payroll_admin')->onUpdate('cascade')->onDelete('cascade');
            $table->string('pesan_log', 100);
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
        Schema::dropIfExists('log_payroll');
    }
}
