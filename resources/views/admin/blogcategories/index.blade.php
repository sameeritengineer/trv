@extends('layouts.app')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Blog categories</h4>
                  @if(Session::get('alert'))
            <div class="alert alert-{{ Session::get('alert') }} alert-dismissible" role="alert">
                <p>{{ Session::get('message') }} </p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
          @endif
                  <p class="card-description">
                    <a href="{{ route('admin.create-category') }}" class="btn btn-primary pull-right" role="button">Add category</a>
                  </p>
                  <div class="table-responsive">
                    <table id="tesTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($testimonials as $test)
                        <tr>
                          <td class="py-1">
                            {{$test->id}}
                          </td>
                          <td>
                            {{$test->name}}
                          </td>
                          <td>
                            {!!$test->description!!}
                          </td>
                          <td>
                            <span class="badge" style="background-color:{{$test->status =='active' ? '#5cb85c' : '#c3c50a'}}">
 {{$test->status == 'active' ? 'Active' : 'In-Active'}}</span> 
                          </td>
                          <td>
                            <a href="{{ route('admin.edit-category',$test->id) }}" class="btn btn-primary">Edit</a>
                        <a data-toggle="modal" data-id="{{$test->id}}" data-target="#exampleModal" href="#" class="btn btn-danger get_delete">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

                <!-- /.table-responsive -->
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
        <form action="{{ route('admin.delete-testimonial') }}" method="post">
          @csrf
          <input type="hidden" name="testimonialId" id="testimonialId" value="">
        <button type="submit" class="btn btn-primary">Delete</button>
       </form>
      </div>
    </div>
  </div>
</div>

      </div>
@endsection
@section('footer.script')
<script type="text/javascript">
  $(document).ready( function () {
    $('#tesTable').DataTable();
    $(".get_delete").click(function(){
        var id = $(this).attr('data-id');
        $("#testimonialId").val(id);
    });
  });
</script>
@endsection