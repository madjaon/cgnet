<?php 
	$title = 'Tìm kiếm';
	$meta_title = '';
	$meta_keyword = '';
	$meta_description = '';
	$meta_image = '';
	$extendData = array(
			'is404' => false,
			'meta_title' => $meta_title,
			'meta_keyword' => $meta_keyword,
			'meta_description' => $meta_description,
			'meta_image' => $meta_image,
		);
?>
@extends('site.layouts.master', $extendData)

@section('title', $title)

@section('content')
<div class="box">
	<div class="row column">
		<?php
			$breadcrumb = array(
				['name' => $title, 'link' => '']
			);
		?>
		@include('site.common.breadcrumb', $breadcrumb)
	</div>
	<div class="row column box-title">
		<h1>{!! $title !!}</h1>
		<p>Từ khóa: {{ $request->name }}</p>
	</div>
	@if(isset($data) && $data->total() > 0)
		@include('site.game.box', array('data' => $data))
		<div class="row column">
			@include('site.common.paginate', ['paginator' => $data])
		</div>
	@else
		<div class="row column">
			<p>Không tìm thấy kết quả</p>
		</div>
	@endif

	@include('site.common.ad', ['posPc' => 17])

</div>
@endsection