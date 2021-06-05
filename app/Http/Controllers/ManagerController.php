<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateManagerRequest;
use App\Models\Lapakumkm;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager_id = auth()->guard('manager')->user()->id;
        $lapakumkm = Lapakumkm::where('manager_id', '=', $manager_id)->first();

        return view('auth.manager.index', compact('lapakumkm'));
    }

    public function indexAdmin()
    {
        $managers = Manager::all();
        return view('auth.admin.manage-managers.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lapakumkms = DB::table('lapakumkms')->where('manager_id', '=', null)->get();
        return view('auth.admin.manage-managers.register', compact('lapakumkms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get Path File For FOTO KTP (ktp_img)
        $nik = request()->nik;
        $ktp_img = request()->file('ktp_img');
        $imageUrl = $ktp_img->storeAs("images/ktps/managers", "{$nik}.{$ktp_img->extension()}");

        Manager::create([
            'lapakumkm_id' => $request->lapakumkm_id,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'ktp_img' => $imageUrl,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
        ]);

        // Update manager_id in lapakumkm field
        Lapakumkm::where('id', $request->lapakumkm_id)
            ->update(['manager_id' => DB::getPdo()->lastInsertId()]);



        return redirect()->route('manage-manager')->with('success', 'Akun telah ditambahkan, Silahkan Login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    public function showAdmin(Manager $manager)
    {
        return view('auth.admin.manage-managers.show', compact('manager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $manager = auth()->guard('manager')->user();
        return view('auth.manager.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManagerRequest $request, Manager $manager)
    {
        $manager_id = auth()->guard('manager')->user()->id;
        $manager = Manager::find($manager_id);

        $attr = request()->all();

        // Update jika request password kosong
        if (request()->password) {
            $attr['password'] = Hash::make(request()->password);
        } else {
            $attr['password'] = $manager->password;
        }
        // Update jika request gambar kosong
        $ktp_img = request()->file('ktp_img');
        if (isset($ktp_img)) {
            $nik = request()->nik;
            $ktp_imageUrl = $ktp_img->storeAs("images/ktps", "{$nik}.{$ktp_img->extension()}");
            Storage::delete($manager->ktp_img);
        } else {
            $ktp_imageUrl = $manager->ktp_img;
        }

        $attr['ktp_img'] = $ktp_imageUrl;

        $manager->update($attr);

        return redirect()->route('manager.edit')->with('success', 'Akun telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $lapakumkm = Lapakumkm::find($manager->lapakumkm_id);
        if ($lapakumkm) {
            Lapakumkm::where('manager_id', $manager->id)
                ->update(['manager_id' => null]);
        }
        $manager->delete();
        return redirect()->route('manage-manager')->with('success', 'Akun berhasil dihapus');
    }
}
