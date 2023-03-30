        <div class="box-body">
          <label for="email_address">Full Company Name</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('company_name', null, ['class' => 'form-control', 'id' => 'company_name']) !!}
             @if ($errors->has('company_name'))
             <p style="color:red;">
              {!!$errors->first('company_name')!!}
            </p>
            @endif
          </div>
        </div>

  <label for="email_address">First Name</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('firstname', null, ['class' => 'form-control', 'id' => 'firstname']) !!}
             @if ($errors->has('firstname'))
             <p style="color:red;">
              {!!$errors->first('firstname')!!}
            </p>
            @endif
          </div>
        </div>

         <label for="email_address">Last Name</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('lastname', null, ['class' => 'form-control', 'id' => 'lastname']) !!}
             @if ($errors->has('lastname'))
             <p style="color:red;">
              {!!$errors->first('lastname')!!}
            </p>
            @endif
          </div>
        </div>

         <label for="email_address"> Address Line 1
</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('address1', null, ['class' => 'form-control', 'id' => 'address1']) !!}
             @if ($errors->has('address1'))
             <p style="color:red;">
              {!!$errors->first('address1')!!}
            </p>
            @endif
          </div>
        </div>


         <label for="email_address">Address Line 2</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('address2', null, ['class' => 'form-control', 'id' => 'address2']) !!}
             @if ($errors->has('address2'))
             <p style="color:red;">
              {!!$errors->first('address2')!!}
            </p>
            @endif
          </div>
        </div>

         <label for="email_address">City</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('city', null, ['class' => 'form-control', 'id' => 'city']) !!}
             @if ($errors->has('city'))
             <p style="color:red;">
              {!!$errors->first('city')!!}
            </p>
            @endif
          </div>
        </div>

         <label for="email_address">State/Province</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('state', null, ['class' => 'form-control', 'id' => 'state']) !!}
             @if ($errors->has('state'))
             <p style="color:red;">
              {!!$errors->first('state')!!}
            </p>
            @endif
          </div>
        </div>

         <label for="email_address">Zip/Postal Code*</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('zip', null, ['class' => 'form-control', 'id' => 'zip']) !!}
             @if ($errors->has('zip'))
             <p style="color:red;">
              {!!$errors->first('zip')!!}
            </p>
            @endif
          </div>
        </div>

         <label for="email_address">Country</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('country', null, ['class' => 'form-control', 'id' => 'country']) !!}
             @if ($errors->has('name'))
             <p style="color:red;">
              {!!$errors->first('country')!!}
            </p>
            @endif
          </div>
        </div>

         <label for="email_address"> MC Number</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('mc_number', null, ['class' => 'form-control', 'id' => 'mc_number']) !!}
             @if ($errors->has('mc_number'))
             <p style="color:red;">
              {!!$errors->first('mc_number')!!}
            </p>
            @endif
          </div>
        </div>

         <label for="email_address">DOT Number</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('dot_number', null, ['class' => 'form-control', 'id' => 'dot_number']) !!}
             @if ($errors->has('dot_number'))
             <p style="color:red;">
              {!!$errors->first('dot_number')!!}
            </p>
            @endif
          </div>
        </div>

         <label for="email_address">Email Address</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
             @if ($errors->has('email'))
             <p style="color:red;">
              {!!$errors->first('email')!!}
            </p>
            @endif
          </div>
        </div>

         <label for="email_address">Business Phone</label>
          <div class="form-group">
            <div class="form-line">
             {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
             @if ($errors->has('phone'))
             <p style="color:red;">
              {!!$errors->first('phone')!!}
            </p>
            @endif
          </div>
        </div>



        <label for="password">Business Fax</label>
        <div class="form-group">
          <div class="form-line">
            {!! Form::text('fax', null, ['class' => 'form-control', 'id' => 'fax']) !!}
            @if ($errors->has('fax'))
            <p style="color:red;">
              {!!$errors->first('fax')!!}
            </p>
            @endif
          </div>
        </div>

        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary waves-effect','id'=>'pagesubmit']) !!}
      </div>
