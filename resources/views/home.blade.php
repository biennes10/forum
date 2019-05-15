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
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Subject</th>
                      <th scope="col">Author</th>
                      <th scope="col">NB</th>
                      <th scope="col">Created_at</th>
                    </tr>
                  </thead>
                  <tbody>
   
   
  
                  @foreach($topics as $topic)
                     <tr>
                          <th scope="row"><a href="topic/{{$topic['id']}}"class="btn btn-primary">{{$topic['topic']}}</a></th>
                          <td>{{ \App\Topic::getLogin($topic['id']) }}</td>
                          <td>{{ \App\Topic::getNb($topic['id']) }}</td>
                          <td>{{$topic['created_at']}}</td>
                     </tr>
               



                  @endforeach

                  </tbody>
                </table>
                <br><br><br>
                  <form action="topic" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">New topic</label>
                        <input  required type="text" name="topic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        
                      </div>
                     
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
