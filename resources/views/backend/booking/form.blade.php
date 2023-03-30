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
<!-- <div class="col-sm-6">
  <div class="form-group">
    <label class="form-label" for="name">Company</label>
    <div class="form-control-wrap">
  <input type="text" name="" class="form-control card-form" value="">
      {!! Form::text('company_name', null, ['class' => 'form-control card-form', 'id' => 'email', 'placeholder'=>"Enter your company"]) !!}
      @if ($errors->has('company_name'))
      <p style="color:red;">
        {!!$errors->first('company_name')!!}
      </p>
      @endif
    </div>
  </div>
</div> -->
<div class="col-sm-6">
  <div class="form-group">
    <label class="form-label"
    for="password">Password</label>
    <div class="form-control-wrap">
      <a href="#"
      class="form-icon form-icon-right passcode-switch lg is-shown"
      data-target="password">
      <em
      class="passcode-icon icon-show icon ni ni-eye"></em>
      <em
      class="passcode-icon icon-hide icon ni ni-eye-off"></em>
    </a>
 

    {!! Form::text('password', null, ['class' => 'form-control card-form', 'id' => 'password','placeholder'=>"Enter your password"]) !!}
    @if ($errors->has('password'))
    <p style="color:red;">
      {!!$errors->first('password')!!}
    </p>
    @endif
  </div>
</div>
</div>


<div class="col-sm-6">
  <div class="form-group">
    <label class="form-label" for="name">Status</label>
    <div class="form-control-wrap">

     {!! Form::select('status',['Pending','Aprroved'], null,  ['class' => 'form-control']) !!} 
      @if ($errors->has('phone'))
      <p style="color:red;">
        {!!$errors->first('phone')!!}
      </p>
      @endif
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="form-group">
      <button type="submit" class="btn theme-btn ms-1">Save</button>
    </div>
  </div>
</div>
</div>