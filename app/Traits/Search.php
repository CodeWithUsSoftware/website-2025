<?php

namespace App\Traits;

use App\Models\TaskClassType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

/**
 * Search Trait
 * @created @hmadsk
 * @github https://github.com/iamsaeed
 * @email asklko2004@gmail.com
 * @package App\Traits
 * @remarks This trait is implementing the Laravel local query scope
 * @usage should be used in Laravel Models
 */

trait Search
{
    public function scopeSearchDateRange($query, $field, $start_date, $end_date)
    {
        if ($start_date && $end_date) {
            return $query->whereBetween($field, array($start_date, $end_date));
        }
    }

    public function scopeSearchDate($query, $field, $search)
    {
        if ($search !== '') {
            return $query->whereDate($field, $search);
        }
    }

    public function scopeSearchEvent($query,$search)
    {
        if($search == 'true' )
        {
            return $query->whereHas('taskClasses',function($q){
                $eventId = TaskClassType::where('type_name','Event')->value('id');
                return $q->where('task_class_type_id',$eventId );
            });

        }
    }

    public function scopeFilterSubscription($query,$search)
    {
        if($search !== '')
        {
            if($search == 'Active')
            {
                return $query->whereHas('student', function(Builder $q)
                {
                    // $value = $q->hasSubscriptionId();
                    // return $q->where('id',161);
                    return $q->whereHas('subscriptions')->orWhereHas('parent', function($parent)
                    {
                        $parent->whereHas('subscriptions');
                    });
                });
            }
            else if($search == 'Cancelled')
            {
                return $query->whereHas('student', function($q)
                {
                    return $q->whereHas('cancelled_subscriptions')->orWhereHas('parent', function($parent)
                    {
                        $parent->whereHas('cancelled_subscriptions');
                    });
                });
            }
        }
    }

    public function scopeSearchStrict($query, $field, $search)
    {
        if ($search !== '') {
            return $query->where($field, $search);
        }
    }

    public function scopeOrSearch($query, $field, $search)
    {
        if ($search !== '') {
            return $query->orWhere($field, 'like', "%$search%");
        }
    }

    public function scopeSearch(Builder $builder, $field, $search)
    {
        if ($search !== '') {
            return $builder->where($field, 'like', "%$search%");
        }
    }

    public function scopeSearchManyDate($query, $field, $search, $operator, $relation)
    {
        if ($search !== '') {
            return $query->whereHas($relation, function ($query) use ($field, $search, $operator) {
                $query->where($field, $operator, $search);
            });
        }
    }

    public function scopeSearchMany($query, $field, $search, $relation)
    {
        if ($search !== '') {
            return $query->whereHas($relation, function ($query) use ($field, $search) {
                $query->where($field, 'like', '%' . $search . '%');
            });
        }
    }

    public function scopeSearchManyStrict($query, $field, $search, $relation)
    {
        if ($search !== '') {
            return $query->whereHas($relation, function (Builder $query) use ($field, $search) {
                $query->where($field, 'like', $search);
            });
        }
    }

    public function scopeSearchTeacherInTaskClass($query, $search)
    {

        if ($search) {
            return $query->whereHas('teacher', function (Builder $query) use ( $search) {
                $query->where('users.id', '=', $search);
            });
        }
    }

    public function scopeSearchInEmailList($query)
    {

        if(Session::get('email-list')) {

            $splitEmail = array_unique(explode('/', Session::get('email-list')));

            return $query->whereIn('email',$splitEmail);

        }
    }

    public function scopeSearchManyMorph($query, $field, $model, $search, $relation)
    {
        if ($search !== '') {
            return $query->whereHasMorph($relation, $model, function ($query) use ($field, $search) {
                $query->where($field, 'like', $search);
            });
        }
    }
}
