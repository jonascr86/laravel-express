<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\App;
use App\Http\Requests\PostRequest;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostsAdminController extends Controller
{
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

   

    public function index()
    {
        $posts = $this->post->paginate(5);

        return  view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {
        $tagsIds = $this->getTagsIds($request->tags);
        $post = $this->post->create($request->all());
        $post->tags()->sync($tagsIds);

        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $tagsIds = $this->getTagsIds($request->tags);
        $post = $this->post->find($id);
        $post->update($request->all());
        $post->tags()->sync($tagsIds);

        return redirect()->route('admin.posts.index');
    }

    public function delete($id)
    {
        $post = $this->post->find($id);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    private function getTagsIds($tags)
    {
        $tagList = array_filter(array_map('trim', explode(',', $tags)));

        $tagsIds = [];
        foreach($tagList as $tagName)
        {
            $tagsIds[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }

        return $tagsIds;
    }
}
