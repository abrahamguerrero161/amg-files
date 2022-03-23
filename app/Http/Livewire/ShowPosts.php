<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $post, $image,  $identifier;
    public $search ='';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;

    public $open_edit = false;


    protected $listeners = ['render' => 'render', 'delete' => 'delete'];

    protected $queryString = [

        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];

    public function mount(Post $post){

        //$this->post = $post;
        $this->identifier = rand();
        $this->post = new Post();
    }


    public function updatingSearch(){
        $this->resetPage();
    }


    protected $rules  = [

        'post.title' => 'required',
        'post.content' => 'required',
        'post.url' => 'required',
        'post.format' => 'required',
        'post.category' => 'required',
        
    ];


    

    public function render()
    {
                    
                if($this->readyToLoad){
                    $posts = Post::where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->cant);
                    //->get();
                }else{

                    $posts = [];
                }          


                    /*
                  
                    */
        return view('livewire.show-posts', compact('posts'));
    }


    public function loadPosts(){

        $this->readyToLoad = true; 
    }



    public function order($sort){

       


        if ($this->sort == $sort) {

                if ($this->direction=='desc') {
                    $this->direction = 'asc';
                } else {
                    $this->direction='desc';
                }
               
        } else {
            $this->sort = $sort;
            $this->direction='asc';
        }
        
    }


        public function edit(Post $post){

                $this->post = $post;

                $this->open_edit = true;
        }


        public function update(Post $post){

            $this->validate();

            if($this->image){
                Storage::delete([$this->post->image]);
                $this->post->image = $this->image->store('posts');
            }
    
            $this->post->save();
    
            $this->reset(['open_edit', 'image']);
            $this->identifier = rand();
            //$this->emitTo('show-posts','render');
            $this->emit('alert', 'The file has been updated successfully.');
        }


        public function delete(Post $post){

                $post->delete();
        }

}
