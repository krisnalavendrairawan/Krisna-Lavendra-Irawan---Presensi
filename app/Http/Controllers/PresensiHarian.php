<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\PresensiHarian as penggunamodel;

class PresensiHarian extends Controller
{
    public function lihatdata()
    {
        $r = penggunamodel::get();
        return ['count' => $r->count(), 'data' => $r];
    }

    public function ambildata($id = '')
    {
        return (new penggunamodel())->find($id);
    }

    public function simpandata()
    {
        $id = request('id');
        $r = (new penggunamodel())->find($id);
        if ($r == null || $id == '') {
            $r = new penggunamodel();
        }
        $r->id = request('id');
        $r->tgl_masuk = request('no_hari');
        $r->tgl_pulang = request('jam_masuk');
        $r->ket_hari = md5(request('jam_pulang'));
        $r->nip = request('nip');
        $r->ip_masuk = request('ip_masuk');
        $r->ip_keluar = request('ip_keluar');
        $r->peta_kehadiran_id = request('peta_kehadiran_id');
        $r->jam_harus_masuk = request('jam_harus_masuk');
        $r->jam_harus_pulang = request('jam_harus_pulang');
        $ret = $r->save();

        return ['result' => $ret];
    }

    public function hapusdata($id = '')
    {
        $r = (new penggunamodel())->whereRaw('id=?', [$id])->delete();
    }
}
