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
                <label for="facility" class="col-sm-3 control-label">施設名を入力</label>



                <div class="col-sm-6">
                <input type="text" name="name" id="facility-name" class="form-control">
                        <select>
                            <option>北海道</option>
                            <option>東北</option>
                            <option>関東・甲信越</option>
                            <option>近畿</option>
                            <option>中部</option>
                            <option>中国・四国</option>
                            <option>九州</option>
                            <option>沖縄</option>
                          </select>
                </div>
            </div>



            <!-- タスク追加ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">追加</button >

                        <i class="fa fa-plus"></i>
                    </button>
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
            <table class="table table-hover facility-table facility-table">




                <!-- テーブルヘッダー -->
                <thead>
                    <th class="text-center">施設名 </th>
                    <th>&nbsp;</th>
                </thead>

                <!-- テーブルボディー -->
                <tbody>
                    @foreach ($facilities as $facility)
                        <tr>
                            <!-- タスク名 -->
                            <td class="table-text-">
                                <div class="text-center">{{ $facility->name }}</div>
                            </td>

                            <td>
                                <!-- TODO: 削除ボタン -->

                                <form action="/facility/{{ $facility->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}


                                    <button type="submit" class="btn btn-danger">削除ボタン</button>

                                 </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

@endsection
