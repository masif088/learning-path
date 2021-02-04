<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property integer $team_id
 * @property string $title
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 * @property Team $team
 */
class Announcement extends Model
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
    protected $fillable = ['team_id', 'title', 'message', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::whereTeamId(Auth::user()->currentTeam->id)->where(function ($q) use ($query) {
                $q->where('title', 'like', '%'.$query.'%')->orWhere('message', 'like', '%'.$query.'%');
            });
    }
}
