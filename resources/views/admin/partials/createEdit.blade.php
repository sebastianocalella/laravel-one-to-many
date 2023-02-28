
<div class="container my-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <h4>Please make sure to insert data correctly</h4>
        </div>
    @endif
    <form class="text-white bg-dark py-3 px-4" action="{{route($routeName, $post)}}" method="POST">
        @csrf
        @method($method)
        <h3>Author: {{Auth::user()->name}}</h3>
        <div class="form-group col-8">
            <label for="post-title" class="form-label">post title:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="post-title" placeholder="insert post title here" name="title" value="{{old('title', $post->title)}}">
            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="post-content">Address 2</label>
            <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="text-content" placeholder="Once upon a time..." name="content">
                {{old('content', $post->content)}}
            </textarea>
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
        </div>
        <h4>date: {{now()->format('Y/m/d H:i:s')}}</h4>
        @if ($method == 'POST')
            <button type="submit" class="btn btn-primary">Create Post</button>
        @else
            <button type="submit" class="btn btn-warning">Modify Post</button>
        @endif
    </form>
</div>
