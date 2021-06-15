<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>getNews 24/7 | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        /* width */
        ::-webkit-scrollbar {
        width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
        background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
        background: #888;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
        background: #555;
        }
    </style>
</head>
<body class="bg-gradient bg-dark">
    @section('header')
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a href="/" class="navbar-brand">getNews 24/7</a>

                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="" class="nav-link">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    @show


    <div class="container my-5 py-5">
        <div class="row justify-content-between">
            @section('newsContent')
                <div class="col-7" style="overflow-x:hidden;overflow-y:auto;height:100vh;">
                @foreach ($news as $n )
                    <div class="col-10 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="fw-bold d-inline">
                                    {{$n->title}}
                                </h3>
                                  <span class="float-end small h6">{{date("j F Y",strtotime($n->created_at))}} at {{ date("H:i:s",strtotime($n->created_at))}}</span>
                                <h6>By {{$n->author}}</h6>
                                <p class="fw-bold">{{substr($n->post,0,50)}}.......</p>
                            </div>
                            <div class="row pb-2 px-3">
                                <a href="" class="btn btn-success col-4">View more...</a>
                                <a href="{{route('delete',['id'=>$n->id])}}" class="btn btn-danger ms-auto col-4">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            @show
            @section('newsForm')
                <div class="col-5 text-light fw-bold py-2" style="overflow-x:hidden;overflow-y:auto;height:80vh;">
                    <div class="col-10 float-end">
                        <form action="{{route('publish')}}" method="post">
                        <h3 class=text-light>Publish News</h3>
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">News Title</label>
                                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                @error('title')
                                    <div class="text-danger fw-bold small">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Author</label>
                                <input type="text" name="author" class="form-control" value="{{old('author')}}">
                                @error('author')
                                    <div class="text-danger fw-bold small">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">News Category</label>
                                <input type="text" name="category" class="form-control" value="{{old('category')}}">
                                @error('category')
                                    <div class="text-danger fw-bold small">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Write News</label>
                                <textarea name="news" class="form-control" value="{{old('news')}}" rows="3" placeholder="Write News...."></textarea>
                                @error('news')
                                    <div class="text-danger fw-bold small">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <input type="submit" name="post" value="Publish" class="fw-bold fs-4 w-100 btn btn-warning">
                            </div>
                        </form>
                    </div>
                </div>
            @show
        </div>
    </div>



    @section('footer')
        <div class="contianer-fluid bg-dark fixed-bottom">
            <div class="container">
                <div class="row text-light h5 text-center">
                   <p>This is Footer this is footer this is footer this is footer this is foter</p>
                </div>
            </div>
        </div>
    @show





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
