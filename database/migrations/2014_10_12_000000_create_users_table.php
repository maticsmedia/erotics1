<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('location')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        User::create(['name' => 'Trojan Horse','email' => 'trojan@ero.co.tz','password' => Hash::make('123'),'email_verified_at'=>'2023-12-02 17:04:58','created_at' => now(),]);
        User::create(['name' => 'Fikiri SM','email' => 'fikirism@ero.co.tz','password' => Hash::make('13'),'email_verified_at'=>'2023-12-02 17:04:58','created_at' => now(),]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
