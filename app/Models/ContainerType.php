<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainerType extends Model
{
    use HasFactory;

    // Tabelnaam (indien de standaardnaam niet overeenkomt)
    protected $table = 'containertypes';

    // Vulbare velden
    protected $fillable = [
        'name',
        'json',
        'docker_image',
        'image',
    ];

    // Relatie met Containers
    public function containers()
    {
        return $this->hasMany(Container::class, 'containertype', 'id');
    }
}
