<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Transport
 *
 * @property int $id
 * @property string $store_id
 * @property string $transport_no
 * @property string $name
 * @property string $jan_code
 * @property string $amount
 * @property string $out_date
 * @property string $box_no
 * @property string $tw_no
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transport query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereBoxNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereJanCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereOutDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereTransportNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereTwNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transport whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Transport extends Model
{
    use HasFactory;
}
