@extends('layouts.app')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-9 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create Testimonail</h4>
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
                  <form class="forms-sample" action="{{ route('admin.update-testimonial',$testimonial->id) }}" method="post" enctype="multipart/form-data">
                  	@csrf
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label for="exampleInputUsername1">Name :</label>
                      <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Name..." value="{{ old('name',$testimonial->name) }}">
					  <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                      <label for="summernote">Description</label>
                      <textarea id="summernote"  name="description" class="form-control ckeditor"> {{ old('description',$testimonial->description) }}</textarea>
                      <p class="text-danger">{{ $errors->first('description') }}</p>
                    </div>
                    <div class="form-group">
                      <label>Profile Image</label>
							<div class="form-group">
								<input type="file"  id="uploadFile" name="image">
								<br>
								<br>
                                <div id="image_preview">
                                <img src="{{asset('/images/testimonial/' .$testimonial->monial())}}" alt="">
								</div>

							</div>
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" name="status" value="1" @if(old('status' , $testimonial->status)=="1") checked @endif > Status
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('footer.script')

@endsection

