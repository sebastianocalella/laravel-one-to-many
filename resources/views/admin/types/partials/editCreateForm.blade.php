
<div class="container my-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <h4>Please make sure to insert data correctly</h4>
        </div>
    @endif
    <form class="text-white bg-dark py-3 px-4 d-flex align-items-end justify-content-around rounded py-4" action="{{route($routeName, $type)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)
        <div class="form-group col-8">
            <label for="type-name" class="form-label">projectt title:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="type-name" placeholder="insert type name here" name="name" value="{{old('name', $type->name)}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        @if ($method == 'POST')
            <button type="submit" class="btn btn-primary">Create Post</button>
        @else
            <button type="submit" class="btn btn-warning">Modify Post</button>
        @endif
    </form>
</div>
