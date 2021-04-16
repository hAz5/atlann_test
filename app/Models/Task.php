<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    /** @var string $table table name */
    protected $table = 'tasks';

    /** @var string[] $fillable */
    protected $fillable = [
        'user_id',
        'name',
        'note',
        'time'
    ];

    /**
     * the user who created task
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id', __FUNCTION__);
    }
}
