@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Topics</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 style="text-align: center">{{$topic}}</h1><br>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Post</th>
                      <th scope="col">Author</th>
                     
                      <th scope="col">Created_at</th>
                    </tr>
                  </thead>
                  <tbody>
   
   
                  @if(isset($posts))
                  @foreach($posts as $post)
                     <tr>
                          <th scope="row">{{$post['post']}}</th>
                          <td>{{ \App\Post::getLogin($post['id']) }}</td>
                         
                          <td>{{$post['created_at']}}</td>
                     </tr>
                  @endforeach
                  @endif
                  </tbody>
                </table>
                <br><br><br>
                  <form action="post/{{$topic_id}}" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">New post</label>
                        <input  required type="text" name="post" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        
                      </div>
                     
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
