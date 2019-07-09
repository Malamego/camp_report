<a href="#" data-toggle="modal" data-target="#myModal{{$id}}" class="btn red">{{ trans('main.delete') }}</a>

<div class="modal fade" id="myModal{{$id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">{{trans('main.delete')}} {{ $week_id }} ! </h4>
            </div>
            <div class="modal-body">
                {{trans('main.ask-delete')}} : {{ $week_id }}
            </div>
            <div class="modal-footer">
                {!! Form::open([ 'method' => 'DELETE', 'route' => ['weeks_details.destroy', $id] ]) !!}
                {!! Form::submit(trans('main.approval'), ['class' => 'btn btn-danger']) !!}
                <a class="btn btn-default" data-dismiss="modal">{{trans('main.cancel')}}</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
