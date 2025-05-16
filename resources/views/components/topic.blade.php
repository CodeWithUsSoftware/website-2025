<div>
    <div>
        <section>
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center gap-5">
                    <div class="owl-carousel owl-theme">
                        @foreach ($topics as $topic)
                            <div class="item">
                                <a href="/topics/{{ $topic->name != 'Robotics' ? $topic->slug : 'arduino' }}">
                                    @if(Request::segment(1) != 'school-program')
                                    <div>
                                        @if ($topic->name === 'Roblox w/ Scratch')
                                            <img loading="lazy" src="/images/topics/new_images/Roblox w Scratch.jpg"
                                                alt="scratch" class="rounded-3xl">
                                        @elseif($topic->name === 'Robotics')
                                            <img loading="lazy" src="/images/topics/new_images/Arduino.jpg"
                                                class="rounded-3xl " alt="robotics">
                                        @else
                                            <img loading="lazy" src="/images/topics/new_images/{{ $topic->name }}.jpg"
                                                class="rounded-3xl ">
                                        @endif
                                    </div>
                                    @endif

                                    @if(Request::segment(1) === 'school-program' && $topic->name === 'Scratch' ||Request::segment(1) === 'school-program' && $topic->name === 'Python' || Request::segment(1) === 'school-program' && $topic->name === 'JavaScript' || Request::segment(1) === 'school-program' && $topic->name === 'Java')
                                    <div>
                                        @if ($topic->name === 'Scratch')
                                            <img loading="lazy" src="/images/topics/new_images/Scratch.png" alt="scratch" class="rounded-3xl">
                                        @elseif($topic->name === 'Python')
                                            <img loading="lazy" src="/images/topics/new_images/Python.png" class="rounded-3xl " alt="robotics">
                                        @elseif($topic->name === 'JavaScript')
                                            <img loading="lazy" src="/images/topics/new_images/Web Design.png" class="rounded-3xl " alt="robotics">
                                        @elseif($topic->name === 'Java')
                                        <img loading="lazy" src="/images/topics/new_images/Java.png" class="rounded-3xl " alt="robotics">
                                        @else
                                         <img loading="lazy" src="/images/topics/new_images/{{$topic->name}}.png"  alt="{{$topic->name}}" class="rounded-3xl ">
                                        @endif
                                    </div>
                                    @endif

                                    @if (Request::segment(1) === 'school-program')
                                        @if ($topic->name === 'Python')
                                            <div class="text-center mt-3">
                                                <a href="/curriculum/python.pdf" target="_blank"><span
                                                        class="mb-5 shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">Python
                                                        Curriculum</span></a>
                                            </div>
                                        @elseif($topic->name === 'JavaScript')
                                            <div class="text-center mt-3">
                                                <a href="/curriculum/web_design.pdf" target="_blank"><span
                                                        class="mb-5 shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">
                                                        Web Design Curriculum</span></a>
                                            </div>
                                        @elseif($topic->name === 'Java')
                                            <div class="text-center mt-3">
                                                <a href="/curriculum/java.pdf" target="_blank"><span class="mb-5 shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">Java
                                                        Curriculum</span></a>
                                            </div>
                                        @elseif($topic->name === 'Scratch')
                                            <div class="text-center mt-3">
                                                <a href="/curriculum/scratch.pdf" target="_blank"><span
                                                        class="mb-5 shadow-primary space-x-1 inline-flex items-center px-4 py-2 text-sm border border-primary rounded-full text-white bg-primary hover:bg-primary-darker-1 hover:text-white focus:outline-none">Scratch
                                                        Curriculum</span></a>
                                            </div>
                                        @endif
                                    @endif
                                </a>
                            </div>

                        @endforeach

                    </div>


                </div>

            </div>
        </section>
    </div>
</div>
