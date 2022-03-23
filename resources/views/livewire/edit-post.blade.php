<div>
    <a class="border-2 border-blue-500 rounded-full font-bold text-blue-500 px-4 py-3 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white " wire:click="$set('open', true)">
        <li class="fas fa-edit"></li>
    </a>


    <x-jet-dialog-modal wire:model="open">

        <x-slot name='title'>
            Edit {{$post->title}}
        </x-slot>

        <x-slot name='content'>

            <div wire:loading wire:traget="image" class="mb-4 block text-sm text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
                <strong class="mr-1">Image loading!</strong> Please wait...
            </div>


            @if ($image)
              <img class="mb-4" src="{{$image->temporaryUrl()}}" alt=""> 
              
            @elseif($post->image)
              <img src="{{Storage::url('storage/app/public/'.$post->image)}}" alt="">
            @endif

            <div class="mb-4">
                <x-jet-label value="File Title" />
                <x-jet-input wire:model="post.title" type="text" class="w-full p-2 border-slate-200 border-2" />
                <x-jet-input-error for="title" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Description" />
                <textarea  wire:model="post.content"  class="form-control w-full p-2 border-slate-200 border-2" rows="4"></textarea>
                
                <x-jet-input-error for="content" />   
            </div>

            <div class="mb-4">
                <x-jet-label value="File URL" />
                <x-jet-input wire:model="post.url" type="text" class="w-full p-2 border-slate-200 border-2" />
                
                <x-jet-input-error for="url" /> 
            </div>


            <div class="mb-4">
                <x-jet-label value="Format" />
                <x-jet-input wire:model="post.format" type="text" class="w-full p-2 border-slate-200 border-2" />
                
                <x-jet-input-error for="format" /> 
            </div>


            
            <div class="mb-4">
                <x-jet-label value="Category" />
                <x-jet-input   wire:model="post.category"   type="text" class="w-full p-2 border-slate-200 border-2" />
                
                <x-jet-input-error for="category" /> 
            </div>


            <div class="mb-4">
                <input type="file" wire:model="image" id="{{$identifier}}">
                <x-jet-input-error for="image" /> 
           </div>
           


        </x-slot>

        <x-slot name='footer'>

            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancel
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:target="save, image" wire:loading.attr="disabled" class="disabled:opecity-25">
               Update
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>


</div>
