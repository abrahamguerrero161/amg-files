<div wire:init="loadPosts">
    {{-- Do your work, then step back. --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">


        <!-- component -->
        

                <x-table>

                    <div class="px-6 py-4  bg-gray-300 flex items-center">

                        <div class="flex items-center">
                            <span>Show</span>   
                            <select wire:model="cant" class="mx-2 p-1 form-control">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> 
                            <span>Results</span>
                        </div>

                            <!--<input type="text" wire:model="search" >-->
                            <x-jet-input class="flex-1 p-3 rounded-full mx-4" placeholder="Search" type="text"  wire:model="search"/>

                            @livewire('create-post', [])
                    </div>

                   @if (count($posts))
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="w-24 cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider whitespace-no-wrap min-w-max" wire:click="order('id')">
                                        ID 
                                            {{--sort--}}
                                            @if ($sort=='id')
                                         
                                            @if ($direction=='asc') 
                                                <i class="fas fa-sort-alpha-down  mt-1  float-right mt-1"></i>  
                                            @else
                                                <i class="fas fa-sort-alpha-up-alt   mt-1  float-right mt-1"></i> 
                                            @endif
                                           
                                            @else
                                            <i class="fas fa-sort   mt-1  float-right mt-1"></i> 
                                           @endif

                                    </th>
                                    <th
                                        class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" wire:click="order('title')">
                                        Title

                                        {{--sort--}}
                                        @if ($sort=='title')
                                         
                                            @if ($direction=='asc')
                                                <i class="fas fa-sort-alpha-down  float-right mt-1"></i>  
                                            @else
                                                <i class="fas fa-sort-alpha-up-alt  float-right mt-1"></i> 
                                            @endif
                                           
                                        @else
                                            <i class="fas fa-sort float-right mt-1"></i> 
                                        @endif
                                        
                                    </th>
                                    <th
                                        class="cursor-pointer px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider" wire:click="order('content')">
                                        Content

                                        {{--sort--}}
                                        @if ($sort=='content')
                                                                            
                                        @if ($direction=='asc')
                                            <i class="fas fa-sort-alpha-down  float-right mt-1"></i>  
                                        @else
                                            <i class="fas fa-sort-alpha-up-alt  float-right mt-1"></i> 
                                        @endif
                                        
                                        @else
                                            <i class="fas fa-sort float-right mt-1"></i> 
                                        @endif

                                    </th>
                                    
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($posts as $item)
                                  
                                <tr>
                                   
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 ">{{$item->id}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 ">{{$item->title}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 ">{!! $item->content !!}</p>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                                         
                                          {{-- @livewire('edit-post', ['post' => $post], key($post->id))--}}
                                         
                                          <a class="cursor-pointer  border-2 border-blue-500 rounded-full font-bold text-blue-500 px-3 py-1 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white " wire:click="edit({{$item}})">
                                            <li class="fas fa-edit"></li>
                                          </a>


                                          <a class="ml-2 cursor-pointer  border-2 border-red-500 rounded-full font-bold text-red-500 px-3 py-1 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white "
                                          wire:click="$emit('deletePost', {{ $item->id }})"
                                          >
                                            <li class="fas fa-trash"></li>
                                          </a>

                                    </td>
                                </tr>

                                @endforeach  
                            </tbody>
                        </table>


                                @if($posts->hasPages())

                                    <div class="px-6 py-3">
                                        {{$posts->links()}}
                                    </div>

                                @endif
                    @else
                        <div class="px-6 py-4  bg-gray-300 ">
                        The content does not exist.
                        </div>
                    @endif

                        

                </x-table>
     </div>


               
{{--Componente Modal --}}
     <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name='title'>
            Edit {{$post->title}}
        </x-slot>

        <x-slot name='content'>

            <div wire:loading wire:traget="image" class="mb-4 block text-sm text-red-600 bg-red-200 border border-red-400 h-12 flex items-center p-4 rounded-sm relative" role="alert">
                <strong class="mr-1">Image loading!</strong> Please wait...
            </div>


            @if ($image)
              <img class="mb-4" src="{{$image->temporaryUrl()}}" alt=""> 
              
            @else
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

            <x-jet-secondary-button class="mr-2" wire:click="$set('open_edit', false)">
                Cancel
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="update" wire:target="save, image" wire:loading.attr="disabled" class="disabled:opecity-25">
               Update
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    @push('js')

    <script src="sweetalert2.all.min.js"></script>

    <script>

        Livewire.on('deletePost', postId => {

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emitTo('show-posts', 'delete', postId);

                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
        
        })          

    </script>
    @endpush

</div>
