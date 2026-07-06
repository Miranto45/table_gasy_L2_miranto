<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('zones', function (Blueprint $t) {
            $t->id();
            $t->string('nom');
            $t->string('description')->nullable();
            $t->timestamps();
        });

        Schema::create('tables', function (Blueprint $t) {
            $t->id();
            $t->foreignId('zone_id')->constrained()->cascadeOnDelete();
            $t->string('numero');
            $t->integer('capacite')->default(2);
            $t->enum('statut', ['libre', 'reservee', 'occupee', 'a_nettoyer', 'hors_service'])->default('libre');
            $t->integer('pos_x')->default(10);
            $t->integer('pos_y')->default(10);
            $t->timestamps();
        });

        Schema::create('clients', function (Blueprint $t) {
            $t->id();
            $t->string('nom');
            $t->string('prenom');
            $t->string('telephone')->nullable();
            $t->string('email')->nullable();
            $t->timestamps();
        });

        Schema::create('reservations', function (Blueprint $t) {
            $t->id();
            $t->foreignId('client_id')->constrained()->cascadeOnDelete();
            $t->foreignId('table_id')->constrained()->cascadeOnDelete();
            $t->dateTime('date_reservation');
            $t->integer('nb_personnes')->default(1);
            $t->string('notes')->nullable();
            $t->timestamps();
        });

        Schema::create('historique_statuts_tables', function (Blueprint $t) {
            $t->id();
            $t->foreignId('table_id')->constrained()->cascadeOnDelete();
            $t->string('ancien_statut')->nullable();
            $t->string('nouveau_statut');
            $t->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historique_statuts_tables');
        Schema::dropIfExists('reservations');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('tables');
        Schema::dropIfExists('zones');
    }
};
