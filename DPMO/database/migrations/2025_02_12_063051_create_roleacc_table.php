<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the roleacc table
        Schema::create('roleacc', function (Blueprint $table) {
            $table->id();
            $table->string('rolecode', 250);
            $table->string('roledesc', 500);
            $table->integer('config')->default(0);
            $table->integer('dept')->default(0);
            $table->integer('role')->default(0);
            $table->integer('mguser')->default(0);
            $table->integer('log')->default(0);
            $table->timestamps();
        });

        // Create an audit log table for roleacc actions
        Schema::create('roleacc_audit', function (Blueprint $table) {
            $table->id();
            $table->string('action'); // INSERT, UPDATE, DELETE
            $table->unsignedBigInteger('roleacc_id')->nullable();
            $table->string('rolecode', 250)->nullable();
            $table->string('roledesc', 500)->nullable();
            $table->integer('config')->nullable();
            $table->integer('dept')->nullable();
            $table->integer('role')->nullable();
            $table->integer('mguser')->nullable();
            $table->integer('log')->nullable();
            $table->timestamp('action_time')->useCurrent();
        });

        // Create the INSERT trigger
        DB::unprepared("
            CREATE TRIGGER roleacc_after_insert
            AFTER INSERT ON roleacc
            FOR EACH ROW
            BEGIN
                INSERT INTO roleacc_audit (action, roleacc_id, rolecode, roledesc, config, dept, role, mguser, log, action_time)
                VALUES ('INSERT', NEW.id, NEW.rolecode, NEW.roledesc, NEW.config, NEW.dept, NEW.role, NEW.mguser, NEW.log, NOW());
            END;
        ");

        // Create the UPDATE trigger
        DB::unprepared("
            CREATE TRIGGER roleacc_after_update
            AFTER UPDATE ON roleacc
            FOR EACH ROW
            BEGIN
                INSERT INTO roleacc_audit (action, roleacc_id, rolecode, roledesc, config, dept, role, mguser, log, action_time)
                VALUES ('UPDATE', NEW.id, NEW.rolecode, NEW.roledesc, NEW.config, NEW.dept, NEW.role, NEW.mguser, NEW.log, NOW());
            END;
        ");

        // Create the DELETE trigger
        DB::unprepared("
            CREATE TRIGGER roleacc_after_delete
            AFTER DELETE ON roleacc
            FOR EACH ROW
            BEGIN
                INSERT INTO roleacc_audit (action, roleacc_id, rolecode, roledesc, config, dept, role, mguser, log, action_time)
                VALUES ('DELETE', OLD.id, OLD.rolecode, OLD.roledesc, OLD.config, OLD.dept, OLD.role, OLD.mguser, OLD.log, NOW());
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop triggers first
        DB::unprepared("DROP TRIGGER IF EXISTS roleacc_after_insert;");
        DB::unprepared("DROP TRIGGER IF EXISTS roleacc_after_update;");
        DB::unprepared("DROP TRIGGER IF EXISTS roleacc_after_delete;");

        // Drop tables
        Schema::dropIfExists('roleacc_audit');
        Schema::dropIfExists('roleacc');
    }
};
