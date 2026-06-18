<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * 投稿一覧
     */
    public function index()
    {
        return response()->json(
            Post::paginate(10)
        );
    }

    /**
     * 投稿作成
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'body'  => 'required|string',
        ]);

        $post = Post::create($validated);

        return response()->json($post, 201);
    }

    /**
     * 投稿詳細
     */
    public function show($id)
    {
        return response()->json(
            Post::findOrFail($id)
        );
    }

    /**
     * 投稿更新
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'body'  => 'required|string',
        ]);

        $post->update($validated);

        return response()->json($post);
    }

    /**
     * 投稿削除
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return response()->json([
            'message' => '削除しました'
        ]);
    }
}
