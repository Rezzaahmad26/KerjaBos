<div class="">
    <nav class="container max-w-[1280px] mx-auto flex items-center flex-wrap justify-between p-4 rounded-[20px] pt-[30px]  gap-y-3 sm:gap-y-0">
        <a href="{{route('front.index')}}">
            <img src="{{asset('assets/logos/logo.svg')}}" class=""  alt="logo">
        </a>
        <ul class="flex items-center flex-wrap gap-x-[30px]">
            <li>
                <a href="{{route('front.index')}}" class="hover:font-semibold hover:text-[#FF611A] transition-all duration-300 {{request()->routeIs('front.index') ? 'text-[#FF611A] font-semibold'  : ''}} ">Browse</a>
            </li>
            <li>
                <a href="{{route('front.index')}}" class="hover:font-semibold hover:text-[#FF611A] transition-all duration-300">Categories</a>
            </li>
            @can('apply job')
            <li>
                <a href="{{route('dashboard.proposals')}}" class="hover:font-semibold hover:text-[#FF611A] transition-all duration-300">My Jobs</a>
            </li>
            @endcan
            @can('withdraw wallet')
            <li>
                <a href="{{route('dashboard.wallet')}}" class="hover:font-semibold hover:text-[#FF611A] transition-all duration-300">Wallets</a>
            </li>
            @endcan
            <li>
                <a href="#" class="hover:font-semibold hover:text-[#FF611A] transition-all duration-300">Help</a>
            </li>
        </ul>
        @auth
            <a href="{{route('dashboard')}}" class="flex items-center gap-3">
                <div class="flex flex-col items-center " >
                    <p class="font-semibold">Hi, {{Auth::user()->name}}</p>
                    <div class="text-sm text-[#030303] font-semibold ">

                        {{ Auth::user()->getRoleNames()->first() === 'project_freelancer' ? 'Freelancer' : 'Client' }}
                    </div>
                </div>
                <div class="w-[50px] h-[50px] rounded-full overflow-hidden flex shrink-0">
                    <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover" alt="photo">
                </div>
            </a>
        @endauth
        @guest
            <div class="flex items-center gap-3">
                <a href="{{route('login')}}" class="bg-[#030303] p-[14px_20px] rounded-full font-semibold text-white text-center w-fit text-nowrap">Sign In</a>
                <a href="{{route('register')}}" class="bg-[#FF611A] p-[14px_20px] rounded-full font-semibold text-white text-center w-fit text-nowrap">Sign Up</a>
            </div>
        @endguest
      </nav>
</div>

