<div class="card mb-3 " role="button" onclick="location.href='{{route('user.index',['user'=>$user->link])}}'">
    <div class="row g-0">
        <div class="col-md-4">
            <img
                src="{{ $user->avatar != '' && Storage::exists('public/' . $user->avatar) ? asset('/storage/'.$user->avatar) : asset('/storage/no_image.png') }}"
                class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h3 class="card-title">{{$user->name}}</h3>
                <h4 class="card-text">{{__('messages.projects')}}: <a
                        class="no-underline"
                        href="/users/{{$user->link}}/projects">{{$user->projects->count()}}</a></h4>
                <h4 class="card-text">{{__('messages.posts')}}: <a
                        class="no-underline"
                        href="/users/{{$user->link}}/posts">{{$user->posts->count()}}</a></h4>
                <p class="card-text">{{isset($user->about)?mb_strimwidth($user->about,0,500,'...'):$user->name.' '.__('messages.no_user_description')}}</p>
            </div>
        </div>
    </div>
</div>
