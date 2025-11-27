<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'value',
    ];
    protected $casts = [
        'key' => 'string',
        'value' => 'string',
    ];

    /**
     * Polymorphic relation — allows attaching a setting to any model.
     * Requires `settingable_id` and `settingable_type` columns on the `settings` table.
     *
     * @return MorphTo
     */
    public function settingable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Helper: get a setting value by key (returns default if not found).
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Helper: set a setting value by key (creates or updates).
     *
     * @param string $key
     * @param mixed $value
     * @return static
     */
    public static function set(string $key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
