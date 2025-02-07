<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bleajar CRUD Laravel 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" name="image" class="form-control
                            @error('image')
                               is-invalid
                            @enderror">

                            {{-- pesan error --}}
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL</label>
                            <input type="text" name="title" class="form-control
                            @error('title')
                               is-invalid
                            @enderror" value="{{ old('title') }}" placeholder="Masukan Judul post">

                            {{-- pesan error --}}
                            @error('title')
                            <div class="alert alert-danger mt-2">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">KONTEN</label>
                            <textarea name="content"
                             @error('content')
                             is-invalid
                             @enderror cols="30" rows="10">{{ old('content') }}</textarea>
                            {{-- pesan error --}}
                            @error('content')
                            <div class="alert alert-danger mt-2">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-primary">SIMPAN DATA</button>
                        <button type="reset" class="btn btn-outline-primary">RESET DATA</button>
                        <button type="button" onclick="goback()" class="btn btn-outline-secondary">BACK</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        @if (session()->has('success'))

        toastr.succes('{{ session('success') }}','BERHASIL!');
        @elseif (session()->has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
    <script>
        function goback()
        {
            window.history.back();
        }
    </script>
  </body>
</html>
