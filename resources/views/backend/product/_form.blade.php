<div class="field">
  <label class="label">Product Name</label>
  <div class="control">
    {!! Form::text('name',null,['class'=> $errors->first('name') ? "input is-danger" : "input" ]) !!} 
    <p class="help is-danger">
        {!! $errors->first('name') !!}
      </p>
  </div>
</div>

 <div class="field">
  <label class="label">Price</label>
  <div class="field is-expanded">
      <div class="field has-addons">
        <p class="control">
          <a class="button is-static">
            Rp
          </a>
        </p>
        <p class="control is-expanded">
           {!! Form::number('price',null,['class'=> $errors->first('price') ? "input is-danger" : "input" ,"placeholder"=>"Harga"]) !!} 
        </p>
      </div>
      <p class="help is-danger">
        {!! $errors->first('price') !!}
      </p>
    </div>
</div>

<div class="field">
  <label class="label">Stock</label>
  <div class="field is-expanded">
      <div class="field has-addons">
        <p class="control">
          <a class="button is-static">
            Stock
          </a>
        </p>
        <p class="control is-expanded">
          
           {!! Form::number('stock',null,['class'=> $errors->first('stock') ? "input is-danger" : "input" ,"placeholder"=>"Stok","min"=>0]) !!} 
        </p>
      </div>
       <p class="help is-danger">
        {!! $errors->first('stock') !!}
      </p>
    </div>
</div>

<div class="field">
  <label class="label">Brand</label>
  <div class="field is-expanded">
      <div class="field has-addons">
                
           {!! Form::select('brand_id',App\Brand::pluck('name','id'),null,['class'=> $errors->first('stock') ? "input is-danger" : "input" ,"placeholder"=>"Brand"]) !!} 
  
      </div>
       <p class="help is-danger">
        {!! $errors->first('stock') !!}
      </p>
    </div>
</div>

<div class="field">
  <label class="label">Kategori</label>
  <div class="control">
    @foreach(App\Models\Category::all() as $category)
      @if(isset($product))
      <input type="checkbox" name="category_id[]" value="{!! $category->id !!}" {!! in_array($category->id,$product->categoriesProduct()) ? "checked" : "" !!}>{!! $category->name !!}
      @else
      <input type="checkbox" name="category_id[]" value="{!! $category->id !!}">{!! $category->name !!}
      @endif
    @endforeach
  </div>  
</div>

<div class="field">
  <label class="label">Deskripsi</label>
  <div class="control">
    {!! Form::textarea('description',null,['class'=>'textarea','id'=>'editor1']) !!}
  </div>
</div>
<!-- 
<div>
  <quilleditor></quilleditor>
</div> -->

<br>

<div class="field">
  <div id="photo"
      class="dropzone"
      id="my-awesome-dropzone"></div>
</div>

<div class="field is-grouped">
  <div class="control">
    {{ Form::button('Save',['class'=>'button is-primary','id'=>'btnSave'])}}
  </div>
  <div class="control">
    <button class="button is-link">Cancel</button>
  </div>
</div>