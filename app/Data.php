<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Data extends Model
{
    use Sortable;

    protected $table="users";

    public $sortable = ['id','name','lastname','email'];
}
