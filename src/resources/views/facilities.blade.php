@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')

        <!-- 新タスクフォーム -->
        <form action="/facilities" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            {{-- <div>{{ $reservation_ }}</div> --}}

            <!-- タスク名 -->
            <div class="form-group">
                <label for="facility" class="col-sm-3 control-label">施設名を入力</label>



                <div class="col-sm-6">
                    <!-- FIXME: inputタグに変更する -->
                    <input type="text" name="name" id="facility-name" class="form-control">

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
    @if (count($facilities) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">予約一覧</h3>
            </div>

            <div class="panel-body">
                    <div class="container">
                <table class="table table-hover facility-table facility-table">
                    <!-- テーブルヘッダー -->
                    <thead>
                        <th class="text-center">施設名</th>
                        <th></th>
                    </thead>

                    <!-- テーブルボディー -->
                    <tbody>
                        @foreach ($facilities as $facility)
                            <tr>
                                <!-- タスク名 -->
                                <td class="table-text-">
                                    <div class="text-center">{{ $facility->name }}</div>
                                    {{-- <div>{{ $reservation_page }}</div> --}}
                                </td>

                                <td>
                                    <!-- 削除ボタン -->
                                    <form action="/facilities/{{ $facility->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">削除ボタン</button>

                                        <div class="text-center">
                                                <a href="/reservation_page" class="btn btn-success" role="button">他のページに遷移！</a>
                                        </div>





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
