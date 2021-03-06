@extends('admin.layouts.master')

@section('title', 'Games')

@section('content')

@include('admin.game.search')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ route('admin.game.index') }}" class="btn btn-success">Danh sách game</a>
		<a href="{{ route('admin.game.create') }}" class="btn btn-primary">Thêm Game</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Games</h3><i> - Total: {{ $data->total() }}</i>
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>Name</th>
						<th>Thể loại chính</th>
						<th>Loại game</th>
						<th>Lượt xem</th>
						<th>Ngày đăng</th>
						<th>Status</th>
						<th style="width:240px;">Action</th>
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->name }}</td>
						<td>{{ CommonQuery::getFieldById('game_types', $value->type_main_id, 'name') }}</td>
						<td>{{ CommonOption::getTypeGame($value->type) }}</td>
						<td>{{ getZero($value->view) }}</td>
						<td>{!! CommonMethod::startDateLabel($value->start_date) !!}</td>
						<td>{!! CommonOption::getStatus($value->status) !!}</td>
						<td>
							<a href="{{ CommonUrl::getUrl($value->slug) }}" class="btn btn-success" target="_blank">Xem</a>
							<a href="{{ route('admin.game.edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							<form method="POST" action="{{ route('admin.game.destroy', $value->id) }}" style="display: inline-block;">
								{{ method_field('DELETE') }}
								{{ csrf_field() }}
								<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
							</form>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
		{!! $data->appends($request->except('page'))->render() !!}
	</div>
</div>

@stop