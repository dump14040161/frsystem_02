@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')

        <!-- 新タスクフォーム -->
        <form action="/reservations" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- タスク名 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <!-- FIXME: inputタグに変更する -->
                    {{-- <input type="text" name="name" id="reservation-name" class="form-control"> --}}
                    <input type="text" name="start" id="resrvation-start" class="form-control">
                </div>
            </div>

            <div class="form-group">

                <label for="reservation" class="col-sm-4 control-label">◼️チェックイン</label>
                <div class="container">
                    <div class="row">
                        <div class='col-sm-5'>
                            <div class="form-group">
                                <input type='date' name="start" id="reservation-start"class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <label for="reservation" class="col-sm-4 control-label">◼️チェックアウト</label>
                <div class="container">
                    <div class="row">
                        <div class='col-sm-5'>
                            <div class="form-group">
                                    <input type='date' name="end" id="reservation-end" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

            <label for="reservation" class="col-sm-4 control-label">◼️チェックイン時刻</label>
                <div class="container">
                    <div class="row">
                        <div class='col-sm-5'>
                            <div class="form-group">
                                    <select type="text" name="start" id="reservation-start" class="form-control">
                                            <option>15:00</option>
                                            <option>16:00</option>
                                            <option>17:00</option>
                                            <option>18:00</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>


                <label for="reservation" class="col-sm-4 control-label">◼️大人</label>
                <div class="container">
                    <div class="row">
                        <div class='col-sm-1'>
                            <div class="form-group">
                                    <select type="text" name="count_adult" id="reservation-count_adult"class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>

                <label for="reservation" class="col-sm-4 control-label">◼️子供</label>
                <div class="container">
                    <div class="row">
                        <div class='col-sm-1'>
                            <div class="form-group">
                                    <select type="text" name="count_child" id="reservations-count_child" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>





            <!-- タスク追加ボタン -->

                <div class="form-group class=”form-inline”">
                    <div class="col-md-3 col-md-offset-5">
                        <button type="submit" class="btn btn-primary btn-lg ">決定</button>
                        <button type="submit" class="btn btn-danger btn-lg ">キャンセル</button>
                    </div>
                <div>
        </form>
    </div>


    <!-- TODO: 現在のタスク -->
    @if (count($reservations) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">予約一覧</h3>
            </div>

            <div class="panel-body">
                    <div class="container">
                <table class="table table-hover reservation-table reservation-table">
                    <!-- テーブルヘッダー -->
                    <thead>
                        <th class="text-center">施設名</th>
                        <th></th>
                    </thead>

                    <!-- テーブルボディー -->
                    <tbody>
                            @foreach ($reservations as $reservation)
                            <tr>
                                <!-- タスク名 -->
                                <td class="table-text-">
                                    <div class="text-center">{{ $reservation->start }}</div>
                                    <div class="text-center">{{ $reservation->end }}</div>
                                    <div class="text-center">{{ $reservation->count_adult }}</div>
                                    <div class="text-center">{{ $reservation->count_child }}</div>
                                </td>

                                <td>
                                    <!-- 削除ボタン -->
                                    <form action="/reservations/{{ $reservation->reservation_id }}" method="POST">
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
