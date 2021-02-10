<!DOCTYPE html>
<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title> Recu d'Inscription </title>
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <style>
        .page-break {
    page-break-after: always;
}
      #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #customers td,
      #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #customers tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      #customers tr:hover {
        background-color: #ddd;
      }

      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
      }

    </style>
  </head>

  <body>
    <div id="logo" style="margin-bottom: 30px">
      <header>
        <img src="images/logo_endev.png" alt="logo_endev">
        <h4 style="margin-left: 250px; text-align: right; background-color: green; display: inline;"> Recu de Paiement
        </h4>
      </header>
    </div>

    <div id="info" style="margin-top: 100px;">

      <div style="float: left;">
        <p style="margin-left: 68px; margin-top: 44px;"> Date : {{ date('j-m-Y') }} </p>
      </div>

      <div
        style="float: right; margin-bottom: 100px; display: inline;  ">
        <p style="margin-left: 15px;">A l’intention de : {{$participant->name }} </p>
        <p style="margin-left: 15px;">Téléphone : {{$participant->phone }} </p>
      </div>
    </div>
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

    <div id="formations">
      <table id="customers">
        <tr>
          <th>Formation</th>
          <th>Nombre D’heure</th>
          <th>Prix HT</th>
          <th>Total HT</th>
        </tr>
        
        <tr>
          <td> {{ $formation->designation }} </td>
          <td> {{ $formation->vh }} </td>
          <td>  </td>
          <td> {{ $formation->prix }},00 </td>
        </tr>
       
      </table>
    </div>

    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

    <div id="frais">

       
       <table  style=" Border:non;">
                <tr>
                  <th>Total HT:</th>
                  <td>{{ $formation->prix }}</td>
                </tr>
                <tr>
                  <th>Taux de la TVA:</th>
                  <td>0.0 %</td>
                </tr>
                <tr>
                  <th>Montant de la TVA:</th>
                  <td>0.00 MAD</td>
                </tr>
              </table>

      
             <table style=" Border:non;">
                <tr>
                  <th>Avance:</th>
                  <td>  {{ $avance }} MAD</td>
                </tr>
                <tr>
                  <th>Reste:</th>
                  <td>{{ $reste }} MAD</td>
                </tr>
    
              </table>
       
         
      
  
    </div>

  </body>

</html>