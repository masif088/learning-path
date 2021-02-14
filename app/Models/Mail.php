<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $no
 * @property string $type
 * @property string $file
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
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
    protected $fillable = ['title', 'no', 'type', 'file', 'note', 'created_at', 'updated_at'];

}
