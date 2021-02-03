<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $learning_path_id
 * @property integer $type
 * @property string $title
 * @property int $level
 * @property string $slug
 * @property string $module
 * @property string $created_at
 * @property string $updated_at
 * @property LearningPath $learningPath
 * @property ModuleType $moduleType
 * @property Mission[] $missions
 */
class Module extends Model
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
    protected $fillable = ['learning_path_id', 'type', 'title', 'level', 'slug', 'module', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learningPath()
    {
        return $this->belongsTo('App\Models\LearningPath');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function moduleType()
    {
        return $this->belongsTo('App\Models\ModuleType', 'type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function missions()
    {
        return $this->hasMany('App\Models\Mission');
    }

    public static function search($query, $type)
    {
        return empty($query) ? static::query()
            : static::whereLearningPathId($type)
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                        ->orWhere('level', 'like', '%' . $query . '%')
                        ->orWhereHas('moduleType',function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        });
                });

    }
}
