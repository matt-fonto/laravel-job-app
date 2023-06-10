<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        // if the tag key exists in the filters array
        if ($filters['tag'] ?? false) {
            // find the job with the specified tag
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // if the search key exists in the filters array
        if ($filters['search'] ?? false) {
            // find the job with the specified tag
            // where('column', 'operator', 'value')
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to User
    public function user()
    {
        // A job belongs to a user
        return $this->belongsTo(User::class, 'user_id');
    }
}
