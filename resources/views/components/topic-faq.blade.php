<div>
    @if ($topicResource)

        <section class="py-20 capitalize" id="faqs">
            <h3 class="text-center">About {{ $name }}</h3>
            <div class="bg-white p-5 shadow-lg md:max-w-5xl md:mx-auto rounded-xl space-y-2">
{{--                <div class="text-white p-5 rounded-lg bg-orange-500"--}}
{{--                    style="background-color:{{ $color }}!important;">--}}
{{--                    Details about {{ $name }}--}}
{{--                </div>--}}

                @foreach ($topicResource as $topic)
                    <div tabindex="0" class="border rounded-lg border-transparent">
                        <div
                            class="accordion flex items-center justify-between p-4 rounded text-black-lighter-1  cursor-pointer bg-gray-100">
                            <div>{{ $topic->question }}</div>
                            <svg class="w-4 h-4 text-black-lighter-1 duration-300" viewBox="0 0 13 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.072 1.07143C12.072 0.982143 12.0274 0.881696 11.9604 0.814732L11.4024 0.256696C11.3354 0.189732 11.235 0.145089 11.1457 0.145089C11.0564 0.145089 10.956 0.189732 10.889 0.256696L6.50285 4.64286L2.11669 0.256696C2.04973 0.189732 1.94928 0.145089 1.85999 0.145089C1.75955 0.145089 1.67026 0.189732 1.6033 0.256696L1.04526 0.814732C0.978298 0.881696 0.933655 0.982143 0.933655 1.07143C0.933655 1.16071 0.978298 1.26116 1.04526 1.32812L6.24615 6.52902C6.31312 6.59598 6.41357 6.64062 6.50285 6.64062C6.59214 6.64062 6.69258 6.59598 6.75955 6.52902L11.9604 1.32812C12.0274 1.26116 12.072 1.16071 12.072 1.07143Z"
                                    fill="black"></path>
                            </svg>
                        </div>
                        <div class="py-2 px-6 panel">
                            <p>{!! $topic->answer !!} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</div>

@section('script')
    <script>
        // FAQs Script
        $(document).ready(function() {
            var acc = document.getElementsByClassName("accordion");
            var i;
            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    var c = this.children;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                        c[1].classList.remove("svg_arrow_up");
                    } else {
                        panel.style.display = "block";
                        c[1].classList.add("svg_arrow_up");
                    }
                });
            }
        });
    </script>
@endsection
