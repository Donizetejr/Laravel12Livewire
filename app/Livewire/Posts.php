<?php

namespace App\Livewire;

use App\Models\Post;
use Flux;
use Livewire\Component;
use Livewire\Attributes\On;

class Posts extends Component
{
    public $posts, $postId;

    public function mount() {
        $this->posts = Post::all();
    }

    public function render()
    {
        return view('livewire.posts');
    }

    #[On("reloadPosts")]
    public function reloadPosts() {
        $this->posts = Post::all();
    }

    public function editPost($postId) {
       $this->dispatch("editPost", $postId);
    }

    public function deletePost($postId) {
        $this->postId = $postId;
        Flux::modal("delete-post")->show();
    }

    public function confirmDelete() {
        Post::find($this->postId)->delete();
        $this->reloadPosts();
        Flux::modal("delete-post")->close();
    }
}
