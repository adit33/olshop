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
        {!! Form::open(['url'=>route('product.store'),'class'=>'control',"id"=>"form-create"]) !!}
            @include('backend.product._form')
        {!! Form::close() !!}
    </div>
</div>

          </div>
        </div>

</main>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script type="text/javascript">
  var form=$("#form-create");

  CKEDITOR.replace( 'editor1',
    {
        toolbar :
        [
          {
            items : [ 'Bold','Italic','Underline','Strike','-','RemoveFormat' ]
          },
          {
            items : [ 'Format']
          },
          {
            items : [ 'Link','Unlink' ]
          },
          {
            items : [ 'Indent','Outdent','-','BulletedList','NumberedList']
          },
          {
            items : [ 'Undo','Redo']
          }
        ]
    })

  var description = CKEDITOR.instances.editor1.getData();

  function addProduct(){
    formData=form.serializeArray();
    formData.find(item => item.name === 'description').value = CKEDITOR.instances.editor1.getData();
    console.log(formData);
     $.ajax({
      url:form.attr('action'),
      type:'POST',
      data:formData,
      success:function(response){
       ;
      },
      error:function(response){
        console.log(response.responseJSON)
      }
    })
  }

  Dropzone.autoDiscover = false;
  var dropzone = new Dropzone("#photo",{
      addRemoveLinks: true, // tambah link hapus photo
          autoProcessQueue: false, // agar tidak otomatis langsung upload 
          maxFiles:10, // jumlah maximal upload file
          parallelUploads: 10, // samakan dengan max files
          url:form.attr('action'), // url 
          uploadMultiple: true, //untuk upload lebih dari 1
          acceptedFiles:'image/*',
          init:function(){
            $("#btnSave").on('click',function(){
              if (dropzone.getQueuedFiles().length > 0) { //cek apakah ada attachment atau tidak
                  dropzone.processQueue();
              }else{
                addProduct()
              }              
            });
          },
          sending: function(file, xhr, formData) {
            let data=form.serializeArray(); 
            data.find(item => item.name === 'description').value = CKEDITOR.instances.editor1.getData();
            for (var i = 0; i < data.length; i++) {
              formData.append(data[i].name,data[i].value);
          }
        }
  });



</script>

@endpush

@endsection