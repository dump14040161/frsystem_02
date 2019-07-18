@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード… -->

    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')

        <!-- 新タスクフォーム -->
        <form action="/facility" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- タスク名 -->
            <div class="form-group">
                <label for="facility" class="col-sm-3 control-label">Facility</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="facility-name" class="form-control">
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
     @if (count($facilities) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            現在のタスク
        </div>

        <div class="panel-body">
            <table class="table table-striped facility-table">

                <!-- テーブルヘッダー -->
                <thead>
                    <th>Facility</th>
                    <th>&nbsp;</th>
                </thead>

                <!-- テーブルボディー -->
                <tbody>
                    @foreach ($facilities as $facility)
                        <tr>
                            <!-- タスク名 -->
                            <td class="table-text">
                                <div>{{ $facility->name }}</div>
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
