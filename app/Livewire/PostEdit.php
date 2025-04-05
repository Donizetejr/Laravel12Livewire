<?php

namespace App\Livewire;

use App\Models\Post;
use Flux;
use Livewire\Component;
use Livewire\Attributes\On;

class PostEdit extends Component
{
    public $title, $body, $postId;

    public function render()
    {
        return view('livewire.post-edit');
    }

    #[On("editPost")]
    public function editPost($postId) {

        $post = Post::find($postId);

        $this->postId = $postId;
        $this->title = $post->title;
        $this->body = $post->body;
        Flux::modal("edit-post")->show();
    }

    public function updatePost() {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::find($this->postId);
        $post->title = $this->title;
        $post->body = $this->body;
        $post->save();

        Flux::modal("edit-post")->close();
        $this->dispatch("reloadPosts");
    }
}
