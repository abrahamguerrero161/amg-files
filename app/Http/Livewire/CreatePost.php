<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{


    use WithFileUploads;

    public $open = false;

    public $title, $content, $url, $format, $userId, $category, $image, $identifier;

    /*
    protected $rules  = [

        'title' => 'required|max:68',
        'content' => 'required|max:254',
        'url' => 'required|max:254',
        'format' => 'required|max:10',
        'category' => 'required|max:128'
    ];
    */


    public function mount(){

        $this->identifier = rand();
    }
    
    protected $rules  = [

        'title' => 'required',
        'content' => 'required',
        'url' => 'required',
        'format' => 'required',
        'category' => 'required',
        'image' => 'required|image|max:2048'
    ];

    /*
    public function updated($propertyName){

        $this->validateOnly($propertyName);

    }
    */

    public function save(){

        $this->validate();

        $image = $this->image->store('posts');
        

        Post::create([

            'title' => $this->title,
            'content' => $this->content,
            'url' => $this->url,
            'format' => $this->format,
            'userId' => '12',
            'category' => $this->category,
            'image' => $image

        ]);

        //Methods Events

       $this->reset(['open', 'title', 'content', 'url', 'format', 'userId', 'category', 'image']);
       
       $this->identifier = rand();
       $this->emitTo('show-posts','render');
       $this->emit('alert', 'The file has been created successfully.');
    }


    public function render()
    {
        return view('livewire.create-post');
    }


    public function updatingOpen(){

            if($this->open==false){
                $this->reset(['title', 'content', 'url', 'format', 'userId', 'category', 'image']);
                $this->identifier = rand();
                $this->emit('resetCKEditor');
            }
 
    }
}
