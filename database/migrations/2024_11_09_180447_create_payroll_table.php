<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->bigIncrements('id_payroll', 8);
            $table->bigInteger('id_admin_payroll_perusahaan')->unsigned();
            $table->foreign('id_admin_payroll_perusahaan')->references('id_admin_payroll_perusahaan')->on('admin_payroll_perusahaan')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_payroll_admin')->unsigned();
            $table->foreign('id_payroll_admin')->references('id_payroll_admin')->on('payroll_admin')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_perusahaan')->unsigned();
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_karyawan')->unsigned();
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_perusahaan', 25);
            $table->bigInteger('jumlah_sisa_dana_di_bank');
            $table->string('nama_karyawan', 50);
            $table->string('jabatan', 20);
            $table->string('departemen', 20);
            $table->decimal('gaji_pokok', 10, 2);
            $table->decimal('tunjangan_jabatan', 10, 2);
            $table->decimal('lembur', 10, 2);
            $table->decimal('uang_transportasi', 10, 2);
            $table->decimal('uang_makan', 10, 2);
            $table->decimal('bpjs_ketenagakerjaan', 10, 2);
            $table->decimal('pph21', 10, 2);
            $table->decimal('jmlh_gaji', 10, 2);
            $table->string('nama_bank', 15);
            $table->string('no_rekening', 20);
            $table->string('nama_pemilik', 50);
            $table->date('tgl_penggajian');
            $table->string('stat_transaksi', 50);
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
        Schema::dropIfExists('payroll');
    }
}
