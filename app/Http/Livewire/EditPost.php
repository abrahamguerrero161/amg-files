<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Storage;

class EditPost extends Component
{

    use WithFileUploads;
    
    public $open = false;
    public $post, $image, $identifier;


    protected $rules  = [

        'post.title' => 'required',
        'post.content' => 'required',
        'post.url' => 'required',
        'post.format' => 'required',
        'post.category' => 'required',
        
    ];

    public function mount(Post $post){

        $this->post = $post;
        $this->identifier = rand();
    }


    public function save(){
        $this->validate();

        if($this->image){
            Storage::delete([$this->post->image]);
            $this->post->image = $this->image->store('posts');
        }

        $this->post->save();

        $this->reset(['open', 'image']);
        $this->identifier = rand();
        $this->emitTo('show-posts','render');
        $this->emit('alert', 'The file has been updated successfully.');
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
