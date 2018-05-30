@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <div class="container">
            <!-- バリデーションエラー時に表示する -->
        @include('common.errors')

        <!-- 登録フォーム -->
            <form action="{{url('books')}}" method="post" class="form-horizontal">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="book-name" class=" control-label">Book Name</label>
                            <input type="text" name="item_name" id="book-name" class="form-control"
                                   value="{{old('item_name')}}"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="book-number" class=" control-label">冊数</label>
                            <input type="text" name="item_number" id="book-number" class="form-control"
                                   value="{{old('item_number')}}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="book-amount" class=" control-label">金額</label>
                            <input type="text" name="item_amount" id="book-amount" class="form-control"
                                   value="{{old('item_amount')}}"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="book-published" class=" control-label">公開日時</label>
                            <input type="date" name="published" id="book-published" class="form-control"
                                   value="{{old('published')}}"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="glyphicon glyphicon-plus"></i>Save
                        </button>
                    </div>
                </div>

            </form>
            <!-- 登録した本のリスト -->
            @if(count($books) >0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        現在の本
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>本一覧</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$book->item_name}}</div>
                                    </td>

                                    <td>
                                        <form action="{{url('book/edit/'.$book->id)}}" method="post">
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-pencil"></i>更新
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <!-- 削除ボタン -->
                                        <form action="{{url('book/'.$book->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i>削除
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                {{$books->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
