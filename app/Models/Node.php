<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    protected $table = 'nodes';

    protected $fillable = [
        'node_id',
        'name',
        'ip',
        'port',
        'status'
    ];

    const STATUS_ONLINE = 'Online';
    const STATUS_STARTING = 'Starting';
    const STATUS_OFFLINE = 'Offline';
    const STATUS_STOPPING = 'Stopping';
    const STATUS_INSTALLING = 'Installing';
}
