@extends("layouts.app")

@section("content")

<div class="container">
    @if($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $err)
        {{$err}}

        @endforeach

    </div>
    @endif

    <div class="card border-primary">
        <div class="card-body">
            <h4 class="card-title">
                {{$article->title}}
            </h4>
            <div class="text-muted small">
                <b>Category: </b>{{$article->category->name}},
                {{$article->created_at->diffForHumans()}}

            </div>


        <div>
        {{$article->body}}
    </div>
    @auth

@can("article-delete",$article)


    <a href="{{url ("/articles/delete/$article->id")}}"
        class="btn btn-danger btn-sm">Delete</a>
@endcan
@endauth
    </div>
</div>

<hr>
    <ul class="list-group">
        <li class="list-group-item active">
            Comments
            {{(count($article->comments))}}
        </li>
        @foreach ($article->comments as $comment)
        <li class="list-group-item">
            <b class="text-success">{{$comment->user->name}}</b>
            @can("comment-delete",$comment)


            <a href="{{url("/comments/delete/$comment->id")}}"
            class="btn-close float-end"></a>
             @endcan
            {{ $comment->content }}
        </li>

        @endforeach
    </ul>
    @auth
    <form action="{{url("/comments/add")}}" method="post">
    @csrf
    <input type="hidden" name="article_id" value="{{$article->id}}">
    <textarea name="content" class="form-control mb-2"></textarea>
    <button class="btn btn-secondary">Add Comment</button>
    </form>
    @endauth
</div>
@endsection
