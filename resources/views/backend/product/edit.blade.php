@extends('backend.layout.master')

@section('content')
 <main class="column">

        <div class="columns is-multiline">
          <div class="column is-12">
          	<div class="panel">
    <div class="panel-heading">
        {{$title}}
    </div>
    <div class="panel-block">
        {!! Form::model($product,['url'=>route('product.update',$product->id),'class'=>'control',"id"=>"form-edit","method"=>"POST"]) !!}
            @include('backend.product._form')
        {!! Form::close() !!}
    </div>
</div>

          </div>
        </div>

</main>

@push('scripts')

<script type="text/javascript">
$(document).ready(function(){
  var mockFiles=<?php echo $product->productImage ?>;
    $.each(mockFiles,function (key,val) {
      var mockFile = { name: val.name,id:val.id};
      // myDropzone.options.addedfile.call(myDropzone, mockFile);
      // myDropzone.options.thumbnail.call(myDropzone, mockFile, "http://localhost/olshop/public/"+val.name);

      // Call the default addedfile event handler
      myDropzone.emit("addedfile", mockFile);

      // And optionally show the thumbnail of the file:
      myDropzone.emit("thumbnail", mockFile,"http://localhost/olshop/public/"+val.name);


      myDropzone.files.push(mockFile);
    })
})
var array_id=[];
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#photo", {

  addRemoveLinks: true,
  autoProcessQueue: false,
  maxFiles:10,
  method:'post',
  parallelUploads: 10,
  url:$("form#form-edit").attr('action'), //url Store
  uploadMultiple: true,
  sending: function(file, xhr, formData) {
    form=$("#form-edit").serializeArray();
    form.forEach(function(data){
      formData.append(data.name,data.value);
      formData.append(array_id);
    })
    // formData.append("_token", $('input[name="_token"]').val() );
 // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.

},
error:function(file,response){
  var errors = response;
  var z='';
  var x='';
  $.each(errors, function(index, value) {
      z +='<li><strong>'+value+'</strong></li>';
  });

  x+='<div class="alert alert-danger alert-dismissible fade in" role="alert">';
  x+='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>';
  x+='</button>';

  $("div#validation").html(x+'<ul>'+z+'</ul></div>');
  alert('error')
},
init: function() {


      // Create the remove button
      var removeButton = Dropzone.createElement("<button>Remove file</button>");

      // Capture the Dropzone instance as closure.
      var _this = this;
      var form=$("form#form-edit").attr('action');
      var submitButton = document.querySelector("#btnSave")
      myDropzone = this; // closure

      this.on("success", function(file, responseText) {
         // Handle the responseText here. For example, add the text to the preview element:
        //  this.options.autoProcessQueue=true;
         // window.location.href =' <?php echo URL::to('product'); ?> ';
       });

      submitButton.addEventListener("click", function() {

        if (myDropzone.getQueuedFiles().length > 0) {
            myDropzone.processQueue();
        }else{
          var formData=$("#form-edit").serializeArray();
          var data=formData.concat(array_id);
          $.ajax({
            url: $("form#form-edit").attr('action'),
            method:'post',
            data:data,
            success:function(){
              // window.location.href =' <?php echo URL::to('product'); ?> ';
            },
            error:function(data){

              var errors = data.responseJSON;
              var z='';
              var x='';
              $.each(errors, function(index, value) {
                  z +='<li><strong>'+value+'</strong></li>';
              });


              x+='<div class="alert alert-danger alert-dismissible fade in" role="alert">';
              x+='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>';
              x+='</button>';

              $("div#validation").html(x+'<ul>'+z+'</ul></div>');

            }
          });
        }

        // myDropzone.processQueue(); // Tell Dropzone to process all queued files.
      });

      var x=-1;
      myDropzone.on("removedfile",function(file){
        x++;
        this.x=x;
        array_id.push({name:'attachment_id['+x+']',value:file.id});
        console.log(file)
        // this.array_id=array_id;
      });
      myDropzone.on("addedfile", function(file) {
        var removeButton = Dropzone.createElement("<button>Remove file</button>");
        // Listen to the click event
      //
      });

      // Listen to the click event
      removeButton.addEventListener("click", function(e) {
        // Make sure the button click doesn't submit the form:
        e.preventDefault();
        e.stopPropagation();

        // Remove the file preview.
        _this.removeFile(file);
        // If you want to the delete the file on the server as well,
        // you can do the AJAX request here.
      });

      this.on("addedfile", function(file) {

      });

  }

});

</script>

@endpush

@endsection