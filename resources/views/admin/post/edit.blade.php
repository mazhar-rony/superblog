@extends('layouts.backend.app')

@section('title', 'Post')

@push('css')
<!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            EDIT POST
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('title') ? 'focused error' : '' }}">
                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" 
                                    name="title" value="{{ !empty(old('title')) ? old('title') : $post->title }}">
                                <label class="form-label">Category Title</label>
                                
                            </div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            {{--  <div class="form-line">  --}}
                                <label class="form-label">Featured Image</label>
                                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image" onchange="loadFile(event)">
                                @if (isset($post->image))
                                    <img id="preview" src='{{ asset("/storage/post/$post->image") }}'
                                        height="100px" width="100px" alt="Category Image">
                                @else
                                {
                                    <img id="preview">
                                }
                                    
                                @endif
                            {{--  </div>  --}}
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <input type="checkbox" id="publish" name="status" class="filled-in" 
                                value="1" {{ $post->status == true ? 'checked' : '' }}>
                            <label for="publish">Publish</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Categories and Tags
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('categories') ? 'focused error' : '' }}">
                                <label for="category">Select Category</label>
                                <select name="categories[]" id="category" data-live-search="true" 
                                    class="form-control show-tick @error('categories') is-invalid @enderror" multiple>
                                    @foreach ($categories as $category)
                                        <option 
                                            @foreach ($post->categories as $postCategory)
                                                {{ $postCategory->id == $category->id ? 'selected' : '' }}
                                            @endforeach
                                            value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('categories')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line {{ $errors->has('tags') ? 'focused error' : '' }}">
                                <label for="tag">Select Tag</label>
                                <select name="tags[]" id="tag" data-live-search="true" 
                                    class="form-control show-tick @error('tags') is-invalid @enderror" multiple>
                                    @foreach ($tags as $tag)
                                        <option
                                            @foreach ($post->tags as $postTag)
                                                {{ $postTag->id == $tag->id ? 'selected' : '' }}
                                            @endforeach
                                            value="{{ $tag->id }}">{{ $tag->name }}                                            
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <a type="button" class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.post.index') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            POST BODY
                        </h2>
                    </div>
                    <div class="body">
                        <textarea id="tinymce" name="body" class="@error('body') is-invalid @enderror">
                            {{ $post->body }}
                        </textarea>
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>    
                </div>
            </div>
        </div>
    </form>
    <!-- Vertical Layout | With Floating Label -->
</div>
@endsection

@push('js')
<!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

<!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>

    <script type="text/javascript">
        
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true,
                relative_urls: false
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });

    </script>
    
<!-- Preview Image -->
    <script type="text/javascript">
        
        var loadFile = function(event) {
            var preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = function() {
                preview.style.height = '100px';
                preview.style.width = '100px';
               
            URL.revokeObjectURL(preview.src) // free memory
            }
        };
          
    </script>
@endpush