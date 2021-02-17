<!DOCTYPE html>
<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title> Recu d'Inscription </title>
    <link href="/css/bootstrap.css" rel="stylesheet" />
    <style>
      
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
      header{
        height: 150px;
        margin: 10px;
      }

header h4{
  display: inline;
  background-color: #4CAF50;
  text-align: right;
  margin-right: 60px;
  margin-top: 0;
  padding-top: 0;
  float: right;
  width: 200px;
}
  .sec{
    width: 200px;
  
  }
  .sec .p1 {
    float: left;
    margin-left: 68px;
    margin-top: 40px;
    border:1px solid black;
  }
  .d2{
    float: right;
    margin-top: 0px;
    padding-top: 0;
  }
  .sec .p2 {
 
   
    border:1px solid black;
  }
  .sec ,table,td {
  border: 1px solid black;
  padding-top:10px;
  padding-bottom:40px;
 border-collapse: collapse;
}
.sec2,table,td,p{
  justify-content: flex-start;
  margin-left: 2px;
  padding-left: 2px;
}
.sec3{
  float: right;
}
footer{
  
  text-align: center;
}
    </style>
  </head>
  
  <body>
    <header>
      <div>
        <img src="images/logo_endev.png" alt="logo_endev">
      </div>
      <div>
        <h4 > Recu de Paiement </h4>
      </div>
    </header>

    <section class="sec1">
     
<table style="width:100%">
  <tr>
    <td><P>Date : {{ date('j-m-Y') }}</P>  </td>
    <td>
      
      <p>A l’intention de : {{$participant->name }}</p>
    
      <p>Téléphone : {{$participant->phone }} </p>
    </td> 
    
  </tr>

  
 
</table>
    </section>

    <section class="sec2">
      <table id="customers" style="width: 100%">
        <tr>
          <th>Formation</th>
          <th>Nombre D’heure</th>
          <th>Prix HT</th>
          <th>Total HT</th>
        </tr>
        
        <tr>
          <td> {{ $formation->designation }} </td>
          <td> {{ $formation->vh }} H</td>
          <td>  </td>
          <td> {{ $formation->prix }},00 </td>
        </tr>
       
      </table>
    </section>

    <section class="sec3">
      <table  style="width: 100%">
        <tr>
          <th>
            <p>Total HT:</p>
            <p>Taux de la TVA:</p>
            <p>Montant de la TVA:</p>

          </th>
          <td>
           <p>{{ $formation->prix }}</p> 
           <p>0.0 %</p> 
           <p>0.00 MAD</p> 

          
          </td>
        </tr>
       
        <tr>
          <th>
            <p> Avance:</p>
            <p> Reste:</p>

          </th>
          <td> <p>{{ $avance }} MAD</p> 
          <p>{{ $reste }} MAD</p></td>
        </tr>
      
       
      </table>
    </section>

    <footer>
      <p>Nous vous remercions pour votre confiance</p>
      <hr>
      <p>RC : 337717 - Patente : 36396719 – I.F : 15293311 – N° CNSS : 4649101</p>
    </footer>
   

  </body>

</html>