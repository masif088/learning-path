<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property integer $team_id
 * @property string $title
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 * @property Team $team
 * @property Discussion[] $discussions
 * @property Module[] $modules
 */
class LearningPath extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['team_id', 'title', 'slug', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discussions()
    {
        return $this->hasMany('App\Models\Discussion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany('App\Models\Module');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::whereTeamId(Auth::user()->currentTeam->id)->where('title', 'like', '%'.$query.'%');
    }
}
