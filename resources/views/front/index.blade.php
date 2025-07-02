@extends('front.layouts.app')
@section('content')
<body class="font-poppins bg-[#FFFFFF] pb-[100px] px-4 sm:px-0">

    <div class="bg-[#FFFBEE]">
        <x-nav/>

        <div class="container  mx-auto flex flex-col items-center justify-center gap-5 py-[57px]">
            <h1 class="text-[#7C5142] text-[40px] font-bold">Welcome to KerjaBos</h1>
            <h3 class="text-[#7C5142] text-[16px] font-medium pb-[30px]">Connecting Clients with Top Freelancers — Fast, Easy, and Secure.</h3>
            <div class="bg-[#FF611A] text-white p-[16px_45px] rounded-[20px] font-semibold text-center w-fit">
                <p>Explore</p>
            </div>

            <img src="{{asset('assets/photos/image-hero.svg')}}" class="w-full h-auto object-cover pt-[86px]" alt="hero">
        </div>

    </div>

    <div class="flex gap-[30px] items-center justify-center flex-wrap mt-10 text-[16px] text-[#1E1E1E] pt-[22px] px-[72px] ">
        <div class="flex items-start gap-[30px]  border-r border-[#E0E0E0] py-[4px]">
            <img src="{{ asset('assets/icons/Checklist.svg') }}" class="w-[41px] h-[41px] object-cover " alt="icon">
            <p class="pr-[36px]">Talented freelancers <br> across various fields</p>
        </div>
        <div class="flex items-start gap-[30px] border-r border-[#E0E0E0]">
            <img src="{{ asset('assets/icons/Checklist.svg') }}" class="w-[41px] h-[41px] object-cover" alt="icon">
            <p class="pr-[36px]">Simple, transparent <br> hiring process</p>
        </div>
        <div class="flex items-start gap-[30px] border-r border-[#E0E0E0]">
            <img src="{{ asset('assets/icons/Checklist.svg') }}" class="w-[41px] h-[41px] object-cover" alt="icon">
            <p class="pr-[36px]">Safe and secure <br> payments</p>
        </div>
        <div class="flex items-start gap-3">
            <img src="{{ asset('assets/icons/Checklist.svg') }}" class="w-[41px] h-[41px] object-cover" alt="icon">
            <p>From design to writing, coding to <br> translation — it's all here!</p>
        </div>
    </div>



    <section id="header" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 mt-[50px]">
        <h1 class="font-extrabold text-[40px] text-[#7C5142] leading-[45px] text-center sm:text-left mt-[50px]">Browse Your <br>Favorites Projects</h1>
        <div class="flex flex-col sm:flex-row justify-end items-center gap-3 w-full sm:w-auto mt-[50px]">
            <div class="p-2 pl-5 rounded-full bg-white border flex items-center justify-between gap-2 w-full sm:w-[500px] focus-within:ring-2 focus-within:ring-[#6635F1] transition-all duration-300">
                <button class="w-9 h-9 flex shrink-0 items-center justify-center">
                    <img src="{{asset('assets/icons/search.svg')}}" class="w-6 h-6 object-contain" alt="icon">
                </button>
                <input type="text" class="appearance-none outline-none focus:outline-none font-semibold placeholder:font-normal placeholder:text-[#545768] w-full" placeholder="search job by name...">
                <p class="bg-[#FF611A] text-white py-[10px] px-[31px] rounded-[20px]">Search</p>
            </div>
            <div class="h-[52px] w-0 border border-[#DCDAE3] hidden sm:block"></div>
            <button class="p-[14px_20px] bg-white rounded-full font-semibold">Job Filters</button>
        </div>
    </section>
    <section id="categories" class="container max-w-[1280px] mx-auto flex flex-col gap-4 mt-[50px]">
        <h2 class="font-bold text-xl text-[#7C5142] mt-[50px]">Browse Categories</h2>
            <div class="grid grid-cols-1 sm:grid-cols-5 gap-5 p-1 ">

                @forelse($categories as $category)
                    <a href="{{route('front.category', $category->slug)}}" class="card group ">
                        <div class="w-[224px] h-full p-5 rounded-[20px] flex flex-col border gap-[30px] bg-white transition-all duration-300 group-hover:bg-[#FF611A] shadow-md group-hover:shadow-lg">
                            <div class="w-[70px] h-[70px] flex shrink-0">
                                <img src="{{Storage::url($category->icon)}}" alt="icon" class="transition-all duration-300 ">
                            </div>
                            <div class="flex flex-col gap-[6px]">
                                <p href="" class="font-semibold text-sm transition-all duration-300 group-hover:text-white">{{ $category->name }}</p>
                                <p class="text-sm text-[#545768] transition-all duration-300 group-hover:text-white">{{ $category->projects()->count()}} jobs available</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>Belum ada kategori terbaru</p>
                @endforelse

            </div>
    </section>
    <section id="featured" class="container max-w-[1280px] mx-auto flex flex-col gap-4 mt-[50px]">

        <h2 class="font-bold text-xl text-[#7C5142]">Featured Projects</h2>
        <div class="flex justify-between ">

            @forelse($projects->take(3) as $project)
                <a href="{{route('front.details', $project)}}" class="card w-[276px] h-[322px]">
                    <div class="p-5 rounded-[20px] border shadow-md bg-white flex flex-col gap-5 hover:ring-2 hover:ring-[#FF611A] transition-all duration-300">
                        <div class="w-full h-[140px] rounded-[20px] overflow-hidden relative">
                            @if($project->has_finished)
                                <div class="font-bold text-xs leading-[18px] text-white bg-[#F3445C] p-[2px_10px] rounded-full w-fit absolute top-[10px] left-[10px]">
                                    CLOSED
                                </div>
                            @elseif($project->has_started)
                                <div class="font-bold text-xs leading-[18px] text-white bg-[#2E82FE] p-[2px_10px] rounded-full w-fit absolute top-[10px] left-[10px]">
                                    IN PROGRESS
                                </div>
                            @else
                                <div class="font-bold text-xs leading-[18px] text-white bg-[#2E82FE] p-[2px_10px] rounded-full w-fit absolute top-[10px] left-[10px]">
                                    HIRING
                                </div>
                            @endif

                            <img src="{{Storage::url($project->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                        </div>

                        <div class="flex flex-col gap-[10px]">
                            <p class="title font-semibold text-lg min-h-[56px] line-clamp-2 hover:line-clamp-none">
                                {{$project->name}}
                            </p>
                            <div class="flex items-center gap-[6px]">
                                <div><img src="assets/icons/dollar-circle.svg" alt="icon"></div>
                                <p class="font-semibold text-sm">Rp{{number_format($project->budget, 0, ',', '.')}}</p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <div><img src="assets/icons/verify.svg" alt="icon"></div>
                                <p class="font-semibold text-sm">Payment Verified</p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <div><img src="assets/icons/crown.svg" alt="icon"></div>
                                <p class="font-semibold text-sm">{{$project->skill_level}}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <p>Belum ada data project terbaru</p>
            @endforelse

            <div class="flex flex-col sm:w-[300px] w-[276px] border-2 h-full shrink-0 bg-white rounded-[20px] p-5 gap-[30px] ">
                @auth
                    <div class="flex flex-col gap-3">
                        <h3 class="font-semibold">Your Profile</h3>
                        <div class="flex items-center gap-3">
                            <div class="w-[50px] h-[50px] rounded-full overflow-hidden flex shrink-0">
                                <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover" alt="photo">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <p class="font-semibold">Hi, {{Auth::user()->name}}</p>
                                <p class="text-sm leading-[21px] text-[#545768]">911 Finished Projects</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <div class="flex items-center">
                                <div>
                                    <img src="assets/icons/Star.svg" alt="star">
                                </div>
                                <div>
                                    <img src="assets/icons/Star.svg" alt="star">
                                </div>
                                <div>
                                    <img src="assets/icons/Star.svg" alt="star">
                                </div>
                                <div>
                                    <img src="assets/icons/Star.svg" alt="star">
                                </div>
                                <div>
                                    <img src="assets/icons/Star-grey.svg" alt="star">
                                </div>
                                <p class="font-semibold text-sm">(893)</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-[10px] rounded-[20px] p-[10px_14px] bg-[#030303]">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 flex shrink-0">
                                <img src="assets/icons/story.svg" alt="">
                            </div>
                            <p class="text-sm text-white">You have <span class="font-bold">{{Auth::user()->connect}}</span> connects available to get a new job</p>
                        </div>
                        <a href="{{route('front.out_of_connect')}}" class="font-semibold text-white text-sm hover:underline text-center">Top Up Connect</a>
                    </div>
                    <hr>
                @endauth
            </div>
        </div>
    </section>

  <section id="newest" class="container max-w-[1280px] mx-auto flex flex-col sm:flex-row sm:flex-nowrap gap-5 mt-[50px]">
        <div class="flex flex-col  gap-4 w-full">
            <div class="flex justify-between items-center">
                <h2 class="font-bold text-xl text-[#7C5142] ">Newest Projects</h2>
                <a href="#" class="flex justify-between items-center gap-2">
                    <h3 class="text-[#7C5142]">See all new projects</h3>
                    <img src="{{asset('assets/icons/right-brown.svg')}}" class="w-4 h-4 object-contain" alt="arrow">
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                @forelse($projects as $project)
                    <div class="card border shadow-md hover:ring-2 hover:ring-[#FF611A] transition-all duration-300 bg-white p-5 rounded-[20px] flex flex-col sm:flex-row sm:items-center gap-[18px] w-full">
                        <a href="{{route('front.details', $project)}}" class="w-full sm:w-[200px] h-[150px] flex shrink-0 rounded-[20px] overflow-hidden bg-[#D9D9D9]">
                            <img src="{{Storage::url($project->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                        </a>
                        <div class="flex flex-col gap-[10px]">

                            @if($project->has_finished)
                                <div class="font-bold text-xs leading-[18px] text-white bg-[#F3445C] p-[2px_10px] rounded-full w-fit">
                                    CLOSED
                                </div>
                            @else

                                @if($project->has_started)
                                    <div class="font-bold text-xs leading-[18px] text-white bg-[#2E82FE] p-[2px_10px] rounded-full w-fit">
                                        IN PROGRESS
                                    </div>
                                @else
                                <div class="font-bold text-xs leading-[18px] text-white bg-[#2E82FE] p-[2px_10px] rounded-full w-fit">
                                    HIRING
                                </div>
                                @endif
                            @endif

                            <a href="{{route('front.details', $project)}}" class="font-semibold text-lg leading-[27px]">{{$project->name}}</a>
                            <p class="text-sm leading-7 line-clamp-2">{{$project->about}}</p>
                            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                                <div class="flex items-center gap-[6px]">
                                    <div>
                                        <img src="assets/icons/dollar-circle.svg" alt="icon">
                                    </div>
                                    <p class="font-semibold text-sm">
                                        Rp {{number_format($project->budget, 0, ',', '.')}}
                                    </p>
                                </div>
                                <div class="flex items-center gap-[6px]">
                                    <div>
                                        <img src="assets/icons/verify.svg" alt="icon">
                                    </div>
                                    <p class="font-semibold text-sm">Payment Verified</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <div>
                                    <img src="assets/icons/crown.svg" alt="icon">
                                </div>
                                <p class="font-semibold text-sm">Beginner</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Belum ada data project terbaru</p>
                @endforelse

            </div>
        </div>


    </section>
  </section>
</body>
@endsection

