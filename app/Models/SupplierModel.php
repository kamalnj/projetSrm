<?php
namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers';
    protected $allowedFields = ['user_id', 'nom', 'email', 'contrat', 'categorie', 'created_at', 'updated_at'];
}
