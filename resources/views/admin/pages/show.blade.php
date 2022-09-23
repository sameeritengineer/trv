@extends ('admin-layouts.master')

@section('header')


<style type="text/css">
input[type=file]{
	display: inline;
}
#image_preview{
	border: 1px solid #ccc;
	padding: 10px;
}
#image_preview img{
	width: 180px;
	padding: 5px;
}
</style>

@endsection('header')

@section ('content')

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Delete Testimonail</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
			
				<fieldset>

						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label class="control-label" for="name">Name :</label>
							<input type="text" name="name" class="form-control" placeholder="Name..." value="{{ old('name',$testimonial->name) }}" disabled>
							<p class="text-danger">{{ $errors->first('name') }}</p>
						</div>

						

						

						<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
							<label class="control-label" for="description">Description
							</label> 
							<textarea id="summernote"  name="description" class="form-control" class="textarea"> {{ old('description',$testimonial->description) }}</textarea>
							
							<!--  <div id="btn"></div> -->
							<p class="text-danger">{{ $errors->first('description') }}</p>
						</div>

                        
						<div class="form-group">
							<label>Profile Image</label>
							<div class="form-group">
								<input type="file"  id="uploadFile" name="image" disabled>
								<br>
								<br>

								<div id="image_preview">
                                <img src="{{asset($testimonial->monial())}}" alt="">
								</div>

							</div>
							
							<div class="checkbox" {{ $errors->has('p_status') ? 'has-error' : ''}}>
                            <label>
                               
                                    <input type="checkbox" name="status" value="1" @if(old('status' , $testimonial->status)=="1") checked @endif > P_Status
                                        
                                

                            </label>
                        </div>

						</div>

						


						<div class="form-group">
                        <form action="{{url('/testimonial/destroy/'.$testimonial->id) }}" method="POST" style="display: inline;" id="delete-form">
    {{ csrf_field() }} 

    <button type="submit" class="btn btn-danger" id="delete-btn" >
        Remove

    </button>
</form>

<a href="{{url('/testimonial') }}" class="btn btn-default">Cancel</a>  
						</div>

					



					</form>
				</fieldset>
			</div>
		</div>






		@endsection ('content')

		@section('footer.script')

		
		<script>
			$("#js-example-tags").select2({
				tags: true,
				tokenSeparators: [',', ' ']

			});
		</script>

		<script type="text/javascript">



			$("#uploadFile").change(function(){

				$('#image_preview').html("");

				var total_file=document.getElementById("uploadFile").files.length;



				for(var i=0;i<total_file;i++)

				{

					$('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");

				}



			});

		</script>
<script>

$('#summernote').summernote({
	toolbar: [
// [groupName, [list of button]]
['style', ['bold', 'italic', 'underline', 'clear']],
['fontsize', ['fontsize']],
    ['color', ['color']],  
],
height: 200,
minHeight: 100,
maxHeight: 400




});

</script>



@stop

