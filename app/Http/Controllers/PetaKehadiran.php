<?php

namespace App\Http\Controllers;

use App\Models\Model\PetaKehadiran as penggunamodel;
use Illuminate\Http\Request;

class PetaKehadiran extends Controller
{
    public function lihatdata()
    {
        $r = penggunamodel::get();
        return ['count' => $r->count(), 'data' => $r];
    }

    public function ambildata($id = '')
    {
        return (new penggunamodel())->find($id, ['id', 'no_hari', 'jam_masuk', 'jam_pulang']);
    }

    public function simpandata()
    {
        $nip = request('id');
        $r = (new penggunamodel())->find($nip);
        if ($r == null || $nip == '') {
            $r = new penggunamodel();
        }
        $r->id = request('id');
        $r->no_hari = request('no_hari');
        $r->jam_masuk = request('jam_masuk');
        $r->jam_keluar = md5(request('jam_pulang'));
        $ret = $r->save();

        return ['result' => $ret];
    }

    public function hapusdata($id = '')
    {
        $r = (new penggunamodel())->whereRaw('id=?', [$id])->delete();
    }
}
