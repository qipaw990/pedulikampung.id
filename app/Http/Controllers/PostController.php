<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $title = "Post";
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.post.index', compact('posts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Post";
        return view('admin.post.addPost', $data);
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
            'judul_post' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'isi' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imagePath = 'posts/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('posts'), $imagePath);

            $post = new Post();
            $post->judul_post = $validatedData['judul_post'];
            $post->image = $imagePath;
            $post->isi = $validatedData['isi'];
            $post->save();
        }

        Alert::success('Berhasil', 'Data Post Berhasil Di Tambah !');

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Post";
        $post = Post::find($id);
        return view('admin.post.editPost', compact('post', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul_post' => 'required|string',
            'isi' => 'required|string',
        ]);
        
        $post = Post::find($id);

        if (!$post) {
            Alert::error('Error', 'Post not found.');
            return redirect()->route('post.index');
        }

        // Handle image update if needed, similar to the 'store' method.
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imagePath = 'posts/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('posts'), $imagePath);
            $post->image = $imagePath;
        }

        $post->judul_post = $validatedData['judul_post'];
        $post->isi = $validatedData['isi'];
   
        $post->save();

        Alert::success('Berhasil', 'Data Post Berhasil Di Update !');

        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            Alert::error('Error', 'Post not found.');
            return redirect()->route('post.index');
        }

        // Delete the image file (if applicable) from the storage or public directory.
        // You can customize this part based on how you store the images.

        $post->delete();
        Alert::success('Berhasil', 'Data Post Berhasil Di Hapus !');

        return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
    }
}
