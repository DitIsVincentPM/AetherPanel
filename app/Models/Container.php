<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    // Tabelnaam (indien de standaardnaam niet overeenkomt)
    protected $table = 'containers';

    // Vulbare velden
    protected $fillable = [
        'name',
        'description',
        'containertype',
        'status',
    ];

    // Status waarden
    const STATUS_ONLINE = 'Online';
    const STATUS_STARTING = 'Starting';
    const STATUS_OFFLINE = 'Offline';
    const STATUS_STOPPING = 'Stopping';

    // Relatie met ContainerType
    public function containerType()
    {
        return $this->belongsTo(ContainerType::class, 'containertype', 'id');
    }
}
