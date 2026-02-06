<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\HasUuid\HasUuid;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    use HasUuid;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cpf_cnpj', 'name',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
