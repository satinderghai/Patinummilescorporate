
 <div class="phontop">
 <div class="row">
  <div class="col-sm-12">
    <div class="form-group">
      <label class="form-label" for="name">Title</label>
      <div class="form-control-wrap">


       {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title','placeholder'=>"Enter your Title"]) !!}
       @if ($errors->has('title'))
       <p style="color:red;">
        {!!$errors->first('title')!!}
      </p>
      @endif
    </div>
  </div>
</div>



<div class="col-sm-12">
  <div class="form-group">
    <label class="form-label" for="name">Meta Title</label>
    <div class="form-control-wrap">


      {!! Form::text('meta_title', null, ['class' => 'form-control card-form', 'id' => 'meta_title','placeholder'=>"Enter your meta title"]) !!}
      @if ($errors->has('meta_title'))
      <p style="color:red;">
        {!!$errors->first('meta_title')!!}
      </p>
      @endif
    </div>
  </div>
</div>
<div class="col-sm-12">
  <div class="form-group">
    <label class="form-label" for="name">Meta Keyword</label>
    <div class="form-control-wrap">

      {!! Form::text('meta_keyword', null, ['class' => 'form-control card-form', 'id' => 'meta_keyword','placeholder'=>"Enter your meta keyword"]) !!}
      @if ($errors->has('meta_keyword'))
      <p style="color:red;">
        {!!$errors->first('meta_keyword')!!}
      </p>
      @endif
    </div>
  </div>
</div>
<div class="col-sm-12">
  <div class="form-group">
    <label class="form-label" for="name">Meta Description</label>
    <div class="form-control-wrap">

      {!! Form::text('meta_description', null, ['class' => 'form-control card-form', 'id' => 'meta_description','placeholder'=>"Enter your meta description"]) !!}
      @if ($errors->has('meta_description'))
      <p style="color:red;">
        {!!$errors->first('meta_description')!!}
      </p>
      @endif
    </div>
  </div>
</div>

<div class="col-sm-12">
  <div class="form-group">
    <label class="form-label" for="name">Content</label>
    <div class="form-control-wrap">

     {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor1']) !!}
      @if ($errors->has('content'))
      <p style="color:red;">
        {!!$errors->first('content')!!}
      </p>
      @endif
    </div>
  </div>
</div>










<div class="row">
  <div class="col-sm-12">
    <div class="form-group">
      <button type="submit" class="btn theme-btn ms-1 mt-4">Update</button>
    </div>
  </div>
</div>
</div>
</div>