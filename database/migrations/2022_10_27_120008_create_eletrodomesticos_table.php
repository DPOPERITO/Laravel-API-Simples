<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateEletrodomesticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eletrodomesticos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id')->autoIncrement()->unsigned();
            $table->string('nome', 100);
            $table->text('descricao')->nullable();
            $table->enum('tensao', ['127','220','380','440']);
            $table->integer('marca_id')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP')); 

            $table->index('marca_id','idx_marca_id');

            $table->foreign('marca_id','fk_marca_id')
                ->references('id')
                ->on('marcas')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eletrodomesticos');
    }
}
