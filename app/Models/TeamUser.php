<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $team_id
 * @property integer $user_id
 * @property string $role
 * @property string $created_at
 * @property string $updated_at
 */
class TeamUser extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'team_user';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['team_id', 'user_id', 'role', 'created_at', 'updated_at'];
    
}
