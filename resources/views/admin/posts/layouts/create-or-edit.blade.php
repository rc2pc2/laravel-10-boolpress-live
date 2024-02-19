@extends('layouts.admin')

@section('head-title')
    @yield('page-title')
@endsection

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-7">
            @include('partials.errors')

            {{-- @dump($tags->pluck('name')) --}}

            <form action="@yield('form-action')" method="POST" enctype="multipart/form-data">
                @csrf
                @yield('form-method')

                <div class="mb-3 input-group">
                    <label for="title" class="input-group-text">Post title:</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title)}}">
                </div>


                <div class="mb-3 input-group">
                    <label for="category_id" class="input-group-text">Category:</label>
                    <select class="form-select" type="text" name="category_id" id="category_id" >
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                style="color: {{ $category->color }}"
                                {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 input-group">
                    <div>
                        @foreach ($tags as $tag)
                            <input class="form-check-input" type="checkbox" name="tags[]" id="tags-{{ $tag->id }}" value="{{ $tag->id }}"
                            {{-- ? se il tag su cui sto ciclando e' presente nei tag che ho inviato e ora voglio rivedere come errore, selezionalo, se invece non ho avuto alcun errore, cercalo all'interno della lista dei tag presenti nel mio post --}}
                            {{ in_array( $tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'checked' : '' }}>

                            <label for="tags-{{ $tag->id }}"> {{ $tag->name }}</label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3 input-group">
                    <label for="date" class="input-group-text">Date:</label>
                    <input class="form-control" type="date" name="date" id="date" value="{{ old('date', $post->date)}}">
                </div>

                <div class="mb-3 input-group">
                    <label for="post_image" class="input-group-text">Upload a post image</label>
                    <input class="form-control" type="file" name="post_image" id="post_image" value="{{ old('post_image', $post->post_image)}}">
                </div>
                <div class="mb-3 input-group">
                    <img src="" alt="Image preview" class="d-none img-fluid" id="image-preview">
                </div>

                <div class="mb-3 input-group">
                    <label for="content" class="input-group-text">Post content:</label>
                    <textarea class="form-control"  name="content" id="content" cols="30" rows="10">{{ old('content', $post->content)  }}</textarea>
                </div>
                <div class="mb-3 input-group">
                    <button type="submit" class="btn btn-xl btn-primary">
                        @yield('page-title')
                    </button>
                    <button type="reset" class="btn btn-xl btn-warning">
                        Reset all fields
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('post_image').addEventListener('change', function(event){
        const imageElement = document.getElementById('image-preview');
        imageElement.setAttribute('src' , this.value);
        imageElement.classList.remove('d-none');
    });
</script>
@endsection