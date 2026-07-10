<nav class="navbar bg-white shadow-sm px-4">

    <h4 class="mb-0">
        Dashboard
    </h4>

    <div>

        @if (isset(auth()->user()->name))
            {{ auth()->user()->name }}
        @endif

        <form action="{{ route('logout') }}"
              method="get"
              class="d-inline">

            @csrf

            <button class="btn btn-danger btn-sm">

                Logout

            </button>

        </form>

    </div>

</nav>