@extends('layouts.app')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create {{$type}}</h4>
                  @if(Session::get('alert'))
            <div class="alert alert-{{ Session::get('alert') }} alert-dismissible" role="alert">
                <p>{{ Session::get('message') }} </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
                  <form class="forms-sample" action="{{ route('admin.store-extra') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label for="exampleInputUsername1">Name :</label>
                      <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Name..." value="{{ old('name') }}">
            <p class="text-danger">{{ $errors->first('name') }}</p>
            <input type="hidden" name="type" value="{{$type}}">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All {{$type}}</h4>
                  <div class="table-responsive">
                    <table id="extraTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $test)
                        <tr>
                          <td class="py-1">
                            {{$test->id}}
                          </td>
                          <td>
                            {{$test->name}}
                          </td>
                          <td>
                        <a data-toggle="modal" data-type="{{$type}}" data-id="{{$test->id}}" data-target="#exampleModal" href="#" class="btn btn-danger get_delete">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('admin.delete-extra') }}" method="post">
          @csrf
          <input type="hidden" name="extraId" id="extraId" value="">
          <input type="hidden" name="extraType" id="extraType" value="">
        <button type="submit" class="btn btn-primary">Delete</button>
       </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer.script')
<script type="text/javascript">
  $(document).ready( function () {
    $('#extraTable').DataTable({ordering: false});
    $(".get_delete").click(function(){
        var id = $(this).attr('data-id');
        var type = $(this).attr('data-type');
        $("#extraId").val(id);
        $("#extraType").val(type);
    });
  });
</script>
@endsection