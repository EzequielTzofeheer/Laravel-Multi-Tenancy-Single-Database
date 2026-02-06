<?php

namespace App\Manager\Tenant;

use App\Models\Tenant;

class TenantManager
{
    /**
     * Retorna o ID do tenant associado ao usuário autenticado.
     *
     * @return int
     */
    public function getTenantIdentify()
    {
        return $this->getTenant()->id;
    }

    /**
     * Retorna a instância do tenant associado ao usuário autenticado.
     *
     * @return Tenant
     */
    public function getTenant(): Tenant
    {
        // Obtém o tenant relacionado ao usuário atualmente autenticado
        return auth()->user()->tenant;
    }

}
