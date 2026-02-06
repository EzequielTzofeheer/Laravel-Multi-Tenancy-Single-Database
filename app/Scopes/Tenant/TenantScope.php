<?php

namespace App\Scopes\Tenant;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use App\Manager\Tenant\TenantManager;

class TenantScope implements Scope
{
    /**
     * Aplica o escopo global ao builder da query.
     * Filtra os registros para que pertençam ao tenant do usuário atual.
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // Obtém o ID do tenant associado ao usuário autenticado
        $tenant = app(TenantManager::class)->getTenantIdentify();

        // Adiciona condição para filtrar pelo 'tenant_id' correspondente
        $builder->where('tenant_id', $tenant);
    }
}
