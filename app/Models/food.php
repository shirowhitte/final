<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->belongsTo(restaurant::class);
    }

    public function create($formArray) {
        $this->db->insert('food', $formArray);
    }

    public function getMenu() {
        $result = $this->db->get('food')->result_array();
        return $result;
    }

    public function getSingleDish($id) {
        $this->db->where('id', $id);
        $dish = $this->db->get('food')->row_array();
        return $dish;
    }

    public function update($id, $formArray) {
        $this->db->where('id', $id);
        $this->db->update('food', $formArray);
    } 

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('food');
    }

    public function countDish() {
        $query = $this->db->get('food');
        return $query->num_rows();
    }

    public function getDishesh($id) {
        $this->db->where('restaurant_id', $id);
        $dish = $this->db->get('food')->result_array();
        return $dish;
    }
}
