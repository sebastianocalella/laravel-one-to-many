
<div class="container my-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <h4>Please make sure to insert data correctly</h4>
        </div>
    @endif
    <form class="text-white bg-dark py-3 px-4" action="{{route($routeName, $project)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)
        <h3>Author: {{Auth::user()->name}}</h3>
        <div class="form-group col-8">
            <label for="project-title" class="form-label">projectt title:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="project-title" placeholder="insert project title here" name="title" value="{{old('title', $project->title)}}">
            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group col-2 mt-3">
            <label for="project-type" class="form-label"> project-type:</label>
            <select class="form-control" name="type_id" id="project-type">
                @foreach ($types as $type)
                    <option value="{{$type->id}}" {{ old('type_id', $project->type_id) ==  $type->id ? 'selected' : '' }}>{{$type->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group my-3">
            <label for="project-description">Address 2</label>
            <textarea rows="8" type="text" class="form-control @error('description') is-invalid @enderror" id="project-description" placeholder="Once upon a time..." name="description">{{old('description', $project->description)}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
            <div class="my-3">
                <input id="is-urgent" class="form-check-input" type="checkbox" value="1" {{old('is_urgent', $project->is_urgent) ? 'checked' : ''}} name="is_urgent">
                <label class="form-check-label" for="is-urgent">important</label>
            </div>
        </div>

        <div class="form-group my-3">
            <label for="project-image">Project Image</label>
            <input class="form-control @error('image_path') is-invalid @enderror" type="file" id="project-image" name="image_path" value="{{old('image_path', $project->image_path)}}">
            @error('image_path')
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
