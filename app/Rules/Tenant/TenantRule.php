<?php

namespace App\Rules\Tenant;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use App\Manager\Tenant\TenantManager;
use Illuminate\Support\Facades\DB;

/**
 * Regra de validação customizada para garantir que um determinado campo
 * seja único dentro do contexto do tenant atual (isolamento multi-tenant).
 */
class TenantRule implements ValidationRule
{
    /**
     * Nome da tabela onde será feita a consulta de unicidade.
     *
     * @var string
     */
    private $table;

    /**
     * Valor da coluna identificadora do registro atual (exemplo: id ou uuid),
     * utilizado para ignorar o próprio registro durante a edição.
     *
     * @var mixed|null
     */
    private $columnValue;

    /**
     * Nome da coluna que identifica unicamente o registro na tabela,
     * usado para comparação (padrão: 'id').
     *
     * @var string
     */
    private $column;

    /**
     * Construtor da regra de validação.
     *
     * @param string $table       Nome da tabela para consulta.
     * @param mixed|null $columnValue Valor do identificador do registro atual para ignorar (edição).
     * @param string $column      Nome da coluna identificadora (default 'id').
     */
    public function __construct(string $table, $columnValue = null, string $column = 'id')
    {
        $this->table = $table;
        $this->columnValue = $columnValue;
        $this->column = $column;
    }

    /**
     * Método que executa a validação.
     *
     * @param string  $attribute  Nome do campo que está sendo validado (ex: 'code', 'name').
     * @param mixed   $value      Valor do campo a ser validado.
     * @param Closure $fail       Função callback para disparar erro de validação.
     *
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $tenant = app(TenantManager::class)->getTenantIdentify();

        $result = DB::table($this->table)
                        ->where($attribute, $value)
                        ->where('tenant_id', $tenant)
                        ->first();

        // Verifica se existe um resultado, e se o valor não é o do próprio registro (para ignorar durante a edição)
        if ($result && $result->{$this->column} != $this->columnValue) {
            $fail('O valor informado para o campo :attribute já está em uso!');
        }
    }

    /**
     * Mensagem padrão de erro (não usada diretamente pois usamos $fail na validação).
     *
     * @return string
     */
    public function message(): string
    {
        return 'O valor informado para o campo :attribute já está em uso!';
    }
}
