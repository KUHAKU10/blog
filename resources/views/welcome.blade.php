@extends('app')

@section('content')

	@foreach($data as $artikel)
	<div class="panel">
		<div class="heading">
			<div class="icon mif-file-text"></div>
			<div class="title">{{ $artikel->judul }}</div>
		</div>
		<div class="content">
			{{ $artikel->isi }}

			<br>
			<a href="{{ $artikel->slug }}">Read More</a>
			<br>

			<div class="place-right">
			
			@if(Auth::check())
			<span class="mif-mail"></span>
			<a href="{{ url('mail/'.$artikel->slug) }}"> Send Me E-Mail </a>
			@endif

			<span class="mif-file-pdf"></span>
			<a target="_blank" href="{{ url('pdf/'.$artikel->slug) }}"> View PDF </a>
				<span class="mif-calendar"></span>
				{{ date_format(date_create($artikel->created_at), "D, d M Y H:i:s") }}
				<span class="mif-user"></span>
				{{ App\User::find($artikel->idpengguna)['email'] }}
			</div>
			<br>
		</div>
	</div>
	@endforeach

	<br>
	<span class="place-right">
	{!! $data->render() !!}
	</span>
@endsection
<!-- <html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Laravel 5</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
			</div>
		</div>
	</body>
</html>
 -->