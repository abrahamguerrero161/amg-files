<div>
    <x-jet-danger-button wire:click="$set('open', true)">
            CREATE NEW FILE
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Create new file
        </x-slot>

        <x-slot name="content">


             
        
                <div wire:loading wire:traget="image" class="mb-4 block text-sm text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
                  <strong class="mr-1">Image loading!</strong> Please wait...
                  
                </div>
        
               


            @if ($image)
              <img class="mb-4" src="{{$image->temporaryUrl()}}" alt="">  
            @endif

            <div class="mb-4">
                <x-jet-label value="File Title" />
                <x-jet-input type="text" class="w-full p-2 border-slate-200 border-2" wire:model="title"  />
                
                    {{--@error('title')
                    <span>
                        {{$message}}    
                    </span>    
                     @enderror--}}

                     <x-jet-input-error for="title" />
            </div>

            {{--$content--}}
            <div class="mb-4">
                <x-jet-label value="Description" />
                            <div wire:ignore>
                                <textarea id="editor"
                                wire:model="content" 
                                class="form-control w-full p-2 border-slate-200 border-2"
                                rows="7"></textarea>
                            </div>
                <x-jet-input-error for="content" />   
            </div>

            <div class="mb-4">
                <x-jet-label value="File URL" />
                <x-jet-input type="text" class="w-full p-2 border-slate-200 border-2" wire:model="url"  />
                
                <x-jet-input-error for="url" /> 
            </div>


            <div class="mb-4">
                <x-jet-label value="Format" />
                <x-jet-input type="text" class="w-full p-2 border-slate-200 border-2" wire:model="format"  />
                
                <x-jet-input-error for="format" /> 
            </div>


            
            <div class="mb-4">
                <x-jet-label value="Category" />
                <x-jet-input type="text" class="w-full p-2 border-slate-200 border-2" wire:model="category"  />
                
                <x-jet-input-error for="category" /> 
            </div>


            <div class="mb-4">
                 <input type="file" wire:model="image" id="{{$identifier}}">
                 <x-jet-input-error for="image" /> 
            </div>

        </x-slot>

        <x-slot name="footer">
                <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                    Cancel
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="save"  wire:loading.attr="disabled" wire:target="save, image"   class="disabled:bg-gray-500">
                    Create Post
                </x-jet-danger-button>

                {{--<span wire:loading wire:target="save">
                    Loading...
                </span>--}}
        </x-slot>


    </x-jet-dialog-modal>

    @push('js')

        <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then(function(editor){
                    editor.model.document.on('change:data', ()=> {

                        @this.set('content', editor.getData());   
                    });

                    Livewire.on('resetCKEditor', ()=> {

                        editor.setData(''); 
                    })
                })
                .catch( error => {
                    console.error( error );
                } );
        </script>
    @endpush

</div>
