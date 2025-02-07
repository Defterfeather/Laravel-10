<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bleajar CRUD Laravel 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  </head>
  <body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="">
                    <h3 class="text-center my-4">Data Postingan Berita SKARLA</h3>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">TAMBAH BERITA</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">CONTENT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post )
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/posts/' . $post->image) }}" class="rounded"
                                            style="150px" alt="">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('posts.destroy' ,$post->id) }}" method="POST" onclick="return confirm('Apakah anda yakin ?')">
                                            <a href="{{ route('posts.show' , $post->id) }}" class="btn btn-dark">View</a>
                                            <a href="{{ route('posts.edit' , $post->id) }}" class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    data post belom ada
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Data Berhasil DIsimpan',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif
  </body>
</html>
