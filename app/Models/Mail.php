<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $type
 * @property string $title
 * @property string $no
 * @property string $file
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property MailType $mailType
 */
class Mail extends Model
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
    protected $fillable = ['type', 'title', 'no', 'file', 'note', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mailType()
    {
        return $this->belongsTo('App\Models\MailType', 'type');
    }
    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('no', 'like', '%' . $query . '%')
                    ->orWhere('note', 'like', '%' . $query . '%')
                    ->orWhere('created_at', 'like', '%' . $query . '%')
                    ->orWhereHas('mailType',function ($q) use ($query) {
                        $q->where('title', 'like', '%' . $query . '%');
                    });
            });

    }
}
