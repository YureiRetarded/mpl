<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('index')}}">MyProjectList</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".dual-collapse1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-0 dual-collapse1">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('projects')) ? 'active' : '' }}"
                       href="{{route('admin.projects')}}">{{__('messages.navigate_projects')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('posts')) ? 'active' : '' }}"
                       href="{{route('admin.posts')}}">{{__('messages.navigate_posts')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('user')) ? 'active' : '' }}"
                       href="{{route('admin.users')}}">{{__('messages.navigate_users')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('tags')) ? 'active' : '' }}"
                       href="{{route('admin.tags')}}">{{__('messages.tags')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('roles')) ? 'active' : '' }}"
                       href="{{route('admin.roles')}}">{{__('messages.roles')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('statuses')) ? 'active' : '' }}"
                       href="{{route('admin.statuses')}}">{{__('messages.statuses')}}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

