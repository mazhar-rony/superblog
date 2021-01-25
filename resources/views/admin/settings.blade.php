@extends('layouts.backend.app')

@section('title', 'Settings')

@push('css')
    
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SETTINGS
                        </h2>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="false">
                                    <i class="material-icons">face</i> PROFILE UPDATE
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#change_password_with_icon_title" data-toggle="tab" aria-expanded="true">
                                    <i class="material-icons">change_history</i> CHANGE PASSWORD
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="profile_with_icon_title">
                                <form action="{{route('admin.profile.update')}}" method="POST" 
                                    class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line {{ $errors->has('name') ? 'focused error' : '' }}">
                                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" 
                                                        placeholder="Enter your name" value="{{ !empty(old('name')) ? old('name') : Auth::user()->name }}">
                                                </div>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="email">Email Address</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line {{ $errors->has('email') ? 'focused error' : '' }}">
                                                    <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                                        placeholder="Enter your email address" value="{{ !empty(old('email')) ? old('email') : Auth::user()->email }}">
                                                </div>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="image">Profile Picture</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image" onchange="loadFile(event)">
                                                    
                                                    <img id="preview">
                                                
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="email_address_2">About : </label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="5" name="about" class="form-control">{{ Auth::user()->about }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div role="tabpanel" class="tab-pane fade" id="change_password_with_icon_title">
                                <form action="{{route('admin.password.update')}}" method="POST" 
                                    class="form-horizontal">
                                    @csrf
                                    @method('PUT')
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="old_password">Old Password</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line {{ $errors->has('old_password') ? 'focused error' : '' }}">
                                                    <input type="password" id="old_password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" 
                                                        placeholder="Enter Old Password">
                                                </div>
                                                @error('old_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="password">New Password</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line {{ $errors->has('password') ? 'focused error' : '' }}">
                                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                                        placeholder="Enter New Password">
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="password_confirmation">Confirm Password</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line {{ $errors->has('password_confirmation') ? 'focused error' : '' }}">
                                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" 
                                                        placeholder="Enter New Password Again">
                                                </div>
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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