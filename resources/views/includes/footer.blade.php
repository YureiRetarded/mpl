<footer class="py-3 mt-4 include">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item">
            <a
                href="{{route('index')}}"
                class="nav-link px-2 text-muted">{{__('messages.navigate_home')}}
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{route('posts')}}"
                class="nav-link px-2 text-muted">{{__('messages.navigate_projects')}}
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{route('projects')}}"
                class="nav-link px-2 text-muted">{{__('messages.navigate_posts')}}
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{route('users')}}"
                class="nav-link px-2 text-muted">{{__('messages.navigate_users')}}
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{route('aboutProject')}}"
                class="nav-link px-2 text-muted">{{__('messages.about')}}
            </a>
        </li>
    </ul>
    <div class="text-center">
        <a
            href="{{route('index')}}"
            class="px-2 text-muted no-underline">
            MyProjectList
        </a>
    </div>
</footer>
