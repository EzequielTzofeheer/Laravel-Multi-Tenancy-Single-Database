<?php

namespace App\Traits\HasUuid;

use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * Método boot da trait para gerar UUID automaticamente ao criar um modelo.
     *
     * Se a chave primária do modelo estiver vazia, gera um UUID e atribui.
     *
     * @return void
     */
    protected static function bootHasUuid(): void
    {
        static::creating(function ($model) {
            // Verifica se a chave primária está vazia (null, '', etc)
            if (empty($model->{$model->getKeyName()})) {
                // Gera um UUID e atribui como valor da chave primária
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
