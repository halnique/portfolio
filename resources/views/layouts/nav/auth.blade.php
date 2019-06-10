<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value="{{ __('Logout') }}">
    </form>
</li>
