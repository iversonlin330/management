<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ship
 *
 * @property int $id
 * @property string $transport_id
 * @property string $weight
 * @property string $price
 * @property int $attachment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ship query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ship whereAttachmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ship wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ship whereTransportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ship whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ship whereWeight($value)
 * @mixin \Eloquent
 */
class Ship extends Model
{
    use HasFactory;
}
