<?php namespace App\Models;

use CodeIgniter\Model;

class Skoly extends Model
{
    protected $table      = 'skola';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nazev', 'mesto', 'geo-lat', 'geo-long'];
    protected $updatedField  = 'updated_at';


}