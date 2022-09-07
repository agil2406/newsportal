
<div class="container">
<nav class="navbar navbar-expand-lg border-bottom " >
        <div class="container">
          <a class="navbar-brand" href="{{url('/news')}}">News Portal</a>
            <ul class="navbar-nav">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                            Logout
                            </button>
                          </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
