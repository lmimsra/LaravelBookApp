@extends('layouts.app')
@section('title')
    編集
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            <form action="{{url('book/update')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="item_name">Title</label>
                    <input type="text" name="item_name" id="item_name" class="form-control"
                           value="{{$book->item_name}}"/>
                </div>
                <div class="form-group">
                    <label for="item_number">冊数</label>
                    <input type="text" name="item_number" id="item_number" class="form-control"
                           value="{{$book->item_number}}"/>
                </div>
                <div class="form-group">
                    <label for="item_amount">金額</label>
                    <input type="text" name="item_amount" id="item_amount" class="form-control"
                           value="{{$book->item_amount}}"/>
                </div>
                <div class="form-group">
                    <label for="published">発売日時</label>
                    <input type="datetime" name="published" id="published" class="form-control"
                           value="{{$book->published}}"/>
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{url('/')}}">
                        <i class="glyphicon glyphicon-backward"></i> Back
                    </a>
                </div>
                <input type="hidden" name="id" value="{{$book->id}}"/>
            </form>
        </div>
    </div>
@endsection