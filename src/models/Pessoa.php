<?php

namespace Laraerp\Pessoa\Models;

use DateTime;
use Illuminate\Support\Facades\Validator;
use JansenFelipe\Utils\Utils;
use LaravelBook\Ardent\Ardent;

class Pessoa extends Ardent {

    /**
     * Nome da tabela no banco de dados.
     *
     * @var string
     */
    protected $table = 'tb_pessoa';

    /**
     * Campos de atribuição
     *
     * @var array
     */
    protected $fillable = array(
        'nome',
        'razao_apelido',
        'documento',
        'nascimento_fundacao',
        'fk_endereco'
    );

    /**
     * Regras de validação do Ardent
     *
     * @var array
     */
    public static $rules = array(
        'documento' => 'required|is_documento',
        'nome' => 'required',
    );

    /**
     * Customização das mensagens de erro
     *
     * @var array
     */
    public static $customMessages = array(
        'is_documento' => 'O campo :attribute não é valido.',
    );

    /**
     * Contructor    
     */
    public function __construct(array $attributes = array()) {
        parent::__construct(array_filter($attributes));

        Validator::extend('is_documento', function($attribute, $value, $parameters) {
            $documento = Utils::unmask($value);

            if (strlen($documento) == 11)
                return Utils::isCpf($documento);

            if (strlen($documento) == 14)
                return Utils::isCnpj($documento);

            return false;
        });
    }

    /**
     * Before save ..
     */
    public function beforeSave() {
        if (isset($this->documento))
            $this->documento = Utils::unmask($this->documento);

        $datetime = DateTime::createFromFormat('d/m/Y', $this->nascimento_fundacao);
        if ($datetime)
            $this->nascimento_fundacao = $datetime->format('Y-m-d');

        return true;
    }

    /**
     * Belongs to Endereco
     */
    public function endereco() {
        return $this->belongsTo('Laraerp\Endereco\Models\Endereco', 'fk_endereco');
    }

    /**
     * Has Many Enderecos
     */
    public function enderecos() {
        return $this->hasMany('Laraerp\Endereco\Models\Endereco', 'fk_pessoa');
    }

}
