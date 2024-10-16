<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FixNipColumn extends Migration
{
    public function up()
    {
        // Step 1: Check if the unique constraint exists before trying to remove it
        if (Schema::hasTable('users')) {
            $indexExists = collect(DB::select("SHOW INDEXES FROM users WHERE Key_name = 'users_nip_unique'"))->isNotEmpty();
            
            if ($indexExists) {
                Schema::table('users', function (Blueprint $table) {
                    $table->dropUnique('users_nip_unique');
                });
            }
        }

        // Step 2: Update empty strings to NULL
        DB::table('users')->where('nip', '')->update(['nip' => null]);

        // Step 3: Generate unique values for NULL nip
        $users = DB::table('users')->whereNull('nip')->get();
        foreach ($users as $user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['nip' => 'NIP' . str_pad($user->id, 8, '0', STR_PAD_LEFT)]);
        }

        // Step 4: Add the unique constraint
        Schema::table('users', function (Blueprint $table) {
            $table->unique('nip');
        });
    }

    public function down()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropUnique('users_nip_unique');
            });
        }
    }
}