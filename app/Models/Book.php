<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
  const AK = '-xpzbXEV0gDocV0_SsQFn-WYczH9kPQr27wtYQ_2';
  const SK = 'Lpynlw9BBhexmODsMV0a4-v-Kzp6zm_njdXaTUxJ';
  const DOMAIN = 'ocm761z5p.bkt.clouddn.com';
  const BUCKET = 'book';
  //public $timestamps = false;

  protected $table = 'book_lists';
  protected $primaryKey = 'id';
}
