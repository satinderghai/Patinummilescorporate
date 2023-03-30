<div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">



                    </div>
                  </div>



                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="form-label" for="name">
                      Name</label>
                      <div class="form-control-wrap">
                     
                           {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
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
                      <label class="form-label" for="name">Email Address</label>
                      <div class="form-control-wrap">
                        {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
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
                      <label class="form-label" for="name">Status</label>
                      <div class="form-control-wrap">
                       {!! Form::select('is_verify',['Inactive','Active'], null,  ['class' => 'form-control']) !!}
                              @if ($errors->has('is_verify'))
                        <p style="color:red;">
                          {!!$errors->first('is_verify')!!}
                        </p>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group mt-3">
                             <!--    <button type="submit" class="btn theme-btn">Edit
                             Profile</button> -->
                               {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary waves-effect','id'=>'pagesubmit']) !!}
                           </div>
                         </div>
                       </div>
                     </div>