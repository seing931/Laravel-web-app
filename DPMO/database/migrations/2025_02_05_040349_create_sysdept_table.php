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
        Schema::create('sysdept', function (Blueprint $table) {
            $table->id();
            $table->string('deptcode', 250);
            $table->string('deptdesc', 500);
            $table->timestamps();
        });

        // Create an audit log table
        Schema::create('sysdept_audit', function (Blueprint $table) {
            $table->id();
            $table->string('action'); // INSERT, UPDATE, DELETE
            $table->string('deptcode', 250)->nullable();
            $table->string('deptdesc', 500)->nullable();
            $table->timestamp('action_time')->useCurrent();
        });

        // Create the INSERT trigger
        DB::unprepared("
            CREATE TRIGGER sysdept_after_insert
            AFTER INSERT ON sysdept
            FOR EACH ROW
            BEGIN
                INSERT INTO sysdept_audit (action, deptcode, deptdesc, action_time)
                VALUES ('INSERT', NEW.deptcode, NEW.deptdesc, NOW());
            END;
        ");

        // Create the UPDATE trigger
        DB::unprepared("
            CREATE TRIGGER sysdept_after_update
            AFTER UPDATE ON sysdept
            FOR EACH ROW
            BEGIN
                INSERT INTO sysdept_audit (action, deptcode, deptdesc, action_time)
                VALUES ('UPDATE', NEW.deptcode, NEW.deptdesc, NOW());
            END;
        ");

        // Create the DELETE trigger
        DB::unprepared("
            CREATE TRIGGER sysdept_after_delete
            AFTER DELETE ON sysdept
            FOR EACH ROW
            BEGIN
                INSERT INTO sysdept_audit (action, deptcode, deptdesc, action_time)
                VALUES ('DELETE', OLD.deptcode, OLD.deptdesc, NOW());
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop triggers
        DB::unprepared("DROP TRIGGER IF EXISTS sysdept_after_insert;");
        DB::unprepared("DROP TRIGGER IF EXISTS sysdept_after_update;");
        DB::unprepared("DROP TRIGGER IF EXISTS sysdept_after_delete;");

        // Drop tables
        Schema::dropIfExists('sysdept_audit');
        Schema::dropIfExists('sysdept');
    }
};
