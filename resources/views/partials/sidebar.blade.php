<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <div class="card card-sidebar-mobile">
        
        <ul class="nav nav-sidebar" data-nav-type="accordion">

            <li class="nav-item"><a href="{{ route('pages.create') }}" class="nav-link ">Create new</a></li>
            <li class="nav-item"><a href="{{ route('pages.index') }}" class="nav-link ">Manage project</a></li>        
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span>project:</span>
                </a>
            </li>
            {{-- @foreach ($collection as $item)
            <li class="nav-item">
                <a href="{{ route('pages.show', ['name' => $item->name]) }}" class="nav-link">
                    <span>{{ $item->name }}</span>
                </a>
            </li>
        @endforeach --}}
        
        </ul>
    </div>
</div>