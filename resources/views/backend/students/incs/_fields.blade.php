<div class="form-body">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.name') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <input type="text" name="name" value="{{ getData($data, 'name') }}" class="form-control" placeholder="{{ trans('main.name') }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.email') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <input type="email" name="email" value="{{ getData($data, 'email') }}" class="form-control" placeholder="{{ trans('main.email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label class="control-label col-md-2">{{ trans('main.image') }}</label>
        <div class="col-md-10">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                    @if (checkValue(getData($data, 'image')))
                        <img src="{{ ShowImage(getData($data, 'image')) }}" alt="" />
                    @endif
                </div>
                <div>
                    <span class="btn red btn-outline btn-file">
                        <span class="fileinput-new"> {{ trans('main.select_image') }} </span>
                        <span class="fileinput-exists"> {{ trans('main.change') }} </span>
                        <input type="file" name="image">
                    </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ trans('main.remove') }} </a>
                </div>
            </div>
            @if ($errors->has('image'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('image') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <!-- Add Student's Class -->
    <div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.class') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <select class="form-control" id="class_id" name="class_id">
              @foreach ($cls as $c)
                  <option value="{{ $c->id }}" {{ getData($data, 'class_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('class_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('class_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Add Student's teacher -->
    <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.teacher') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <select class="form-control" id="user_id" name="user_id">
              @foreach ($us as $c)
                  <option value="{{ $c->id }}" {{ getData($data, 'user_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('user_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('user_id') }}</strong>
                </span>
            @endif
        </div>
    </div>


<!-- Add by Mario for Phone -->
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.phone') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <input type="text" name="phone" value="{{ getData($data, 'phone') }}" class="form-control" placeholder="{{ trans('main.phone') }}" required>
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>

<!-- Add by Mario for IMEI -->
        <div class="form-group{{ $errors->has('imei') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.imei') }} <span class="required"></span> </label>
            <div class="col-md-10">
                <input type="text" name="imei" value="{{ getData($data, 'imei') }}" class="form-control" placeholder="{{ trans('main.imei') }}" required>
                @if ($errors->has('imei'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('imei') }}</strong>
                    </span>
                @endif
            </div>
        </div>
<!-- Add by Mario for ID Number -->
        <div class="form-group{{ $errors->has('identity') ? ' has-error' : '' }}">
            <label class="col-md-2 control-label">{{ trans('main.identity') }} <span class="required"></span> </label>
            <div class="col-md-10">
                <input type="text" name="identity" value="{{ getData($data, 'identity') }}" class="form-control" placeholder="{{ trans('main.identity') }}" required>
                @if ($errors->has('identity'))
                    <span class="help-block">
                        <strong class="help-block">{{ $errors->first('identity') }}</strong>
                    </span>
                @endif
            </div>
        </div>

</div>
