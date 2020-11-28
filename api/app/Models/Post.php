<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public const TABLE = 'posts';


    public const TITLE = 'title';

    public const SUB_TITLE = 'subTitle';

    public const TEXT = 'text';

    public const DATE = 'date';

    public const STATUS = 'status';

    public const REFERENCES = 'references';

    public const IMAGE = 'image';

    public const META_BUDGES = 'metaBudges';

    public const CATEGORY = 'category';

    public const USER_ID = 'userId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::TITLE,
        self::SUB_TITLE,
        self::TEXT,
        self::DATE,
        self::STATUS,
        self::REFERENCES,
        self::IMAGE,
        self::META_BUDGES,
        self::CATEGORY,
        self::USER_ID
    ];

}