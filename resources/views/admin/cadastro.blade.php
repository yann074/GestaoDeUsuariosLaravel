@extends('layouts.content')
@section('main-content')<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>{{ $title }}</h3>
                </div>
                <div class="card-body">
                    <form class="form1" method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Nome</label>
                            <input class="form-control" type="text" name="name" placeholder="Digite seu nome" value="@if (isset($edit->id)) {{ $edit->name }}@else {{ old('name') }} @endif">
                            @error('name')
                            <div class="text-danger">Digite Seu nome</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email" placeholder="Enter Your Email" value="@if (isset($edit->id)) {{ $edit->email }}@else {{ old('email') }} @endif">
                            @error('email')
                            <div class="text-danger">Digite Seu Email válido</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="photo">Sua Foto</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept=".png, .jpg, .jpeg" onchange="previewImage(this)">
                            <div class="avatar-preview mt-3 text-center">
                                <div id="imagePreview" class="rounded" style="@if (isset($edit->id) && $edit->photo != '') background-image:url('{{ url('/') }}/uploads/{{ $edit->photo }}')@else background-image: url('{{ url('/img/avatar.png') }}') @endif; height: 150px; width: 150px; background-size: cover; background-position: center; margin: 0 auto;"></div>
                            </div>
                            @error('photo')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a class="btn btn-danger" href="{{ route('user.usuarios') }}">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script type="text/javascript">
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
                $("#imagePreview").hide();
                $("#imagePreview").fadeIn(700);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
    }
 
    .avatar-upload .avatar-preview {
        width: 67%;
        height: 147px;
        position: relative;
        border-radius: 3%;
        border: 6px solid #F8F8F8;
    }
 
    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 3%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>