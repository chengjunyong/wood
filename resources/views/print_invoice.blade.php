<html>
<head>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<title></title>
</head>

<style>
	body{
		color: black;
		margin:5px 20px 5px 20px;
	}

	span{
		font-size:14px;
	}

	.header{
		text-align: center;
		font-weight: 700;
	}

	.sub_header{
		margin-top:20px;
		margin-bottom:20px;
	}

	.main{
		padding-top: 10%;
	}

	th{
		font-size:12px;
	}

	table > tbody {
		font-size:12px;
	}

	td{
		padding: 10px 0px 10px 0px;
	}

	.last > td{
		padding-bottom: 7%;
	}

	@media print{
		.main{
			padding-top: 17.5%;
		}

	}

</style>
<body>

	<div class="header">
		<span style="font-size: 23px">VEGAVEST TRADING</span><br/>
		<span>(CA 0088843-X)</span><br/><br/>
		<span>8 LORONG SERI SETALI 71, JALAN HAJI AHMAD</span><br/>
		<span>25300 KUANTAN</span><br/>
		<span>TEL: 012-9213373 FAX: 09-5131891</span><br/>
	</div>

	<div class="sub_header">
		<h3 align="center" style="color:black">INVOICE</h3>
			<div style="float:left">
				<span>{{ $company->company_name }}</span><br/>
				<span>{{ $company->address }}</span>
				<span>{{ $company->postcode }}</span><span> {{ $company->city }}</span><br/><span> {{ $company->state }}</span>
			</div>
			<div style="float:right">
				<span>NO     : </span><span>{{ $invoice->invoice_code }} </span><br/>
				<span>D/O NO : {{ $invoice->do_number }} </span><br/>
				<span>DATE   : {{ $invoice->invoice_date }} </span><br/>
				<span>TERM   : CASH</span><br/>
			</div>
	</div>

	<div class="main">
		<table align="center" style="width:100%;">
			<thead style="margin-bottom: 10px;border-top: 2px solid;border-bottom:2px solid">
				<th style="width:5%">NO</th>
				<th style="width:55%;text-align: center;">DESCRIPTION</th>
				<th style="width:10%">PIECES</th>
				<th style="width:10%">TONNAGE</th>
				<th style="width:10%">RATE <br/>(RM)</th>
				<th style="width:10%">AMOUNT <br/>(RM)</th>
			</thead>
			<tbody style="">
				@foreach($invoice_detail as $key => $result)
					@if ($loop->last && $transport == null)
						<tr class="last">
							<td>{{ $a++ }}</td>
							<td>
								<div style="display:grid;grid-template-columns:10% 20% 70%;grid-gap: 10px;">
									<div>{{$result->product_name}}</div>
									<div>{!!$result->variation_display!!}</div>
									<div><b>{{ str_replace(',',' ',$result->piece_col) }} {{ str_replace(',',' ',$result->piece_col) }} {{ str_replace(',',' ',$result->piece_col) }}</b></div>
								</div>
							</td>
							<td>{{ $result->total_piece }}</td>
							<td>{{ $result->tonnage }}</td>
							<td>{{ $result->price }}/T</td>
							<td>{{ $result->amount }}</td>
						</tr>
					@else
						<tr>
							<td>{{ $a++ }}</td>
							<td>
								<div style="display:grid;grid-template-columns:10% 20% 70%;grid-gap: 10px;">
									<div>{{$result->product_name}}</div>
									<div>{!!$result->variation_display!!}</div>
									<div><b>{{ str_replace(',',' ',$result->piece_col) }} {{ str_replace(',',' ',$result->piece_col) }} {{ str_replace(',',' ',$result->piece_col) }}</b></div>
								</div>
							</td>
							<td>{{ $result->total_piece }}</td>
							<td>{{ $result->tonnage }}</td>
							<td>{{ $result->price }}/T</td>
							<td>{{ $result->amount }}</td>
						</tr>
					@endif
				@endforeach

				@if($transport != null)
					<tr class="last">
						<td>{{ $a }}</td>
						<td>
							<div style="display:grid;grid-template-columns:10% 20% 70%;grid-gap: 10px;">
								<div>Transportation</div>
								<div></div>
								<div></div>
							</div>
						</td>
						<td></td>
						<td></td>
						<td>{{ $transport->price }}</td>
						<td>{{ $transport->amount }}</td>
					</tr>
				@endif

			</tbody>
			<tfoot style="border-top: 2px solid;border-bottom: 2px solid;">
				<tr>
					<td></td>
					<td style="text-align: center"><b>Total :</b></td>
					<td> <b>{{ $sum['piece'] }}</b></td>
					<td><b>{{ $sum['tonnage'] }}</b></td>
					<td></td>
					<td><b>{{ $sum['amount'] }}</b></td>
				</tr>
			</tfoot>
		</table>


	</div>
</body>

<script src="../assets/js/jquery.min.js"></script>
<script>
window.print();

</script>

</html>