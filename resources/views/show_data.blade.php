<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
            <a class="btn btn-primary my-3" href="{{url('/addData')}}">Add Data</a>
            <!-- Showing Message -->
            @if(Session::has('msg'))
            <p class="alert alert-success">{{ Session::get('msg') }}</p>
            @endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
            @foreach($showData as $key=>$data)
                <tr>
                    <td >{{ $key+1 }}</td>
                    <td >{{ $data->name }}</td>
                    <td >{{ $data->email }}</td>
                    <td >
                        <a href="{{'/editeData/'.$data->id }}" class="btn btn-success">Edit</a>
                        <a href="{{'/deleteData/'.$data->id }}" onClick = "return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
  </tbody>
</table>
        {{ $showData->links() }}
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>