@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード… -->

    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')

        <!-- 新タスクフォーム -->
        <form action="/facilitie" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- タスク名 -->
            <div class="form-group">
                <label for="facilitie" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="facilitie-name" class="form-control">
                </div>
            </div>

            <!-- タスク追加ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> タスク追加
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: 現在のタスク -->
    <!-- 現在のタスク -->
    @if (count($facilitie) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            現在のタスク
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- テーブルヘッダー -->
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>

                <!-- テーブルボディー -->
                <tbody>
                    @foreach ($facilities as $facilitie)
                        <tr>
                            <!-- タスク名 -->
                            <td class="table-text">
                                <div>{{ $facilities>name }}</div>
                            </td>

                            <td>
                                <!-- TODO: 削除ボタン -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection
