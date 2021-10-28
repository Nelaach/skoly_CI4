<?php namespace App\Models;

use CodeIgniter\Model;

class Prijati extends Model
{
    protected $table      = 'pocet_prijatych';
    protected $primaryKey = 'id';
    protected $allowedFields = ['obor','skola','pocet','rok'];
    protected $updatedField  = 'updated_at';


}