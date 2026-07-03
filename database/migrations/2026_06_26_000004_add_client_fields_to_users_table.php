<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('business_name')->nullable()->after('name');
            $table->string('business_category')->nullable()->after('business_name');
            $table->string('pic_name')->nullable()->after('business_category');
            $table->string('phone')->nullable()->after('pic_name');
            $table->text('address')->nullable()->after('phone');
            $table->string('status')->default('pending')->after('address');
            $table->softDeletes()->after('updated_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['business_name', 'business_category', 'pic_name', 'phone', 'address', 'status']);
            $table->dropSoftDeletes();
        });
    }
};
