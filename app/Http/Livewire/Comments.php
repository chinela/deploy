<?php

namespace App\Http\Livewire;

use App\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    public $newComment;
    public $image;

    protected $listeners = ['uploadImage' => 'handleUpload'];

    public function mount()
    {
        // $this->comments = Comment::with('creator')->orderBy('created_at', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.comments', ['comments' => Comment::with('creator')->latest()->paginate(2)]);
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|max:30'
        ]);
        $comment = Comment::create(['body' => $this->newComment, 'user_id' => rand(1, 2), 'issue_id' => rand(1, 4)]);
        // $this->comments->prepend($comment);
        $this->newComment = '';
    }

    public function remove($id)
    {
        Comment::find($id)->delete();
        // $this->comments = $this->comments->except($id);
    }

    public function handleUpload($imageData)
    {
        $this->image = $imageData;
    }
}
