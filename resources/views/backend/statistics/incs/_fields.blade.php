<div class="form-body">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.title') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="text" name="title" value="{{ getData($data, 'title') }}" class="form-control" placeholder="{{ trans('main.title') }}" required>
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>

    {{-- Add statistics's week --}}
    <div class="form-group{{ $errors->has('week_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.week') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="week_id" name="week_id">
              <option value="">{{ trans('main.select course') }}</option>
              @foreach ($we as $w)
                  <option value="{{ $w->id }}" {{ getData($data, 'week_id') == $w->id ? 'selected' : '' }}>{{ $w->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('week_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('week_id') }}</strong>
                </span>
            @endif
        </div>
    </div>

    {{-- Add statistics's Student --}}
    <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.student') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="student_id" name="student_id">
              <option value="">{{ trans('main.student') }}</option>
              @foreach ($st as $s)
                  <option value="{{ $s->id }}" {{ getData($data, 'student_id') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('student_id'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('student_id') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- Add Date Now -->
    <div class="form-group{{ $errors->has('datenow') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.datenow') }} <span class="required"></span> </label>
        <div class="col-md-8">
            <div class="input-group date date-picker" data-date-format="yyyy-mm-dd" >
                <input type="text" name="datenow" class="form-control" value="{{ getData($data, 'datenow') }}"  readonly required>
                <span class="input-group-btn">
                    <button class="btn default" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div>
            @if ($errors->has('datenow'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('datenow') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
        <label class="control-label col-md-2">{{ trans('main.image') }}</label>
        <div class="col-md-6">
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

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.status') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <select class="form-control select2" id="status" name="status">
                <option value="">{{ trans('main.status') }}</option>
                <option value="active" {{ getData($data, 'status') == 'active' ? ' selected' : '' }}>{{trans('main.active')}}</option>
                <option value="inactive" {{ getData($data, 'status') == 'inactive' ? ' selected' : '' }}>{{trans('main.inactive')}}</option>
            </select>
            @if ($errors->has('status'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.notes') }} <span class="required"></span> </label>
        <div class="col-md-10">
            <textarea name="content" class="form-control" placeholder="{{ trans('main.notes') }}">{{ getData($data, 'content') }}</textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- الكرازة -->
    <div class="form-group{{ $errors->has('mission') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.mission') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="mission"  value="{{ getData($data, 'mission') }}" class="form-control" placeholder="{{ trans('main.mission') }}" required>
            @if ($errors->has('mission'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('mission') }}</strong>
                </span>
            @endif
        </div>
    </div>
<!-- القرار -->
    <div class="form-group{{ $errors->has('decision') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.decision') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="decision"  value="{{ getData($data, 'decision') }}" class="form-control" placeholder="{{ trans('main.decision') }}" required>
            @if ($errors->has('decision'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('decision') }}</strong>
                </span>
            @endif
        </div>
    </div>
<!-- متابعة اولى -->
    <div class="form-group{{ $errors->has('ob1') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation1') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="ob1"  value="{{ getData($data, 'ob1') }}" class="form-control" placeholder="{{ trans('main.observation1') }}" required>
            @if ($errors->has('ob1'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob1') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة ثانية -->
    <div class="form-group{{ $errors->has('ob2') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation2') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="ob2"  value="{{ getData($data, 'ob2') }}" class="form-control" placeholder="{{ trans('main.observation2') }}" required>
            @if ($errors->has('ob2'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob2') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة ثالثة -->
    <div class="form-group{{ $errors->has('ob3') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation3') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="ob3"  value="{{ getData($data, 'ob3') }}" class="form-control" placeholder="{{ trans('main.observation3') }}" required>
            @if ($errors->has('ob3'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob3') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة رابعة -->
    <div class="form-group{{ $errors->has('ob4') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation4') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="ob4"  value="{{ getData($data, 'ob4') }}" class="form-control" placeholder="{{ trans('main.observation4') }}" required>
            @if ($errors->has('ob4'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob4') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة خامسة -->
    <div class="form-group{{ $errors->has('ob5') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation5') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="ob5"  value="{{ getData($data, 'ob5') }}" class="form-control" placeholder="{{ trans('main.observation5') }}" required>
            @if ($errors->has('ob5'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob5') }}</strong>
                </span>
            @endif
        </div>
    </div>
 <!-- مُتابعة سادسة -->
    <div class="form-group{{ $errors->has('ob6') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.observation6') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="ob6"  value="{{ getData($data, 'ob6') }}" class="form-control" placeholder="{{ trans('main.observation6') }}" required>
            @if ($errors->has('ob6'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('ob6') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('papers') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.papers') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="papers"  value="{{ getData($data, 'papers') }}" class="form-control" placeholder="{{ trans('main.papers') }}" required>
            @if ($errors->has('papers'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('papers') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('stu_num') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.stu_num') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="stu_num"  value="{{ getData($data, 'stu_num') }}" class="form-control" placeholder="{{ trans('main.stu_num') }}" required>
            @if ($errors->has('stu_num'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('stu_num') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('holy_spirit') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.holy_spirit') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="holy_spirit"  value="{{ getData($data, 'holy_spirit') }}" class="form-control" placeholder="{{ trans('main.holy_spirit') }}" required>
            @if ($errors->has('holy_spirit'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('holy_spirit') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('mission_no_student') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.mission_no_student') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="mission_no_student"  value="{{ getData($data, 'mission_no_student') }}" class="form-control" placeholder="{{ trans('main.mission_no_student') }}" required>
            @if ($errors->has('mission_no_student'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('mission_no_student') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('mission_all') ? ' has-error' : '' }}">
        <label class="col-md-2 control-label">{{ trans('main.mission_all') }} <span class="required"></span> </label>
        <div class="col-md-6">
            <input type="number" name="mission_all"  value="{{ getData($data, 'mission_all') }}" class="form-control" placeholder="{{ trans('main.mission_all') }}" required>
            @if ($errors->has('mission_all'))
                <span class="help-block">
                    <strong class="help-block">{{ $errors->first('mission_all') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>
