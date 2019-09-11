<!DOCTYPE html>
<html>
<head>
	<title>Foto</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="{{asset('assets/img/dboard/logo/sublogo.png')}}">
		<link rel="stylesheet" href="{{asset('assets/css/nota.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
</head>
<body>
		<div class="btn-print">
			<button type="button" onclick="javascript:window.print();">Print</button>
		</div>
		<div class="div-width page-break">
			<h1 class="m-unset">Perwita Nusaraya</h1>
			<hr>
			<br>
			<div class="row col-12 text-center">
				@if (!is_null($pekerja->img))
				<img id="imgFoto" src="{{ url($pekerja->img) }}" alt="Foto" width="100%">
				@else
				<img id="imgFoto" src="{{ url('assets/img/img_not_found.png') }}" alt="Foto">
				<h3>( Gambar tidak ditemukan )</h3>
				@endif
			</div>

		</div>
</body>
</html>
<script src="{{asset('assets/plugins/jquery-3.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        window.print();
    })
</script>
