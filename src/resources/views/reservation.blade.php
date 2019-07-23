@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')

        <!-- 新タスクフォーム -->
        <form action="/reservation" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- タスク名 -->
            <div class="form-group">
                <label for="reserve" class="col-sm-3 control-label">施設名を入力</label>



                <div class="col-sm-6">
                    <!-- FIXME: inputタグに変更する -->
                    <input type="text" name="name" id="reserve-name" class="form-control">

                </div>
            </div>



            <!-- タスク追加ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">追加</button>
                </div>
            </div>
        </form>
    </div>


    <!-- TODO: 現在のタスク -->
    @if (count($reservation) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">予約一覧</h3>
            </div>

            <div class="panel-body">
                    <div class="container">
                <table class="table table-hover reserve-table reserve-table">
                    <!-- テーブルヘッダー -->
                    <thead>
                        <th class="text-center">施設名</th>
                        <th></th>
                    </thead>

                    <!-- テーブルボディー -->
                    <tbody>
                        @foreach ($reserve as $reservation)
                            <tr>
                                <!-- タスク名 -->
                                <td class="table-text-">
                                    <div class="text-center">{{ $reserve->name }}</div>
                                </td>

                                <td>
                                    <!-- 削除ボタン -->
                                    <form action="/reservation/{{ $reserve->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">削除ボタン</button>
                                    </form>
                                </td>
                            </tr>
                            </div>
                    </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    @endif

@endsection
