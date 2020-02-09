<nav class=" d-none d-md-block bg-transparent sidebar">
    <div class="d-flex justifycontent-center align-items-center nav-categories">
        <ul class="nav flex-column bg-warning rounded-right py-3">
            <button onclick="openNav()"
                    class="btn bg-transparent text-dark font-weight-bold ml-auto shadow-none">
                <div class="p" style="writing-mode: vertical-rl; text-orientation: mixed;">Categories</div>
            </button>
        </ul>
    </div>
    <div class="sidebar-sticky d-flex justifycontent-center align-items-center mysidebar" id="mySidebar">
        <ul class="nav flex-column bg-warning rounded-right py-3" style="width: 10rem">
            <a href="javascript:void(0)" onclick="closeNav()" id="main" class="nav-link text-dark ml-auto">
                <i data-feather="minimize-2" style="color: black"></i>
            </a>
            @foreach($categories as $item)
                <li class="nav-item">
                    <a class="nav-link {{request()->is('dashboard')?'active': ''}}" href="/dashboard">
                        {{$item->name}}<span class="sr-only">(current)</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
