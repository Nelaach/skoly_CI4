<?php namespace App\Models;

use CodeIgniter\Model;

class Mesta extends Model
{
    protected $table      = 'mesto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nazev'];
    protected $updatedField  = 'updated_at';


}