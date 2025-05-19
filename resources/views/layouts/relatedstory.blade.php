<section class="py-10 md:py-20 md:max-w-5xl mx-auto">
    <h3 class="text-center">Related Stories</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 px-3 gap-3 md:px-0">
    @foreach($data['stories'] as $story)
      <div class="bg-white rounded-xl shadow-card m-2">
        <div class="relative">
          @if($story->image_name)
          <img loading="lazy" src="{{env('MIX_IMAGE_URL')}}/images/blogs/{{$story->image_name}}" alt="story name" class="h-80 w-full object-cover rounded-xl">
          @endif
        </div>
        <div class="p-3">
          <h6 class="font-bold py-2">{{$story->name}}</h6>
          <p>{{substr(strip_tags($story->meta_description), 0, 200)}}</p>
          <div class="py-5 text-xs text-gray-500">{{$story->created_at}}</div>
          <div class="pr-2">
            <span>
              <a href="/blogs/{{$story->slug}}" class="text-primary underline text-sm text-center md:text-right pr-4">READ MORE</a>
            </span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
