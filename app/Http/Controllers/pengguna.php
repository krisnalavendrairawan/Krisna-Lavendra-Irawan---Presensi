<?php

namespace App\Http\Controllers;

use App\Models\Model\Pengguna as penggunamodel;
use Illuminate\Http\Request;

class pengguna extends Controller
{
    public function lihatdata()
    {
        $r = penggunamodel::get();
        return ['count' => $r->count(), 'data' => $r];
    }

    public function ambildata($nip = '')
    {
        return (new penggunamodel())->find($nip, ['nip', 'nama', 'level']);
    }

    public function simpandata()
    {
        $nip = request('nip');
        $r = (new penggunamodel())->find($nip);
        if ($r == null || $nip == '') {
            $r = new penggunamodel();
        }
        $r->nip = request('nip');
        $r->nama = request('nama');
        $r->level = request('level');
        $r->sandi = md5(request('sandi'));
        $ret = $r->save();

        return ['result' => $ret];
    }

    public function hapusdata($nip = '')
    {
        $r = (new penggunamodel())->whereRaw('nip=?', [$nip])->delete();
    }
}
