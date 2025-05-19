<!--          Book A FREE Trial-->


<!-- Categories-->
@if (Request::segment(1) === 'blogs')
    <div>
        <p class="py-1 text-lg font-bold text-center md:text-left text-primary">
            <span class="flex items-center">
                <span>Categories</span>
            </span>
        </p>
        <div class="border-b-2 w-10"></div>
        <p class="text-center md:text-left">
        <ul class=" py-5 md:pr-10 hidden md:block text-gray-500 text-md">
            @foreach ($all['blog_categories'] as $blog_category)
                <li class="hover:ml-2 transition-all border-b py-3">
                    <a href="/blogs/categories/{{ $blog_category->slug }}" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>{{ $blog_category->name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        </p>
    </div>
@endif
<!--          Locations-->

<!--          Tags-->
@if (Request::segment(1) === 'blogs')
    <div>
        <p class="py-1 text-lg font-bold text-center md:text-left text-primary">
            <span class="flex items-center">
                <span>Tags</span>
            </span>
        </p>
        <div class="border-b-2 w-10"></div>
        <p class="text-center md:text-left">
        <ul class="py-5 md:pr-5 ">
            @foreach ($all['blog_tags'] as $blog_tag)
                <span
                    class="inline-flex items-center rounded-full bg-blue-100 px-3 py-0.5 text-sm m-1 font-medium text-blue-800">
                    <a href="/blogs/tags/{{ $blog_tag->slug }}" class="hover:text-primary">{{ $blog_tag->name }}</a>
                </span>
            @endforeach
        </ul>
        </p>
    </div>
@endif
