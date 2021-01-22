@extends('layouts.backend.app')

@section('title', 'Category')

@push('css')
    
@endpush

@section('content')
<div class="container-fluid">
    <!-- Vertical Layout | With Floating Label -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ADD NEW CATEGORY
                    </h2>
                </div>
                <div class="body">
                    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name">
                                <label class="form-label">Category Name</label>
                               
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-float">
                            {{--  <div class="form-line">  --}}
                                <label class="form-label">Upload Image</label>
                                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image" onchange="loadFile(event)">
                                {{--  <img id="preview" src="#" width="100" height="100" class="img-thumbnail img-fluid mt-2">  --}}
                                <img id="preview">
                            {{--  </div>  --}}
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <a type="button" class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Vertical Layout | With Floating Label -->
</div>
@endsection

@push('js')
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