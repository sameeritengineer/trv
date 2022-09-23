@extends('layouts.app')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-9 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create faq</h4>
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
                  <form class="forms-sample" action="{{ route('admin.update-faq',$faq->id) }}" method="post" enctype="multipart/form-data">
                  	@csrf
                    <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
                      <label for="exampleInputUsername1">Question :</label>
                      <textarea id="summernote"  name="question" class="form-control ckeditor"> {{ old('question',$faq->question) }}</textarea>
					  <p class="text-danger">{{ $errors->first('question') }}</p>
                    </div>
                    <div class="form-group {{ $errors->has('answer') ? 'has-error' : '' }}">
                      <label for="summernote">Answer</label>
                      <textarea id="summernote"  name="answer" class="form-control ckeditor"> {{ old('answer',$faq->answer) }}</textarea>
                      <p class="text-danger">{{ $errors->first('answer') }}</p>
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
<script type="text/javascript">
      $(document).ready(function () {
          $('.ckeditor').ckeditor();
      });
  </script>
@endsection