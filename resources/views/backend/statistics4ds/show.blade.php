@extends('backend.theme.layout.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject bold uppercase font-blue">{{$title}}</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('statistics4ds.create') }}" data-toggle="tooltip" title="{{trans('main.add')}}  {{trans('main.statistics4ds')}}"> <i class="fa fa-plus"></i> </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('statistics4ds.edit', [$show->id]) }}" data-toggle="tooltip" title="{{ trans('main.edit') }}  {{ trans('main.job') }}"> <i class="fa fa-edit"></i> </a>
                        <span data-toggle="tooltip" title="{{ trans('main.delete') }}  {{ trans('main.job') }}">
                            <a data-toggle="modal" data-target="#myModal{{ $show->id }}" class="btn btn-circle btn-icon-only btn-default" href=""> <i class="fa fa-trash"></i> </a>
                        </span>
                        <div class="modal fade" id="myModal{{ $show->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal">x</button>
                                        <h4 class="modal-title">
                                            {{trans('main.delete')}}
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        {{trans('main.ask-delete')}} {{ $show->title }} !
                                    </div>
                                    <div class="modal-footer">
                                        {!! Form::open([ 'method' => 'DELETE', 'route' => ['statistics4ds.destroy', $show->id] ]) !!}
                                        {!! Form::submit(trans('main.approval'), ['class' => 'btn btn-danger']) !!}
                                        <a class="btn btn-default" data-dismiss="modal">
                                            {{ trans('main.cancel') }}
                                        </a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-circle btn-icon-only btn-default" href="{{ route('statistics4ds.index') }}" data-toggle="tooltip" title="{{trans('main.show-all')}}  {{trans('main.statistics4ds')}}"> <i class="fa fa-list"></i> </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#" data-original-title="{{trans('main.full-screen')}}" title="{{trans('main.full-screen')}}"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                          <strong>{{trans('main.student')}} : </strong>
                          {{ $show->studentds_relation->name }}
                          <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.title')}} : </strong>
                            {{ $show->title }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.week')}} : </strong>
                            {{ $show->weekds_relation->name }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.week_num')}} : </strong>
                            {{ $show->weekds_relation->week_num }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.tool')}} : </strong>
                            {{ $show->tool_relation->name }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.mission')}} : </strong>
                            {{ trans( $show->mission) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.interact')}} : </strong>
                            {{ trans( $show->interact) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.datenow')}} : </strong>
                            {{ $show->datenow }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.decision')}} : </strong>
                            {{ $show->decision }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.status')}} : </strong>
                            {{ $show->status }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.observation1')}} : </strong>
                            {{ trans( $show->ob1) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.observation2')}} : </strong>
                            {{ trans( $show->ob2) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.observation3')}} : </strong>
                            {{ trans( $show->ob2) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.observation4')}} : </strong>
                            {{ trans( $show->ob4) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.observation5')}} : </strong>
                            {{ trans( $show->ob5) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.observation6')}} : </strong>
                            {{ trans( $show->ob6) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.level1')}} : </strong>
                            {{ trans( $show->level1) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.level2')}} : </strong>
                            {{ trans( $show->level2) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.level3')}} : </strong>
                            {{ trans( $show->level3) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.level4')}} : </strong>
                            {{ trans( $show->level4) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.tot')}} : </strong>
                            {{ trans( $show->tot) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.pool')}} : </strong>
                            {{ trans( $show->pool) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.story')}} : </strong>
                            {{ trans( $show->story) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.content')}} : </strong>
                            {{ trans( $show->content) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.incarnation')}} : </strong>
                            {{ trans( $show->incarnation) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.steel')}} : </strong>
                            {{ trans( $show->steel) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.misrepresentation')}} : </strong>
                            {{ trans( $show->misrepresentation) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.lesson1')}} : </strong>
                            {{ trans( $show->lesson1) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.lesson2')}} : </strong>
                            {{ trans( $show->lesson2) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.lesson3')}} : </strong>
                            {{ trans( $show->lesson3) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.lesson4')}} : </strong>
                            {{ trans( $show->lesson4) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.lesson5')}} : </strong>
                            {{ trans( $show->lesson5) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.lesson6')}} : </strong>
                            {{ trans( $show->lesson6) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.lesson7')}} : </strong>
                            {{ trans( $show->lesson7) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.lesson8')}} : </strong>
                            {{ trans( $show->lesson8) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.lesson9')}} : </strong>
                            {{ trans( $show->lesson9) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.lesson10')}} : </strong>
                            {{ trans( $show->lesson10) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.friendmission')}} : </strong>
                            {{ trans( $show->friendmission) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.frienddecision')}} : </strong>
                            {{ trans( $show->frienddecision) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.friendmissiontrain')}} : </strong>
                            {{ trans( $show->friendmissiontrain) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.loven')}} : </strong>
                            {{ trans( $show->loven) }}
                            <br><hr>
                        </div>
                        <div class="col-md-6">
                            <strong>{{trans('main.image')}} : </strong>
                            <img style="width: 200px; height: 150px;" src="{{ ShowImage($show->image) }}" alt="">
                            <br><hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
