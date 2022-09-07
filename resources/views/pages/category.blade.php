@extends('layouts.app')

@section('title')
News
@endsection

@section('content')

<div >
  <div class="container-fluid mt-5">
    {{-- Session --}}
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Create Form --}}
    <div class="justify-content-center">
      <div class="accordion accordion-flush shadow rounded " id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Tambah Data
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <form action="{{url('/news')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                      <label for="title" class="form-label ">Title</label>
                      <input type="text" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" placeholder="" value="{{ old('title')}}" required>
                      @error('title')
                           <div class="invalid-feedback">
                            {{$message}}
                          </div>
                       @enderror
                  </div>
                  <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select @error('category_id') is-invalid  @enderror" aria-label="Default select example" name="category_id">
                        @foreach ($categories as $category)
                        @if(old('category_id') == $category->id)
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                        @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea class="form-control @error ('description') is-invalid @enderror" id="description" rows="3"  name="description" value="{{ old('description')}}" required></textarea>
                      @error('description')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                      @enderror
                   </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control @error ('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*">
                        @error('image')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="text-end mb-3">
                      <button type="submit" class="btn btn-outline-primary">Tambah Data</button>
                    </div>
              </form>
  
            </div>
          </div>
        </div>    
      </div>
    </div>
   
  </div>
    {{-- categories content --}}
    <div class="my-3 border-start px-2 border-dark border-2 d-flex">
        <h3 class="font-bold fst-italic mt-2">News trending</h3> 
        @foreach ($categories as $category)
        <a href="{{url('categories'.'/'.$category->slug)}}">
          <button class="fst-italic mx-2 mt-3 btn btn-sm btn-outline-dark rounded-pill">{{$category->name}}</button> 
        </a>
        @endforeach
      </div>
{{-- card View --}}
  <div class="my-2">
    <div class="row row-cols-1 row-cols-md-3 g-3">
      @foreach ($news as $n )
      <div class="col">
        <a href="{{url('/news'.'/'.$n->slug)}}" style="text-decoration: none; color:black;">
        <div class="card h-100 shadow">
          <div class="card-body">
            <h5 class="card-title">{{$n->title}}</h5>
            <p class="card-text fst-italic text-black-50">{{ date('F d, Y', strtotime($n->created_at))}} {{$n->user->name}}</p>
            <p class="card-text">{{$n->description}}</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">{{$n->category->name}}</small>
          </div>
        </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</div>


@endsection