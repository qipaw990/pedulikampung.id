<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["title"] = "Banner";
        $data["banner"] = Banner::all();
        return view('admin.banner.index', $data);
    }
    public function edit($id)
    {
        $title = "Edit Banner";
        $banner = Banner::find($id);

        if (!$banner) {
            Alert::error('Error', 'Banner not found.');
            return redirect()->route('banner.index');
        }

        return view('admin.banner.editBanner', compact('banner', 'title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["title"] = "Tambah Banner";
        return view('admin.banner.addBanner', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_banner' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imagePath = 'banners/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('banners'), $imagePath);

            $banner = new Banner();
            $banner->nama_banner = $validatedData['nama_banner'];
            $banner->image = $imagePath;
            $banner->save();
        }

        Alert::success('Berhasil', 'Data Banner Berhasil Ditambahkan!');

        return redirect()->route('banner.index');
    }

    // ... (Other methods)

    /**
     * Update the edited banner data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_banner' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif', // You can adjust validation rules as needed
        ]);

        $banner = Banner::find($id);
        $banner->nama_banner = $validatedData['nama_banner'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imagePath = 'banners/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('banners'), $imagePath);
            $banner->image = $imagePath;
        }


        $banner->save();

        Alert::success('Berhasil', 'Data Banner Berhasil Di Update!');

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            Alert::error('Error', 'Banner not found.');
            return redirect()->route('banner.index');
        }

        // Delete the image file (if applicable) from the storage or public directory.
        // You can customize this part based on how you store the images.

        $banner->delete();

        Alert::success('Berhasil', 'Data Banner Berhasil Dihapus!');

        return redirect()->route('banner.index');
    }
}
