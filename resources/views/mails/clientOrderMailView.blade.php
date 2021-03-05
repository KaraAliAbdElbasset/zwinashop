<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>COMMANDE 7CLICS</title>
</head>
<body>
   
<div>
    <div><img src="{{asset('assets/site/img/logo.png')}}" height="75px" width="150px"/></div>
<h2 class="center"> bonjour chèr(e) {{$order->first_name}} {{$order->last_name}} </h2>
<h3 class="center">votre commande numéro {{$order->id}} est en cours de traitement </h3>
    <h3 class="center">Nous vous contacterons dans les plus brefs délais </h3>

    <h3>produits : </h3>

@foreach($order->products as $p)
    <h3 class="center"> NOM DU PRODUIT :{{$p->name}}</h3>
    <h3 class="center"> DESCRIPTION DU PRODUIT :{{$p->description}}</h3>
    <h3 class="center"> PRIX DU PRODUIT: {{$p->price}} DZD</h3>

                
@endforeach
</div>

<div>
    <div class="row center"><img src="{{asset('assets/site/img/logo.png')}}" height="75px" width="150px"/>
    </div>
</div>
                    



</body>
</html>