@extends('layouts.app')

@section('title')
News | Detail 
@endsection

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$news->title}}</h4>
                <div class="row">
                    <div class="col-md-8">
                        <p class="card-text fst-italic text-black-50">
                        {{$news->category->name}} {{$news->user->name}}
                        </p>
                    </div>
                    <div class="col-md-8">
                        <p>
                            {{$news->description}}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{url('storage/'.$news->image)}}" class="card-img-top" alt="">
                    </div>
                </div>
                <div class="row">               
                    <div class="d-flex align-items-start">
                    <div class="col-lg-1 col-3 ml-2 ">
                           <a href="{{url('/news')}}"> <button class="btn btn-outline-dark tn-block gradient-custom-2 center mt-2 mb-2">Back</button> </a>
                    </div>
                    <div class="col-lg-1 col-3 ">
                       <a href="{{url('/news').'/'.$news->slug.'/edit'}}"> <button class="btn btn-outline-primary tn-block gradient-custom-2 center mt-2 mb-2">Edit</button> </a>
                    </div>
                    <div class="col-lg-1 col-3 mt-2">
                       <form action="{{url('/news').'/'.$news->slug}}" method="POST" >
                        @method('delete')
                        @csrf
                        <button class="btn btn-outline-danger" type="submit" value="Delete" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</i></button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection