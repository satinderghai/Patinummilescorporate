 <style>
.phontop label.form-label {
    margin-top: 15px;
    margin-bottom: 0;
}

 </style>
 <div class="phontop">
 <div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label class="form-label" for="name">Name</label>
      <div class="form-control-wrap">


       {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name','placeholder'=>"Enter your name"]) !!}
       @if ($errors->has('name'))
       <p style="color:red;">
        {!!$errors->first('name')!!}
      </p>
      @endif
    </div>
  </div>
</div>
<div class="col-sm-6">
  <div class="form-group">
    <label class="form-label" for="name">Email</label>
    <div class="form-control-wrap">


      {!! Form::text('email', null, ['class' => 'form-control card-form', 'id' => 'email','placeholder'=>"Enter your email"]) !!}
      @if ($errors->has('email'))
      <p style="color:red;">
        {!!$errors->first('email')!!}
      </p>
      @endif
    </div>
  </div>
</div>
<div class="col-sm-6">
  <div class="form-group">
    <label class="form-label" for="name">Phone</label>
    <div class="form-control-wrap">

      {!! Form::text('phone', null, ['class' => 'form-control card-form', 'id' => 'phone','placeholder'=>"Enter your phone"]) !!}
      @if ($errors->has('phone'))
      <p style="color:red;">
        {!!$errors->first('phone')!!}
      </p>
      @endif
    </div>
  </div>
</div>

<div class="col-sm-6">
  <div class="form-group">
    <label class="form-label" for="name">Employee Account Type</label>
    <div class="form-control-wrap">

     <select class="form-control" name="account_type" id="">
        <option value="" selected='selected'>Select Please</option>
        <option value="1" {{ ( $teams->account_type == 1) ? 'selected' : '' }}> Gold </option>
        <option value="2" {{ ( $teams->account_type == 2) ? 'selected' : '' }}> Silver </option>
        <option value="3" {{ ( $teams->account_type == 3) ? 'selected' : '' }}> Bronze </option>
     
        </select>
      @if ($errors->has('phone'))
      <p style="color:red;">
        {!!$errors->first('phone')!!}
      </p>
      @endif
    </div>
  </div>
</div>
<div class="col-sm-6">
  <div class="form-group">
    <label class="form-label" for="name">budget</label>
    <div class="form-control-wrap">

      {!! Form::text('budget', null, ['class' => 'form-control card-form', 'id' => 'budget','placeholder'=>"Enter your budget"]) !!}
      @if ($errors->has('budget'))
      <p style="color:red;">
        {!!$errors->first('budget')!!}
      </p>
      @endif
    </div>
  </div>
</div>



<div class="col-sm-6">
  <div class="form-group">
    <label class="form-label" for="name">Status</label>
    <div class="form-control-wrap">

    


       <select class="form-control" name="is_verify" id="">
       <option value="" selected='selected'>Select Please</option>

        <option value="0" {{ ( $teams->is_verify == 0) ? 'selected' : '' }}> Inactive </option>

         <option value="1" {{ ( $teams->is_verify == 1) ? 'selected' : '' }}> Active </option>
        
     
        </select>

      @if ($errors->has('phone'))
      <p style="color:red;">
        {!!$errors->first('phone')!!}
      </p>
      @endif
    </div>
  </div>
</div>



<div class="col-sm-6">
  <div class="form-group">
    <label class="form-label" for="name">Order Limt</label>
    <div class="form-control-wrap"> 

      {!! Form::number('order_limt', null, ['class' => 'form-control card-form', 'id' => 'budget','placeholder'=>"Enter your order limt"]) !!}
      @if ($errors->has('order_limt'))
      <p style="color:red;">
        {!!$errors->first('order_limt')!!}
      </p>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="form-group">
      <button type="submit" class="btn theme-btn ms-1 mt-4">Save</button>
    </div>
  </div>
</div>
</div>
</div>