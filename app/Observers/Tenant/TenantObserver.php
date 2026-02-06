<?php

namespace App\Observers\Tenant;

use Illuminate\Database\Eloquent\Model;
use App\Manager\Tenant\TenantManager;

class TenantObserver
{
    /**
     * Método executado antes de criar um registro no banco.
     * Define automaticamente o campo 'tenant_id' com o ID do tenant atual.
     *
     * @param Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        // Obtém o ID do tenant associado ao usuário autenticado
        $tenant = app(TenantManager::class)->getTenantIdentify();

        // Define o atributo 'tenant_id' do modelo com o ID do tenant
        $model->setAttribute('tenant_id', $tenant);
    }
}
