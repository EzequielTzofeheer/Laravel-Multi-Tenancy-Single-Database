<?php

namespace App\Http\Middleware\Tenant;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Manager\Tenant\TenantManager;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Se usuário autenticado, ajusta root do filesystem para o tenant
        if (auth()->check()) {
            $this->setFilesystemsRoot();
        }

        return $next($request);
    }

    /**
     * Ajusta a configuração do sistema de arquivos para usar um diretório
     * específico para o tenant atual, identificando pelo UUID do tenant.
     *
     * @return void
     */
    public function setFilesystemsRoot()
    {
        // Obtém o tenant do usuário autenticado
        $tenant = app(TenantManager::class)->getTenant();

        // Configura o root do disco 'tenant' adicionando o UUID do tenant no path
        config()->set(
            'filesystems.disks.tenant.root',
            config('filesystems.disks.tenant.root') . "/{$tenant->id}"
        );
    }
}
