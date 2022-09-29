@extends('layouts.app')

@section('content')
<div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card mx-auto">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create New Destination</h4>
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
                  <form class="forms-sample" action="{{ route('admin.store-destination') }}" method="post" enctype="multipart/form-data">
                  	@csrf
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name:</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Name..." value="{{ old('name') }}">
                           <p class="text-danger">{{ $errors->first('name') }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Price($)</label>
                          <div class="col-sm-9">
                          <input type="number" name="price" class="form-control" id="exampleInputPrice" placeholder="Price($)" value="{{ old('price') }}">
                           <p class="text-danger">{{ $errors->first('price') }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Start Date</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="date" id="destSdaytime" name="destSdaytime" value="{{ old('destSdaytime') }}">
                            <p class="text-danger">{{ $errors->first('destSdaytime') }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End Date</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="date" id="destEdaytime" name="destEdaytime" value="{{ old('destEdaytime') }}">
                            <p class="text-danger">{{ $errors->first('destEdaytime') }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Vimeo or Youtube</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" id="video" name="video" value="{{ old('video') }}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Country</label>
                          <div class="col-sm-9">
                            <select class="form-control" required="" name="country">
                              @foreach($data['countries'] as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('destEdaytime') }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Hotel Name</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" id="hotelname" name="hotelname" value="{{ old('hotelname') }}">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Hotel Address</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" id="hoteladd" name="hoteladd" value="{{ old('hoteladd') }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Includes</label>
                          <div class="col-sm-9">
                            <select name="includes[]" class="js-example-basic-multiple w-100" multiple="multiple">
                            @foreach($data['includes'] as $include)
                            <option value="{{$include->id}}">{{$include->name}}</option>
                            @endforeach
                          </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Excludes</label>
                          <div class="col-sm-9">
                            <select name="excludes[]" class="js-example-basic-multiple w-100" multiple="multiple">
                            @foreach($data['excludes'] as $exclude)
                            <option value="{{$exclude->id}}">{{$exclude->name}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Deposite</label>
                          <div class="col-sm-9">
                            <select name="deposite[]" class="js-example-basic-multiple w-100" multiple="multiple">
                            @foreach($data['deposite'] as $deposite)
                            <option value="{{$deposite->id}}">{{$deposite->name}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Additonal Information</label>
                          <div class="col-sm-12">
                          <textarea id="addinfo"  name="addinfo" class="form-control"> {{ old('addinfo') }}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-12">
                          <textarea id="summernote"  name="description" class="form-control content"> {{ old('description') }}</textarea>
                      <p class="text-danger">{{ $errors->first('description') }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                   <div class="row activities">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Activities</label>
                          <div class="col-sm-8">
                           <div class="field_wrapper">
                            <div>
                              <h5>Day 1</h5>
                                <input class="form-control" type="text" name="activities[]" value=""/>
                                <a href="javascript:void(0);" class="add_button btn btn-primary mr-2" title="Add field">Add</a>
                            </div>
                           </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                              <label>Destination Gallery Images</label>
                                <div class="upload-btn-wrapper">
                                <span class="">
                                    <input type="file" name="dest_gallery[]" id="files_before_images" accept="image/*" capture="camera" id="files_before_images" multiple><br />
                                </span>
                                </div>
                            </div>
                          <output>
                              <ul id="Filelist_Before"></ul>
                          </output>  
                        </div>
                    </div>
                    <hr>
               <div class="form-group">
                      <label>Featured Image</label>
              <div class="form-group">
                <input type="file"  id="uploadFile" name="image" required="">
                <br>
                <br>

                <div id="image_preview">

                </div>

              </div>
              </div>
              <hr>
                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="status" ? 1=="active" : 0==null >Status
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- Starts Modal for before images with slideshow -->
<div class="modal" id="exampleModalBefore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <div class="modal-body">
<div class="slideshow-container">
<div class="slideshow-row-before">

</div>


<a class="prevSl" onclick="plusSlidesBefore(-1)">❮</a>
<a class="nextSl" onclick="plusSlidesBefore(1)">❯</a>

</div>
<br>

<div class="alldots" style="text-align:center">

</div>

      </div>
    </div>
  </div>
</div>
<!-- Ends Modal for before images with slideshow -->
@endsection
@section('footer.script')
<script type="text/javascript">
      $(document).ready(function () {
           $('.content').richText();
          //$('.ckeditor').ckeditor();
          /*if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
          }*/
          if ($(".js-example-basic-multiple").length) {
            $(".js-example-basic-multiple").select2();
          }
      });
      $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    //var fieldHTML = '<div><h2></h2><input class="form-control" type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button btn btn-primary mr-2">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append('<div><h5>Day '+x+' </h5><input class="form-control" type="text" name="activities[]" value=""/><a href="javascript:void(0);" class="remove_button btn btn-primary mr-2">Remove</a></div>'); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
  </script>
  <script type="text/javascript">
    let slideIndex = 1;
/* Before */
function plusSlidesBefore(n) {
  showSlidesBefore(slideIndex += n);
}

function currentSlideBefore(n) {
  showSlidesBefore(slideIndex = n);
}

function showSlidesBefore(n) {
  let i;
  let slides = document.getElementsByClassName("mySlidesbefore");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}



</script>    
<script>
//I added event handler for the file upload control to access the files properties.
document.addEventListener("DOMContentLoaded", init, false);

//To save an array of attachments
var AttachmentArrayBefore = [];

//counter for attachment array
var arrCounter = 0;

//to make sure the error message for number of files will be shown only one time.
var filesCounterAlertStatus = false;

//un ordered list to keep attachments thumbnails
var ul = document.createElement("ul");
ul.className = "thumb-Images";
ul.id = "imgList";

function init() {
  //add javascript handlers for the file upload event
  document
    .querySelector("#files_before_images")
    .addEventListener("change", handleFileSelectBefore, false);   

    
}

//the handler for file upload event
function handleFileSelectBefore(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function(readerEvt) {
      return function(e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt,'before');

        //Render attachments thumbnails.
        RenderThumbnail(e, readerEvt,'before');



        //Fill the array of attachment
        FillAttachmentArray(e, readerEvt,'before');
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }
  //console.log(AttachmentArray);

  document
    .getElementById("files_before_images")
    .addEventListener("change", handleFileSelectBefore, false);
}
//To remove attachment once user click on x button
jQuery(function($) {
  $("div").on("click", ".img-wrap .close", function() {
    var id = $(this)
      .closest(".img-wrap")
      .find("img")
      .data("id");



    
    var param = $(this).attr('data-param');
        if(param == 'before'){
          $(".slideshow-row-before").html('');
          //to remove the deleted item from array
    var elementPos = AttachmentArrayBefore.map(function(x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos !== -1) {
      AttachmentArrayBefore.splice(elementPos, 1);
      $(".slideshow-row-before").html('');
      AttachmentArrayBefore.forEach(function(message) {
         $(".slideshow-row-before").append('<div class="mySlidesbefore"><img src="'+message.data+'" style="width:100%"></div>');
      });
    }
}
  $(this)
      .parent().parent().remove();
   /* //to remove image tag
    $(this)
      .parent()
      .find("img")
      .not()
      .remove();

    //to remove div tag that contain the image
    $(this)
      .parent()
      .find("div")
      .not()
      .remove();

    //to remove div tag that contain caption name
    $(this)
      .parent()
      .parent()
      .find("div")
      .not()
      .remove();

    //to remove li tag
    var lis = document.querySelectorAll("#imgList li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }*/
  });
});

//Apply the validation rules for attachments upload
function ApplyFileValidationRules(readerEvt,param) {
  //To check file type according to upload conditions
  if (CheckFileType(readerEvt.type) == false) {
    alert(
      "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, You can only upload jpg/png/gif files"
    );
    e.preventDefault();
    return;
  }

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt.size) == false) {
    alert(
      "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 MB"
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
  if(param == 'before'){
    if (CheckFilesCount(AttachmentArrayBefore,param) == false) {
    if (!filesCounterAlertStatus) {
      filesCounterAlertStatus = true;
      alert(
        "You have added more than 10 files. According to upload conditions you can upload 10 files maximum"
      );
    }
    e.preventDefault();
    return;
  }
  }
  
}

//To check file type according to upload conditions
function CheckFileType(fileType) {
  if (fileType == "image/jpeg") {
    return true;
  } else if (fileType == "image/png") {
    return true;
  } else if (fileType == "image/gif") {
    return true;
  } else {
    return false;
  }
  return true;
}

//To check file Size according to upload conditions
function CheckFileSize(fileSize) {
  if (fileSize < 3000000) {
    return true;
  } else {
    return false;
  }
  return true;
}

//To check files count according to upload conditions
function CheckFilesCount(AttachmentArray,param) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray.length; i++) {
    if (AttachmentArray[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if(param == 'batch'){
    if (len > 3) {
        return false;
      } else {
        return true;
      }
  }else{
      if (len > 9) {
        return false;
      } else {
        return true;
      } 
  }
  
}

//Render attachments thumbnails.
function RenderThumbnail(e, readerEvt,param) {
  if(param == 'before'){
   var modelId = '#exampleModalBefore';
   var currentSlide = 'currentSlideBefore(1)';
  }
    
  var li = document.createElement("li");
  //ul.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap"> <span data-param="'+param+'" class="close">&times;</span>' +
      '<img onclick="'+currentSlide+'" data-toggle="modal" data-target="'+modelId+'" class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt.name),
    '" data-id="',
    readerEvt.name,
    '"/>' + "</div>"
  ].join("");

  /*var div = document.createElement("div");
  div.className = "FileNameCaptionStyle";
  li.appendChild(div);
  div.innerHTML = [readerEvt.name].join("");*/
  if(param == 'before'){
   //document.getElementById("Filelist_Before").insertBefore(ul, null);
   $("#Filelist_Before").append(li);
  }
  
}

//Fill the array of attachment
function FillAttachmentArray(e, readerEvt,param) {
  if(arrCounter == 0){
    var myclass= 'item active';
    var indicator = 'active';
  }else{
    var myclass= 'item';
    var indicator = '';
  }
  if(param == 'before'){
    AttachmentArrayBefore[arrCounter] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt.size,
    data:e.target.result
  };
   $(".slideshow-row-before").append('<div class="mySlidesbefore"><img src="'+e.target.result+'" style="width:100%"></div>');
  }

  
  arrCounter = arrCounter + 1;
   
}
$('.extra-fields-customer').click(function() {
  $('.customer_records').clone().appendTo('.customer_records_dynamic');
  $('.customer_records_dynamic .customer_records').addClass('single remove');
  $('.single .extra-fields-customer').remove();
  $('.single').append('<a href="#" class="remove-field btn-remove-customer">Remove Fields</a>');
  $('.customer_records_dynamic > .single').attr("class", "remove");

  $('.customer_records_dynamic input').each(function() {
    var count = 0;
    var fieldname = $(this).attr("name");
    $(this).attr('name', fieldname + count);
    count++;
  });

});

$(document).on('click', '.remove-field', function(e) {
  $(this).parent('.remove').remove();
  e.preventDefault();
});
</script>
@endsection