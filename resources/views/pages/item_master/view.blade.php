
@extends('layouts/contentLayoutMaster')

@section('title', 'View All Items')

@section('page-style')
        <!-- Page css files -->
        <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}"> 
@endsection
@section('content')
 @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
{{--                             <img src="uploads/{{ Session::get('image-upload') }}"> --}}
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
   <link rel="stylesheet" type="text/css" href="/css/website/custom_style.css">
   @if(Auth::user()->email == 'yug.spider@gmail.com')
   <div class="table-responsive">

   <table class="table table-info table-hover">
    <thead>
      <tr class="table-primary">
        <th>ID</th>
        <th>Item Name</th>
        <th>Item Price</th>
        <th>Item Description</th>
        <th>Item Image</th>
        <th>Publisher Name</th>
        <th>Item Created At</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($item_show as $Item)
        <tr>
          
          <td>{{ $id++ }}</td>
          <td>{{ $Item->item_name }}</td>
          <td>{{ $Item->item_price }}</td>
          <td>{{ $Item->item_description }}</td>
          <td><img src="uploads/{{ $Item->item_image }}" height="50"></td>
          <td>{{ $Item->user_name }}</td>
          <td>{{ date('d M 20y', strtotime($Item->created_at)) }}</td>

          <td>
            <form action="{{ route('edit_im', $Item->id) }}">
              @csrf
              <button href="#" class="btn btn-success">Edit</button>
            </form>
        </td>
        <td>
<form action="{{ route('delete_im', $Item->id) }}" method="POST">
                        @csrf
                        <button href="#" onclick="return confirm('Are you sure?')" data-toggle="modal" data-target="#myModal" class="btn btn-warning">Delete</button>
                        </form>
        </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{-- {{ $view_category->links() }} --}}
      </div>
      {{-- <div class="col-md-5">
        <br>
        <h3>View All your Categories inserted.</h3>
        <h5>Want to add Theme. Click the button below</h5>
        <a href="{{ url('theme-create') }}" class="btn btn-outline-primary float-left btn-inline">Move to add Themes</a>
        <br>
        <br>
        <br>
        <h5>Want to add more categories. Click the button below</h5>
        <a href="{{ url('category') }}" class="btn btn-primary float-left btn-inline">Add more Category</a>
      </div> --}}
      @else
      You are not authorized
   @endif
</section>
@endsection


