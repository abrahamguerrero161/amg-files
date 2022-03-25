<div class="max-w-sm rounded overflow-hidden shadow-lg m-4 rounded-b-3xl flex flex-col justify-between">
        <div class="border-slate-300 border-2" style="width: 384px; height:234px;">
                <img class="w-full"  src="{{$image}}" alt="Sunset in the mountains">
        </div>
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">{{$title}}</div>
          <p class="text-gray-700 text-base">
          {{$slot}}
          </p>
        </div>
        <div class="px-6 pt-4 pb-2 flex items-end content-around ">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$id}}</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$format}}</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$category}}</span>
          <a class="justify-self-end ml-auto" href="#">
            <i class="fas fa-download mb-3 "></i>
          </a>
        </div>
  </div>