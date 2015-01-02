<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPessoa extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_pessoa', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->string('razao_apelido', 255)->nullable();
            $table->string('documento', 14)->unique();
            $table->date('nascimento_fundacao')->nullable();

            if (Schema::hasTable('tb_endereco')) {
                $table->integer('fk_endereco')->nullable()->unsigned();
                $table->foreign('fk_endereco')->references('id')->on('tb_endereco')->onDelete('set null');
            }

            if (Schema::hasTable('tb_contato')) {
                $table->integer('fk_contato')->nullable()->unsigned();
                $table->foreign('fk_contato')->references('id')->on('tb_contato')->onDelete('set null');
            }

            $table->timestamps();
        });

        if (Schema::hasTable('tb_endereco') && !Schema::hasColumn('tb_endereco', 'fk_pessoa')) {
            Schema::table('tb_endereco', function(Blueprint $table) {
                $table->integer('fk_pessoa')->nullable()->unsigned();
                $table->foreign('fk_pessoa')->references('id')->on('tb_pessoa')->onDelete('cascade');
            });
        }

        if (Schema::hasTable('tb_contato') && !Schema::hasColumn('tb_contato', 'fk_pessoa')) {
            Schema::table('tb_contato', function(Blueprint $table) {
                $table->integer('fk_pessoa')->nullable()->unsigned();
                $table->foreign('fk_pessoa')->references('id')->on('tb_pessoa')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        if (Schema::hasColumn('tb_contato', 'fk_pessoa')) {
            Schema::table('tb_contato', function(Blueprint $table) {
                $table->dropForeign('tb_contato_fk_pessoa_foreign');
            });
        }

        if (Schema::hasColumn('tb_endereco', 'fk_pessoa')) {
            Schema::table('tb_endereco', function(Blueprint $table) {
                $table->dropForeign('tb_endereco_fk_pessoa_foreign');
            });
        }

        Schema::drop('tb_pessoa');
    }

}
