@extends('layouts.app')

@section('title')
Edit News
@endsection

@section('content')

<section class="dashboard my-5">
    <div class="container">
        <div class="row mt-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit - News</h5>
                    <form action="{{url('/news').'/'.$news->slug}}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label for="title" class="col-form-label">Title</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" value="{{ $news->title}}" required autofocus>
                                @error('title')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label for="category_id" class="col-form-label">Category</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-select @error('category_id') is-invalid  @enderror" aria-label="Default select example" name="category_id">
                                    @foreach ($categories as $category)
                                    @if(('category_id') == $news->category_id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                    @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                          </div>
                        <div class="row mt-3">
                            <div class="col-md-2 ">
                                <label for="description" class="col-form-label">Description</label>
                                @error('description')
                                <p class="text-danger"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control" id="description" rows="3"  name="description" value="{{$news->description}}">{{$news->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label for="image" class="col-form-label">Image</label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" class="form-control @error ('image') is-invalid @enderror" id="image" name="image" value="{{ $news->image}}">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <img src="{{url('storage/'.$news->image)}}" class="card-img-top" alt="">
                            </div>
                        </div>


                        <div class="text-end">
                            <button class="btn btn-outline-primary tn-block gradient-custom-2 center mt-2 mb-2" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
</section>

@endsection