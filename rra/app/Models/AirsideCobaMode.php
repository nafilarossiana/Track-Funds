<?php

namespace App\Models;

use CodeIgniter\Model;

class AirsideCobaModel extends Model
{
    protected $table = 'airsidecoba';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['tahun','unit','gl_account','jenis','jeniskontrak','status','no','detail_program','rka','geser','nilai_pekerjaan',
                                'realisasi','sisa_belum','program','sisa_rka','keterangan','januari','februari', 
                                'maret','april','mei','juni','juli','agustus','september','oktober','november','desember'];

    public function getPages($id){

        return $this->find($id);
    }
    public function getAirsideDataById($id)
    {
        return $this->find($id);
    }


}