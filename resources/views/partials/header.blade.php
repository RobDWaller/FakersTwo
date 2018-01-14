<div>
    @if (Auth::check())
        <div>
            &commat;{{Auth::user()->userDetail()->first()->screen_name}}
        </div>
        <div>
            <a href="{{ url('/authenticate/logout') }}" id="logout">Logout</a>
        </div>
    @endif
</div>
