<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation Email</title>
</head>
<body>
	<div style="display: flex; justify-content: center; padding: 2rem;">
		<img src="{{ asset('img/logo.jpg') }}" width="100" height="100">
	</div>
    <h1 style="text-align: center; padding: 1rem;">Su Transacción ha sido aprobada</h1>

    <p style="text-align: justify; padding: 1rem;">Estimado {{ $deposit->user->fname }} {{ $deposit->user->lname }} </p>
    <p style="text-align: justify; padding: 1rem;">El déposito que usted ha realizado con número de voucher <strong>{{ $deposit->voucher }}</strong> con cuenta destino <strong>{{ $deposit->ban }}</strong> que recibirá Bs <strong> {{ number_format($amount, 2, ',', '.') }} </strong> ha sido aprobada.</p>
</body>
</html>