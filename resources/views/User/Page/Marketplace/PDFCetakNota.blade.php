<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nota</title>
    <style>
    table, th, td {

        line-height: 2rem;
    }
</style>
</head>
<body>

	<center><h1>NOTA PEMBELIAN </h1></center>
	<hr>
    
    @foreach($trans as $o)
    <h4>Nama Pembeli : {{ $o->user->name }}</h4>
	<h4>Tanggal Pembelian : {{ $o->created_at }}</h4>
    <h4>Nomer Orderan : {{ $o->no_order }}</h4>
    <h4>Jasa Pengiriman : {{ $o->ekspedisi }}</h4>
    @endforeach

	<hr>
	<h3>Detail Pemesanan</h3>
    
	<table style="width:100%;border:1px solid black;border-collapse: collapse; text-align: center;">

        
		  <thead>
		    <tr>
		      <th>No</th>
		      <th>Nama Produk</th>
		      <th>Jumlah</th>
		      <th>Harga</th>
		      <th>Subtotal</th>
		    </tr>
		  </thead>
		  <tbody>
          <?php
            $no = 0;
        ?>
          @foreach($order as $a)
          <?php
            $no += 1;
        ?>
		    <tr>
		      <th>{{$no}}</th>
		      <td>{{$a->produk->nama_produk}}</td>
		      <td>{{$a->jumlah}}</td>
              <td>@currency($a->produk->harga)</td>
              <td>@currency($a->produk->harga*$a->jumlah)</td>
		    </tr>
            @endforeach
		  </tbody>
	</table>
    

	<h3>Detail Pembayaran</h3>
    
    @foreach($trans as $o)
    <table style="width:100%;">
        <tr>
            <th style="text-align: left;">Sub Total Pembelanjaan </th>
            <td style="text-align: right;padding-right: 50px">@currency($o->total)</td>
        </tr>
        <tr>
            <th style="text-align: left;">Ongkos Kirim </th>
            <td style="text-align: right;padding-right: 50px">@currency(25000)</td>
        </tr>
        
        <tr>
            <th style="text-align: left;border-top: 1px solid black"><h2>Total Pembayaran</h2></th>
            <td style="text-align: right;padding-right: 50px;border-top: 1px solid black"><h2><b>@currency($o->total+25000)</b></h2></td>
        </tr>
    </table>
    @endforeach
</body>
</html>